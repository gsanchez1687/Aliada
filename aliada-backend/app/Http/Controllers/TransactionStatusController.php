<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransactionStatusController extends Controller
{
    public function index()
    {
        try {
            $statuses = TransactionStatus::all();
            return response()->json($statuses);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener los estados de transacción'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:transaction_statuses',
                'description' => 'nullable',
            ]);

            $status = TransactionStatus::create($request->all());

            return response()->json($status, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear el estado de transacción'], 500);
        }
    }

    public function show(TransactionStatus $transactionStatus)
    {
        try {
            return response()->json($transactionStatus);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Estado de transacción no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener el estado de transacción'], 500);
        }
    }

    public function update(Request $request, TransactionStatus $transactionStatus)
    {
        try {
            $request->validate([
                'name' => 'required|unique:transaction_statuses,name,' . $transactionStatus->id,
                'description' => 'nullable',
            ]);

            $transactionStatus->update($request->all());

            return response()->json($transactionStatus, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el estado de transacción'], 500);
        }
    }

    public function destroy(TransactionStatus $transactionStatus)
    {
        try {
            $transactionStatus->delete();

            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el estado de transacción'], 500);
        }
    }
}
