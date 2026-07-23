<?php

namespace App\Http\Controllers;

use App\Models\Project;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Total semua proyek berdasarkan status
        $totalPending = Project::where('status', 'menunggu')->count();
        $totalApproved = Project::where('status', 'disetujui')->count();
        $totalRejected = Project::where('status', 'ditolak')->count();

        // 5 proyek terbaru dengan status menunggu
        $recentProjects = Project::with('user')
            ->where('status', 'menunggu')
            ->latest()
            ->paginate(5);



        return view('admin.dashboard', compact(
            'totalPending',
            'totalApproved',
            'totalRejected',
            'recentProjects'
        ));
    }
}