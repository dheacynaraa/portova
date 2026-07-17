<?php

namespace App\Http\Controllers;

use App\Models\Save;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveController extends Controller
{
    // Menambahkan project ke simpan
    public function store($project_id) {
        Save::firstOrCreate([
            'user_id' => Auth::id(),
            'project_id' => $project_id
        ]);

        return back()->with('success', 'Project berhasil ditambahkan ke simpan.');
    }

    // Menghapus project dari simpan
    public function destroy($project_id) {
        Save::where('user_id', Auth::id())
                ->where('project_id', $project_id)
                ->delete();
        
        return back()->with('success', 'Project berhasil dihapus dari simpan.');
    }
}
