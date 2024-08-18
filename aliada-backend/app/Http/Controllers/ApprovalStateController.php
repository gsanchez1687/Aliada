<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalState;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApprovalStateController extends Controller
{
    public function index()
    {
        try {
            $approvalStates = ApprovalState::all();
            return response()->json(['data' => $approvalStates]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los estados de aprobación'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:approval_states,name'
            ]);

            $approvalState = ApprovalState::create($request->all());

            return response()->json(['message' => 'Estado de aprobación creado exitosamente', 'data' => $approvalState], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el estado de aprobación'], 500);
        }
    }

    public function show(ApprovalState $approvalState)
    {
        try {
            return response()->json(['data' => $approvalState]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Estado de aprobación no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el estado de aprobación'], 500);
        }
    }

    public function update(Request $request, ApprovalState $approvalState)
    {
        try {
            $request->validate([
                'name' => 'required|unique:approval_states,name,' . $approvalState->id
            ]);

            $approvalState->update($request->all());

            return response()->json(['message' => 'Estado de aprobación actualizado exitosamente', 'data' => $approvalState]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el estado de aprobación'], 500);
        }
    }

    public function destroy(ApprovalState $approvalState)
    {
        try {
            $approvalState->delete();

            return response()->json(['message' => 'Estado de aprobación eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el estado de aprobación'], 500);
        }
    }
}
