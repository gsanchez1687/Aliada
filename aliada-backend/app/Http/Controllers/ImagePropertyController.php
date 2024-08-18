<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageProperty;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ImagePropertyController extends Controller
{
    public function index()
    {
        try {
            $images = ImageProperty::all();
            return response()->json(['data' => $images]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las imágenes de propiedad'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'url' => 'required',
                'property_id' => 'required|exists:properties,id'
            ]);

            $image = ImageProperty::create($request->all());

            return response()->json(['message' => 'Imagen creada exitosamente', 'data' => $image], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la imagen'], 500);
        }
    }

    public function show(ImageProperty $imageProperty)
    {
        try {
            return response()->json(['data' => $imageProperty]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Imagen de propiedad no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la imagen de propiedad'], 500);
        }
    }

    public function update(Request $request, ImageProperty $imageProperty)
    {
        try {
            $request->validate([
                'url' => 'required',
                'property_id' => 'required|exists:properties,id'
             
            ]);

            $imageProperty->update($request->all());

            return response()->json(['message' => 'Imagen actualizada exitosamente', 'data' => $imageProperty]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la imagen'], 500);
        }
    }

    public function destroy(ImageProperty $imageProperty)
    {
        try {
            $imageProperty->delete();

            return response()->json(['message' => 'Imagen eliminada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la imagen'], 500);
        }
    }
}
