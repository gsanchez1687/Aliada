<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class VideoController extends Controller
{
    public function index()
    {
        try {
            $videos = Video::all();
            return response()->json(['data' => $videos]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los videos'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'url' => 'required|url',
            ]);

            $video = Video::create($request->all());

            return response()->json(['message' => 'Video creado exitosamente', 'data' => $video], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el video'], 500);
        }
    }

    public function show(Video $video)
    {
        try {
            return response()->json(['data' => $video]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Video no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el video'], 500);
        }
    }

    public function update(Request $request, Video $video)
    {
        try {
            $request->validate([
                'url' => 'required|url',
            ]);

            $video->update($request->all());

            return response()->json(['message' => 'Video actualizado exitosamente', 'data' => $video]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el video'], 500);
        }
    }

    public function destroy(Video $video)
    {
        try {
            $video->delete();

            return response()->json(['message' => 'Video eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el video'], 500);
        }
    }
}
