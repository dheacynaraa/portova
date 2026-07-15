<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller {
    
    // Menambahkan project ke favorit
    public function store($project_id) {
        Like::firstOrCreate([
            'user_id' => Auth::id(),
            'project_id' => $project_id
        ]);

        return back()->with('success', 'Project berhasil ditambahkan ke favorit.');
    }

    // Menghapus project dari favorit
    public function destroy($project_id) {
        Like::where('user_id', Auth::id())
                ->where('project_id', $project_id)
                ->delete();
        
        return back()->with('success', 'Project berhasil dihapus dari favorit.');
    }
}
