<?php

namespace App\Http\Controllers;

use App\Models\Project;

class AdminDashboardController extends Controller {

    // Menampilkan halaman dashboard
    public function index() {
        $totalPending = Project::where('status', 'menunggu')->count();

        $approvedToday = Project::where('status', 'disetujui')
            ->whereDate('updated_at', today())
            ->count();

        $rejectedToday = Project::where('status', 'ditolak')
            ->whereDate('updated_at', today())
            ->count();

        $latestProjects = Project::with('user')
            ->where('status', 'menunggu')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact (
            'totalPending',
            'approvedToday',
            'rejectedToday',
            'latestProjects'
        ));
    }
}
