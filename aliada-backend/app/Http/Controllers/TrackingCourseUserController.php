<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackingCourseUser;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TrackingCourseUserController extends Controller
{
    public function index()
    {
        try {
            $trackingCourseUsers = TrackingCourseUser::all();
            return response()->json(['data' => $trackingCourseUsers]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los usuarios de seguimiento de curso'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'course_user_id' => 'required|exists:course_users,id',
                'video_id' => 'required|exists:videos,id',
            ]);

            $trackingCourseUser = TrackingCourseUser::create($request->all());

            return response()->json(['message' => 'Usuario de seguimiento de curso creado exitosamente', 'data' => $trackingCourseUser], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el usuario de seguimiento de curso'], 500);
        }
    }

    public function show(TrackingCourseUser $trackingCourseUser)
    {
        try {
            return response()->json(['data' => $trackingCourseUser]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuario de seguimiento de curso no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el usuario de seguimiento de curso'], 500);
        }
    }

    public function update(Request $request, TrackingCourseUser $trackingCourseUser)
    {
        try {
            $request->validate([
                'course_user_id' => 'required|exists:course_users,id',
                'video_id' => 'required|exists:videos,id',
            ]);

            $trackingCourseUser->update($request->all());

            return response()->json(['message' => 'Usuario de seguimiento de curso actualizado exitosamente', 'data' => $trackingCourseUser]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el usuario de seguimiento de curso'], 500);
        }
    }

    public function destroy(TrackingCourseUser $trackingCourseUser)
    {
        try {
            $trackingCourseUser->delete();

            return response()->json(['message' => 'Usuario de seguimiento de curso eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el usuario de seguimiento de curso'], 500);
        }
    }
}
