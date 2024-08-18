<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $favorites = Favorite::where('user_id', $user_id)->get();
        return response()->json(['data' => $favorites]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            // Agrega validaciones adicionales según tus necesidades
        ]);

        $favorite = Favorite::create([
            'user_id' => Auth::id(),
            'property_id' => $request->property_id
        ]);

        return response()->json(['message' => 'Favorite created successfully', 'data' => $favorite], 201);
    }

    public function show(Favorite $favorite)
    {
        if ($favorite->user_id != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json(['data' => $favorite]);
    }

    public function update(Request $request, Favorite $favorite)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            // Agrega validaciones adicionales según tus necesidades
        ]);

        if ($favorite->user_id != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $favorite->update([
            'property_id' => $request->property_id
        ]);

        return response()->json(['message' => 'Favorite updated successfully', 'data' => $favorite]);
    }

    public function destroy(Favorite $favorite)
    {
        if ($favorite->user_id != Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $favorite->delete();

        return response()->json(['message' => 'Favorite deleted successfully']);
    }
}
