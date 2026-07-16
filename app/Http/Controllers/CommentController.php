<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Menambah komentar
    public function store(Request $request, Project $project) {
        $request->validate([
            'comment' => 'required|max:500'
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'project_id' => $project->id,
            'comment' => $request->comment
        ]);

        return back();
    }

    // Menghapus komentar
    public function destroy(Comment $comment) {
        if ($comment->user_id != Auth::id()) {
            abort(403);
        }

        $comment->delete();

        return back();
    }
}
