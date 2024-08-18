<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrganizationController extends Controller
{
    public function index()
    {
        try {
            $organizations = Organization::all();
            return response()->json(['data' => $organizations]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las organizaciones'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);

            $organization = Organization::create($request->all());

            return response()->json(['message' => 'Organización creada exitosamente', 'data' => $organization], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la organización'], 500);
        }
    }

    public function show(Organization $organization)
    {
        try {
            return response()->json(['data' => $organization]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Organización no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la organización'], 500);
        }
    }

    public function update(Request $request, Organization $organization)
    {
        try {
            $request->validate([
                'name' => 'required',
              
            ]);

            $organization->update($request->all());

            return response()->json(['message' => 'Organización actualizada exitosamente', 'data' => $organization]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la organización'], 500);
        }
    }

    public function destroy(Organization $organization)
    {
        try {
            $organization->delete();

            return response()->json(['message' => 'Organización eliminada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la organización'], 500);
        }
    }
}