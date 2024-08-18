<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApprovalController extends Controller
{
    public function index()
    {
        try {
            $approvals = Approval::all();
            return response()->json(['data' => $approvals]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las aprobaciones'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'property_id' => 'required|exists:properties,id',
                'approval_state_id' => 'required|exists:approval_states,id',
            ]);

            $request->merge(['user_id' => Auth::id()]);

            $approval = Approval::create($request->all());

            return response()->json(['message' => 'Aprobación creada exitosamente', 'data' => $approval], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la aprobación'], 500);
        }
    }

    public function show(Approval $approval)
    {
        try {
            return response()->json(['data' => $approval]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Aprobación no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la aprobación'], 500);
        }
    }

    public function update(Request $request, Approval $approval)
    {
        try {
            $request->validate([
                'property_id' => 'required|exists:properties,id',
                'approval_state_id' => 'required|exists:approval_states,id',
                // Agrega validaciones adicionales según tus necesidades
            ]);

            $approval->update($request->all());

            return response()->json(['message' => 'Aprobación actualizada exitosamente', 'data' => $approval]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la aprobación'], 500);
        }
    }

    public function destroy(Approval $approval)
    {
        try {
            $approval->delete();

            return response()->json(['message' => 'Aprobación eliminada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la aprobación'], 500);
        }
    }
}
