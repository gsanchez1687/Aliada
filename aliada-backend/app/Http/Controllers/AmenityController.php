<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenity;

class AmenityController extends Controller
{
    public function index()
    {
        try {
            return Amenity::all();
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            return Amenity::create($request->all());
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return Amenity::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $model = Amenity::findOrFail($id);
            $model->update($request->all());
            return $model;
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $model = Amenity::findOrFail($id);
            $model->delete();
            return 204;
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }
}
