<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransactionController extends Controller
{
    public function index()
    {
        try {
            $transactions = Transaction::all();
            return response()->json($transactions);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las transacciones'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'transaction_id' => 'required|unique:transactions',
                'user_id' => 'required|exists:users,id',
                'type' => 'required',
                'amount' => 'required',
                'currency' => 'required',
                'status_id' => 'required|exists:transaction_statuses,id',
            ]);

            $transaction = Transaction::create($request->all());

            return response()->json($transaction, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la transacción'], 500);
        }
    }

    public function show(Transaction $transaction)
    {
        try {
            return response()->json($transaction);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Transacción no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la transacción'], 500);
        }
    }

    public function update(Request $request, Transaction $transaction)
    {
        try {
            $request->validate([
                'transaction_id' => 'required|unique:transactions,transaction_id,' . $transaction->id,
                'user_id' => 'required|exists:users,id',
                'type' => 'required',
                'amount' => 'required',
                'currency' => 'required',
                'status_id' => 'required|exists:transaction_statuses,id',
            ]);

            $transaction->update($request->all());

            return response()->json($transaction, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la transacción'], 500);
        }
    }

    public function destroy(Transaction $transaction)
    {
        try {
            $transaction->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la transacción'], 500);
        }
    }
}
