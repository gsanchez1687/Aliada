<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        try {
            return State::all();
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            return State::create($request->all());
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            return State::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $state = State::findOrFail($id);
            $state->update($request->all());
            return $state;
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $state = State::findOrFail($id);
            $state->delete();
            return 204;
        } catch (\Exception $e) {
            return response()->json(['message' =>  $e->getMessage()], 500);
        }
    }
}
