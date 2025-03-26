<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function create()
    {
        return view('create_campaign'); // This will load create_campaign.blade.php
    }

    public function manage()
    {
        // For now, we'll create some dummy data since we don't have the Campaign model yet
        $campaigns = collect([
            (object)[
                'id' => 1,
                'name' => 'Summer Collection 2024',
                'status' => 'active',
                'status_color' => 'success',
                'budget' => 25000,
                'start_date' => now(),
                'end_date' => now()->addMonths(2),
                'influencers_count' => 5,
                'description' => 'Promote our new summer collection',
                'target_audience' => 'Fashion enthusiasts',
                'platform' => 'Instagram'
            ],
            (object)[
                'id' => 2,
                'name' => 'Product Launch',
                'status' => 'pending',
                'status_color' => 'warning',
                'budget' => 15000,
                'start_date' => now()->addDays(5),
                'end_date' => now()->addMonths(1),
                'influencers_count' => 3,
                'description' => 'Launch our new product line',
                'target_audience' => 'Tech enthusiasts',
                'platform' => 'YouTube'
            ],
            (object)[
                'id' => 3,
                'name' => 'Brand Awareness',
                'status' => 'completed',
                'status_color' => 'secondary',
                'budget' => 20000,
                'start_date' => now()->subMonths(1),
                'end_date' => now(),
                'influencers_count' => 8,
                'description' => 'Increase brand visibility',
                'target_audience' => 'General audience',
                'platform' => 'Multiple'
            ]
        ]);

        return view('company.manage_campaign', compact('campaigns'));
    }

    public function update(Request $request, $id)
    {
        // Add update logic here
        return redirect()->route('company.campaign.manage')->with('success', 'Campaign updated successfully');
    }

    public function delete($id)
    {
        // Add delete logic here
        return redirect()->route('company.campaign.manage')->with('success', 'Campaign deleted successfully');
    }
}
