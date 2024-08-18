<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaleController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            $sales = Sale::where('user_id', $user->id)->get();
            return response()->json($sales);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las ventas del usuario'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $user = Auth::user();
            $requestData = $request->all();
            $requestData['user_id'] = $user->id;

            $sale = Sale::create($requestData);
            return response()->json($sale, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la venta'], 500);
        }
    }

    public function show($id)
    {
        try {
            $user = Auth::user();
            $sale = Sale::where('user_id', $user->id)->findOrFail($id);
            return response()->json($sale);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la venta'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $sale = Sale::where('user_id', $user->id)->findOrFail($id);
            $sale->update($request->all());
            return response()->json($sale, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la venta'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user();
            $sale = Sale::where('user_id', $user->id)->findOrFail($id);
            $sale->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la venta'], 500);
        }
    }
}
