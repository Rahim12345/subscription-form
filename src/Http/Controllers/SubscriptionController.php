<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use RsCode\SubscriptionForm\Models\Subscription;

class SubscriptionController extends Controller
{
    public function form()
    {
        return view('subscription::form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }
}
