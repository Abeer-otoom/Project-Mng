<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function stats()
    {
        return response()->json([
            'project_count'=>Project::where('user_id', Auth::id() )->count(),
            'task_count'=>Task::where('user_id', Auth::id() )->count(),


        ]);
    }
}
