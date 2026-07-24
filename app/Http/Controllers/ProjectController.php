<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // 📌 LIST PROJECTS (Explore)
    public function index(Request $request)
    {
        $projects = Project::with('user')
            ->where('status', 'disetujui');

        // Search berdasarkan judul project
        if ($request->filled('search')) {
            $projects->where('title', 'like', '%' . $request->search . '%');
        }

        $projects = $projects
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('project.index', compact('projects'));
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
            'desc' => 'nullable|string', // field di database = desc
            'tech_stacks' => 'nullable|string',
            'link_repo' => 'nullable|url',
            'link_demo' => 'nullable|url',
            'project_image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120', // 5MB
        ]);

        $data = $request->except('project_image');
        $data['user_id'] = Auth::id();
        $data['status'] = 'menunggu'; // status default di database = menunggu

        // Simpan tech stack apa adanya
        $data['tech_stacks'] = $request->tech_stacks;

        // Upload image
        if ($request->hasFile('project_image')) {
            $file = $request->file('project_image');
            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('project', $filename, 'public');
            $data['project_image'] = $path;
        }

        $project = Project::create($data);

        return redirect()
        ->route('profile.index')
        ->with('success', 'Project berhasil diupload dan sedang menunggu persetujuan admin.');
    }

    // 📌 SHOW EDIT FORM
    public function edit(Project $project)
    {
        // Cek kepemilikan: hanya user yang punya atau admin
        if (Auth::id() !== $project->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        return view('project.edit', compact('project'));
    }

    // 📌 UPDATE PROJECT
    public function update(Request $request, Project $project)
    {
        // Cek kepemilikan
        if (Auth::id() !== $project->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string',
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
        if (Auth::id() !== $project->user_id && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Hapus gambar
        if ($project->project_image && Storage::disk('public')->exists($project->project_image)) {
            Storage::disk('public')->delete($project->project_image);
        }

        $project->delete();

        // Redirect ke halaman profile (user punya)
        return redirect()
            ->route('profile.index')
            ->with('success', 'Project berhasil dihapus!');
    }

    // 📌 GET PROJECTS BY USER (Untuk Profile)
    public function userProjects($userId)
    {
        return Project::where('user_id', $userId)->latest()->get();
    }
}