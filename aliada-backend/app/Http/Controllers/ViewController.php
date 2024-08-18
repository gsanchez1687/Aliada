<?php

namespace App\Http\Controllers;

use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ViewController extends Controller
{
    public function getAllViews()
    {
        try {
            $views = View::all();
            return response()->json($views);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las vistas'], 500);
        }
    }
    public function index($property_id)
    {
        try {
            $views = View::where('property_id', $property_id)->get();
            return response()->json($views);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las vistas'], 500);
        }
    }

    public function store(Request $request, $property_id)
    {
        try {
            $requestData = $request->all();
            $requestData['property_id'] = $property_id;
            
            $view = View::create($requestData);
            return response()->json($view, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la vista'], 500);
        }
    }

    public function show($property_id, $id)
    {
        try {
            $view = View::where('property_id', $property_id)->findOrFail($id);
            return response()->json($view);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Vista no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la vista'], 500);
        }
    }

    public function update(Request $request, $property_id, $id)
    {
        try {
            $view = View::where('property_id', $property_id)->findOrFail($id);
            $view->update($request->all());
            return response()->json($view, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la vista'], 500);
        }
    }

    public function destroy($property_id, $id)
    {
        try {
            $view = View::where('property_id', $property_id)->findOrFail($id);
            $view->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la vista'], 500);
        }
    }
}
