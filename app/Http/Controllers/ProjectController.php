<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // 📌 LIST PROJECTS (Explore)
    public function index()
    {
        $projects = Project::with('user')
            ->where('status', 'approved') // Hanya tampilkan yang approved
            ->latest()
            ->paginate(9);
            
        return view('explore', compact('projects'));
    }

    // 📌 SHOW DETAIL PROJECT
    public function show(Project $project)
    {
        return view('project.detail', compact('project'));
    }

    // 📌 SHOW CREATE FORM
    public function create()
    {
        return view('project.create');
    }

    // 📌 STORE NEW PROJECT
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tech_stacks' => 'nullable|string',
            'link_repo' => 'nullable|url',
            'link_demo' => 'nullable|url',
            'project_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // 5MB
        ]);

        $data = $request->except('project_image');
        $data['user_id'] = Auth::id();
        $data['status'] = 'pending'; // Default pending

        // Konversi tech_stacks dari string ke array
        if ($request->filled('tech_stacks')) {
            $techArray = array_map('trim', explode(',', $request->tech_stacks));
            $data['tech_stacks'] = json_encode($techArray);
        }

        // Upload image
        if ($request->hasFile('project_image')) {
            $file = $request->file('project_image');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('project', $filename, 'public');
            $data['project_image'] = $path;
        }

        $project = Project::create($data);

        return redirect()
            ->route('project.show', $project)
            ->with('success', 'Project berhasil diupload! Menunggu approval admin.');
    }

    // 📌 SHOW EDIT FORM
    public function edit(Project $project)
    {
        // Cek kepemilikan: hanya user yang punya atau admin
        if (Auth::id() !== $project->user_id && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // Decode tech_stacks dari JSON ke string
        $techStacks = $project->tech_stacks ? implode(', ', json_decode($project->tech_stacks, true)) : '';

        return view('project.edit', compact('project', 'techStacks'));
    }

    // 📌 UPDATE PROJECT
    public function update(Request $request, Project $project)
    {
        // Cek kepemilikan
        if (Auth::id() !== $project->user_id && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tech_stacks' => 'nullable|string',
            'link_repo' => 'nullable|url',
            'link_demo' => 'nullable|url',
            'project_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $data = $request->except('project_image');

        // Konversi tech_stacks
        if ($request->filled('tech_stacks')) {
            $techArray = array_map('trim', explode(',', $request->tech_stacks));
            $data['tech_stacks'] = json_encode($techArray);
        } else {
            $data['tech_stacks'] = null;
        }

        // Upload image baru
        if ($request->hasFile('project_image')) {
            // Hapus gambar lama
            if ($project->project_image && Storage::disk('public')->exists($project->project_image)) {
                Storage::disk('public')->delete($project->project_image);
            }

            $file = $request->file('project_image');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('project', $filename, 'public');
            $data['project_image'] = $path;
        }

        $project->update($data);

        return redirect()
            ->route('project.show', $project)
            ->with('success', 'Project berhasil diperbarui!');
    }

    // 📌 DELETE PROJECT
    public function destroy(Project $project)
    {
        // Cek kepemilikan
        if (Auth::id() !== $project->user_id && !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus gambar
        if ($project->project_image && Storage::disk('public')->exists($project->project_image)) {
            Storage::disk('public')->delete($project->project_image);
        }

        $project->delete();

        return redirect()
            ->route('profile.show', Auth::id())
            ->with('success', 'Project berhasil dihapus!');
    }

    // 📌 GET PROJECTS BY USER (Untuk Profile)
    public function userProjects($userId)
    {
        $projects = Project::where('user_id', $userId)
            ->latest()
            ->get();
        
        return $projects;
    }
}