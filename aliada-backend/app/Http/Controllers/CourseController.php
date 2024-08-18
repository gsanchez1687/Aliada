<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CourseController extends Controller
{
    public function index()
    {
        try {
            $courses = Course::all();
            return response()->json(['data' => $courses]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los cursos'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as needed
            ]);

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $request->merge(['logo' => $logoPath]);
            }

            $course = Course::create($request->all());

            return response()->json(['message' => 'Curso creado exitosamente', 'data' => $course], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el curso'], 500);
        }
    }

    public function show(Course $course)
    {
        try {
            return response()->json(['data' => $course]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Curso no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el curso'], 500);
        }
    }

    public function update(Request $request, Course $course)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust validation rules as needed
            ]);

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $request->merge(['logo' => $logoPath]);
            }

            $course->update($request->all());

            return response()->json(['message' => 'Curso actualizado exitosamente', 'data' => $course]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el curso'], 500);
        }
    }

    public function destroy(Course $course)
    {
        try {
            $course->delete();

            return response()->json(['message' => 'Curso eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el curso'], 500);
        }
    }
}
