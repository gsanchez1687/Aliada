<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        try {
            $subscriptions = Subscription::all();
            return response()->json(['data' => $subscriptions]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching subscriptions.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'transaction_id' => 'required|exists:transactions,id',
                'status_subscription_id' => 'required|exists:subscription_statuses,id',
                'user_id' => 'required|exists:users,id',
            ]);

            $subscription = Subscription::create($request->all());

            return response()->json(['message' => 'Subscription created successfully', 'data' => $subscription], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while storing the subscription.'], 500);
        }
    }

    public function show(Subscription $subscription)
    {
        try {
            return response()->json(['data' => $subscription]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while fetching the subscription.'], 500);
        }
    }

    public function update(Request $request, Subscription $subscription)
    {
        try {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'transaction_id' => 'required|exists:transactions,id',
                'status_subscription_id' => 'required|exists:subscription_statuses,id',
                'user_id' => 'required|exists:users,id',
            ]);

            $subscription->update($request->all());

            return response()->json(['message' => 'Subscription updated successfully', 'data' => $subscription]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while updating the subscription.'], 500);
        }
    }

    public function destroy(Subscription $subscription)
    {
        try {
            $subscription->delete();
            return response()->json(['message' => 'Subscription deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the subscription.'], 500);
        }
    }
}
