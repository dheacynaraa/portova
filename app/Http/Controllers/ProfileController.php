<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller {

    // Menampilkan profil
    public function index() {
        $user = Auth::user();

        $projects = Project::where('user_id', $user_id)
            ->latest()
            ->get();

        return view('profile.index', compact('user'));
    }

    // Update profil
    public function update(Request $request) {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|max:100',
            'university' => 'required|max:100',
            'link_instagram' => 'required|url',
            'link_github' => 'required|url',
            'bio' => 'nullable|max:500',
            'image_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image_profile')) {
            
        if ($user->image_profile &&
            File::exists(public_path('img/profile/'.$user->image_profile))) {
                File::delete(public_path('img/profile/'.$user->image_profile));
            }

            $filename = time() . '.' . $request->image_profile->extension();

            $request->image_profile->move(
                public_path('img/profile'),
                $filename
            );

            $user->image_profile = $filename;
        }

        $user->name = $request->name;
        $user->university = $request->university;
        $user->link_instagram = $request->link_instagram;
        $user->link_github = $request->link_github;
        $user->bio = $request->bio;
        
        $user->save();

        return redirect('/profile');
    }

}
