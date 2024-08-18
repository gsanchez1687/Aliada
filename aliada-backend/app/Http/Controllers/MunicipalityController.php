<?php

namespace App\Http\Controllers;

use App\Models\Municipality;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    public function index()
    {
        try {
            return Municipality::all();
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {

            return Municipality::create($request->all());
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }
    public function getMunicipalitiesByStateId($stateId)
    {
        try {
            return Municipality::where('state_id', '=', $stateId)->get();
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return Municipality::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $municipality = Municipality::findOrFail($id);
            $municipality->update($request->all());
            return $municipality;
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $municipality = Municipality::findOrFail($id);
            $municipality->delete();
            return 204;
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }
}
