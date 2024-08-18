<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrganizationGroupController extends Controller
{
    public function index()
    {
        try {
            $organizationGroups = OrganizationGroup::all();
            return response()->json(['data' => $organizationGroups]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los grupos de organizaciones'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'organization_id' => 'required|exists:organizations,id',
            ]);

            $organizationGroup = OrganizationGroup::create($request->all());

            return response()->json(['message' => 'Grupo de organización creado exitosamente', 'data' => $organizationGroup], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el grupo de organización'], 500);
        }
    }

    public function show(OrganizationGroup $organizationGroup)
    {
        try {
            return response()->json(['data' => $organizationGroup]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Grupo de organización no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el grupo de organización'], 500);
        }
    }

    public function update(Request $request, OrganizationGroup $organizationGroup)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'organization_id' => 'required|exists:organizations,id',
            ]);

            $organizationGroup->update($request->all());

            return response()->json(['message' => 'Grupo de organización actualizado exitosamente', 'data' => $organizationGroup]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el grupo de organización'], 500);
        }
    }

    public function destroy(OrganizationGroup $organizationGroup)
    {
        try {
            $organizationGroup->delete();

            return response()->json(['message' => 'Grupo de organización eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el grupo de organización'], 500);
        }
    }
}
