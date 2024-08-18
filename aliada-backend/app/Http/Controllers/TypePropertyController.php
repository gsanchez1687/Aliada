<?php

namespace App\Http\Controllers;

use App\Models\TypeProperty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class TypePropertyController extends Controller
{
    public function index()
    {
        try {
            $typeProperties = TypeProperty::all();
            return response()->json(['data' => $typeProperties]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los tipos de propiedad'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:type_properties',
            ]);

            $typeProperty = TypeProperty::create($request->all());

            return response()->json(['message' => 'Tipo de propiedad creado exitosamente', 'data' => $typeProperty], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el tipo de propiedad'], 500);
        }
    }

    public function show(TypeProperty $typeProperty)
    {
        try {
            return response()->json(['data' => $typeProperty]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el tipo de propiedad'], 500);
        }
    }

    public function update(Request $request, TypeProperty $typeProperty)
    {
        try {
            $request->validate([
                'name' => ['required', Rule::unique('type_properties')->ignore($typeProperty->id)],
            ]);

            $typeProperty->update($request->all());

            return response()->json(['message' => 'Tipo de propiedad actualizado exitosamente', 'data' => $typeProperty]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el tipo de propiedad'], 500);
        }
    }

    public function destroy(TypeProperty $typeProperty)
    {
        try {
            $typeProperty->delete();
            return response()->json(['message' => 'Tipo de propiedad eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el tipo de propiedad'], 500);
        }
    }
}
