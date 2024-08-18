<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseUserController extends Controller
{
    public function index()
    {
        try {
            $courseUsers = CourseUser::all();
            return response()->json(['data' => $courseUsers]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los usuarios del curso'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'course_id' => 'required|exists:courses,id',
            ]);

            $courseUser = CourseUser::create($request->all());

            return response()->json(['message' => 'Usuario del curso creado exitosamente', 'data' => $courseUser], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el usuario del curso'], 500);
        }
    }

    public function show(CourseUser $courseUser)
    {
        try {
            return response()->json(['data' => $courseUser]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuario del curso no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el usuario del curso'], 500);
        }
    }

    public function update(Request $request, CourseUser $courseUser)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'course_id' => 'required|exists:courses,id',
            ]);

            $courseUser->update($request->all());

            return response()->json(['message' => 'Usuario del curso actualizado exitosamente', 'data' => $courseUser]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el usuario del curso'], 500);
        }
    }

    public function destroy(CourseUser $courseUser)
    {
        try {
            $courseUser->delete();

            return response()->json(['message' => 'Usuario del curso eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el usuario del curso'], 500);
        }
    }
}
