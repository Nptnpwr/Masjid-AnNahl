<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasjidProfile;
use Illuminate\Http\Request;

class MasjidProfileAdminController extends Controller
{
    public function edit()
    {
        $profile = MasjidProfile::first();
        
        if (!$profile) {
            $profile = new MasjidProfile();
        }

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = MasjidProfile::first();

        if (!$profile) {
            $profile = new MasjidProfile();
        }

        // Upload image
        if ($request->hasFile('about_image')) {
            $path = $request->file('about_image')->store('profile', 'public');
            $profile->about_image = $path;
        }

        $profile->hero_subtitle       = $request->hero_subtitle;
        $profile->about_text_1        = $request->about_text_1;
        $profile->about_text_2        = $request->about_text_2;
        $profile->visi                = $request->visi;
        $profile->misi                = $request->misi;
        $profile->capacity            = $request->capacity;
        $profile->year                = $request->year;
        $profile->routine_activities  = $request->routine_activities;
        $profile->public_info         = $request->public_info;
        $profile->whatsapp            = $request->whatsapp;

        $profile->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}