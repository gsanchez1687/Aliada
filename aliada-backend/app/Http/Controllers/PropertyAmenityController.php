<?php

namespace App\Http\Controllers;

use App\Models\PropertyAmenity;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PropertyAmenityController extends Controller
{
    public function index($property_id)
    {
        try {
            $amenities = PropertyAmenity::where('property_id', $property_id)->get();
            return response()->json($amenities);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener las comodidades'], 500);
        }
    }

    public function store(Request $request, $property_id)
    {
        try {
            $amenityData = $request->all();
            $amenityData['property_id'] = $property_id;

            $amenity = PropertyAmenity::create($amenityData);
            return response()->json($amenity, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al crear la comodidad'], 500);
        }
    }

    public function show($property_id, $amenity_id)
    {
        try {
            $amenity = PropertyAmenity::where('property_id', $property_id)->findOrFail($amenity_id);
            return response()->json($amenity);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Comodidad no encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al obtener la comodidad'], 500);
        }
    }

    public function update(Request $request, $property_id, $amenity_id)
    {
        try {
            $amenity = PropertyAmenity::where('property_id', $property_id)->findOrFail($amenity_id);
            $amenity->update($request->all());
            return response()->json($amenity, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar la comodidad'], 500);
        }
    }

    public function destroy($property_id, $amenity_id)
    {
        try {
            PropertyAmenity::where('property_id', $property_id)->findOrFail($amenity_id)->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la comodidad'], 500);
        }
    }
}
