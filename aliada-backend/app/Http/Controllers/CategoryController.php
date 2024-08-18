<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = Category::all();
            return response()->json(['data' => $categories]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las categorías'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $category = Category::create($request->all());

            return response()->json(['message' => 'Categoría creada exitosamente', 'data' => $category], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la categoría'], 500);
        }
    }

    public function show(Category $category)
    {
        try {
            return response()->json(['data' => $category]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la categoría'], 500);
        }
    }

    public function update(Request $request, Category $category)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $category->update($request->all());

            return response()->json(['message' => 'Categoría actualizada exitosamente', 'data' => $category]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la categoría'], 500);
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return response()->json(['message' => 'Categoría eliminada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la categoría'], 500);
        }
    }
}
