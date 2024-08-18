<?php

namespace App\Http\Controllers;

use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseVideoController extends Controller
{
    public function index()
    {
        try {
            $courseVideos = CourseVideo::all();
            return response()->json(['data' => $courseVideos]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los videos del curso'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'course_id' => 'required|exists:courses,id',
                'video_id' => 'required|exists:videos,id',
            ]);

            $courseVideo = CourseVideo::create($request->all());

            return response()->json(['message' => 'Video del curso creado exitosamente', 'data' => $courseVideo], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el video del curso'], 500);
        }
    }

    public function show(CourseVideo $courseVideo)
    {
        try {
            return response()->json(['data' => $courseVideo]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Video del curso no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el video del curso'], 500);
        }
    }

    public function update(Request $request, CourseVideo $courseVideo)
    {
        try {
            $request->validate([
                'course_id' => 'required|exists:courses,id',
                'video_id' => 'required|exists:videos,id',
            ]);

            $courseVideo->update($request->all());

            return response()->json(['message' => 'Video del curso actualizado exitosamente', 'data' => $courseVideo]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el video del curso'], 500);
        }
    }

    public function destroy(CourseVideo $courseVideo)
    {
        try {
            $courseVideo->delete();

            return response()->json(['message' => 'Video del curso eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el video del curso'], 500);
        }
    }
}
