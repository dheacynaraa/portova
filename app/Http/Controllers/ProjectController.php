<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller {

    // Menampilkan semua project yang sudah disetujui
    public function index(Request $request) {
        $search = $request->search;

        $projects = Project::where('status', 'disetujui')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{search}%")
                      ->orWhere('tech_stack', 'like', "%{search}%");
            })
            ->latest()
            ->get();

            return view('project.index', compact('projects'));
    }

    // Menyimpan project baru
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'tech_stack' => 'required|max:255',
            'link_repo' => 'required|url',
            'link_demo' => 'required|url',            
            'project_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = null;

        if ($request->hasFile('project_image')) {
            $filename = time(). '.' . $request->image->extension();

            $request->project_image->move(
                public_path('img/project'),
                $filename
            );
        }

        Project::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'tech_stack' => $request->tech_stack,
            'link_repo' => $request->link_repo,
            'link_demo' => $request->link_demo,            
            'project_image' => $filename,
            'status' => 'diproses'
        ]);

        return redirect('/profile');
    }

    // Menampilkan detail project
    public function show(Project $project) {
        return view('project.show', compact('project'));
    }

    // Update project
    public function update(Request $request, Project $project) {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
            'tech_stack' => 'required|max:255',
            'link_repo' => 'required|url',
            'link_demo' => 'required|url',            
            'project_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        if ($request->hasFile('project_image')) {
            $filename = time() . '.' . $request->project_image->extension();

            $request->project_image->move (
                public_path('img/project'),
                $filename
            );

            $project->project_image = $filename;
        }

        $project->title = $request->title;
        $project->description = $request->description;
        $project->tech_stack = $request->tech_stack;
        $project->link_repo = $request->link_repo;
        $project->link_demo = $request->link_demo;
        
        $project->status = 'diproses';

        $project->save();

        return redirect('/profile');
    }

    // Menghapus project
    public function destroy(Project $project) {
        $project->delete();

        return redirect('/profile');
    }
}


