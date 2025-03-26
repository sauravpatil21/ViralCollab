<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registerInfluencer(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|size:10',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'payment_info' => 'required|string|max:255',
            'pan' => 'nullable|string|size:10',
            'primary_niche' => 'required|string|max:255',
            'secondary_niche' => 'nullable|string|max:255',
            'bio' => 'required|string|max:250',
            'profile_picture' => 'required|image|max:2048',
            'social_platform' => 'required|array',
            'social_handle' => 'required|array',
            'followers_count' => 'required|array',
            'social_link' => 'nullable|array',
        ]);

        $user = User::create([
            'name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'influencer',
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'payment_info' => $request->payment_info,
            'pan' => $request->pan,
            'primary_niche' => $request->primary_niche,
            'secondary_niche' => $request->secondary_niche,
            'bio' => $request->bio,
            'profile_picture' => $request->file('profile_picture')->store('profile_pictures', 'public'),
            'social_platforms' => json_encode($request->social_platform),
            'social_handles' => json_encode($request->social_handle),
            'followers_count' => json_encode($request->followers_count),
            'social_links' => json_encode($request->social_link),
        ]);

        Auth::login($user);

        return redirect()->route('influencer.dashboard');
    }

    public function registerCompany(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'business_email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'contact_person' => 'required|string|max:255',
            'phone' => 'required|string|size:10',
            'brand_category' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'description' => 'required|string|max:250',
            'address' => 'required|string|max:255',
            'gst' => 'nullable|string|max:15',
            'logo' => 'required|image|max:2048',
        ]);

        $user = User::create([
            'name' => $request->company_name,
            'email' => $request->business_email,
            'password' => Hash::make($request->password),
            'role' => 'company',
            'contact_person' => $request->contact_person,
            'phone' => $request->phone,
            'brand_category' => $request->brand_category,
            'website' => $request->website,
            'description' => $request->description,
            'address' => $request->address,
            'gst' => $request->gst,
            'logo' => $request->file('logo')->store('company_logos', 'public'),
        ]);

        Auth::login($user);

        return redirect()->route('company.dashboard');
    }
} 