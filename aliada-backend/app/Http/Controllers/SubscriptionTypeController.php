<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\SubscriptionType;

class SubscriptionTypeController extends Controller
{
    public function index()
    {
        try {
            $subscriptionTypes = SubscriptionType::all();
            return response()->json(['data' => $subscriptionTypes]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching subscription types'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:subscription_types',
                'description' => 'nullable',
            ]);

            $subscriptionType = SubscriptionType::create($request->all());

            return response()->json(['message' => 'Subscription type created successfully', 'data' => $subscriptionType], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error creating subscription type'], 500);
        }
    }

    public function show(SubscriptionType $subscriptionType)
    {
        try {
            return response()->json(['data' => $subscriptionType]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching subscription type'], 500);
        }
    }

    public function update(Request $request, SubscriptionType $subscriptionType)
    {
        try {
            $request->validate([
                'name' => ['required', Rule::unique('subscription_types')->ignore($subscriptionType->id)],
                'description' => 'nullable',
            ]);

            $subscriptionType->update($request->all());

            return response()->json(['message' => 'Subscription type updated successfully', 'data' => $subscriptionType]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating subscription type'], 500);
        }
    }

    public function destroy(SubscriptionType $subscriptionType)
    {
        try {
            $subscriptionType->delete();
            return response()->json(['message' => 'Subscription type deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error deleting subscription type'], 500);
        }
    }
}
