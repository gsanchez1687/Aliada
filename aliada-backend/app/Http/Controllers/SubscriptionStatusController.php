<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionStatus;

class SubscriptionStatusController extends Controller
{
    public function index()
    {
        try {
            $statuses = SubscriptionStatus::all();
            return response()->json(['data' => $statuses]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching subscription statuses.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:subscription_statuses',
                'description' => 'nullable',
            ]);

            $status = SubscriptionStatus::create($request->all());

            return response()->json(['message' => 'Subscription status created successfully', 'data' => $status], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while storing the subscription status.'], 500);
        }
    }

    public function show(SubscriptionStatus $subscriptionStatus)
    {
        try {
            return response()->json(['data' => $subscriptionStatus]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the subscription status.'], 500);
        }
    }

    public function update(Request $request, SubscriptionStatus $subscriptionStatus)
    {
        try {
            $request->validate([
                'name' => 'required|unique:subscription_statuses,name,' . $subscriptionStatus->id,
                'description' => 'nullable',
            ]);

            $subscriptionStatus->update($request->all());

            return response()->json(['message' => 'Subscription status updated successfully', 'data' => $subscriptionStatus]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the subscription status.'], 500);
        }
    }

    public function destroy(SubscriptionStatus $subscriptionStatus)
    {
        try {
            $subscriptionStatus->delete();
            return response()->json(['message' => 'Subscription status deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the subscription status.'], 500);
        }
    }
}
