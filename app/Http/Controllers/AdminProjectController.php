<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller {

    // Menampilkan semua project
    public function index() {
        $projects = Project::latest()->get();

        return view('admin.project.index', compact('projects'));
    }

    // Menampilkan detail project
    public function show(Project $project) {
        return view('admin.project.show', compact('project'));
    }

    // Menyetujui project
    public function approve(Project $project) {
        $project->status = 'disetujui';
        $project->save();

        return back()->with('success', 'Project berhasil disetujui.');
    }

    // Menolak project
    public function reject(Project $project) {
        $project->status = 'ditolak';
        $project->save();

        return back()->with('success', 'Project berhasil ditolak.');
    }

    public function antrean(Request $request)
{
    $query = Project::with('user');

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('title', 'LIKE', "%{$search}%")
              ->orWhereHas('user', fn($q) => $q->where('name', 'LIKE', "%{$search}%"));
        });
    }

    $projects = $query->orderBy('created_at', 'desc')->paginate(5);
    $projects->appends($request->only(['search', 'status']));

    return view('admin.antrean', compact('projects'));
}

}
