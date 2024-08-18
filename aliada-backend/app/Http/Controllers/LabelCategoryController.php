<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabelCategory;

class LabelCategoryController extends Controller
{
    public function index()
    {
        try {
            $labelCategories = LabelCategory::all();
            return response()->json($labelCategories);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $labelCategory = LabelCategory::create($request->all());
            return response()->json($labelCategory, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $labelCategory = LabelCategory::findOrFail($id);
            return response()->json($labelCategory);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $labelCategory = LabelCategory::findOrFail($id);
            $labelCategory->update($request->all());
            return response()->json($labelCategory);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $labelCategory = LabelCategory::findOrFail($id);
            $labelCategory->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getCategoryLabels($categoryId)
    {
        try {
            $labels = LabelCategory::where('category_id', $categoryId)->get();
            return response()->json($labels);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
