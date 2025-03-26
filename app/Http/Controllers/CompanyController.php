<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function create()
    {
        return view('create_campaign');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'platform' => 'required',
            'followers' => 'required|integer|min:100',
            'engagement_rate' => 'required',
            'niche' => 'required',
            'payment_type' => 'required',
            'budget' => 'required|numeric|min:1',
            'deadline' => 'required|date',
        ]);

        // Save campaign logic here...

        return redirect()->route('campaign.create')->with('success', 'Campaign Created Successfully!');
    }
}
