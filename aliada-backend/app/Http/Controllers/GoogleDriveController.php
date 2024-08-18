<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Drive;
use Illuminate\Http\Request;
use Google\Service\Drive\DriveFile;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

class GoogleDriveController extends Controller
{
    protected $driveService;

    public function __construct()
    {
        $client = new Client();
        $client->setClientId(config('filesystems.disks.google.clientId'));
        $client->setClientSecret(config('filesystems.disks.google.clientSecret'));
        $client->refreshToken(config('filesystems.disks.google.refreshToken')); 
    
        if ($client->isAccessTokenExpired()) {
       //     $client->fetchAccessTokenWithRefreshToken();
        }
    
        $this->driveService = new Drive($client);
    }

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');

        // Verificar que se haya subido un archivo
        if ($file) {
            $fileMetadata = new DriveFile([
                'name' => $file->getClientOriginalName(),
                'parents' => [config('filesystems.disks.google.folder')] 
            ]);
    
            $content = file_get_contents($file->getRealPath());

            $driveFile = $this->driveService->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => $file->getClientMimeType(),
                'uploadType' => 'multipart',
                'fields' => 'id',
            ]);

            return $driveFile->id;
        }
    
        return 'No se subió ningún archivo.';
    }

    public function getFile($fileId)
    {
        try {
 
         $file = $this->driveService->files->get($fileId, ['alt' => 'media']);

         return response($file->getBody()->getContents(), 200)
             ->header('Content-Type', $file->getHeaderLine('Content-Type'));
        } catch (\Exception $e) {
            return response('Error al obtener la información desde Google Drive.', 500);
        }
    }
}
