<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | 👑 ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function admin()
    {
        return view('dashboard.admin', [
            'totalUser' => User::count(),
            'totalProject' => Project::count(),
            'totalTask' => Task::count()
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 🧑‍💼 MANAGER DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function manager()
    {
        return view('dashboard.manager', [
            'totalProject' => Project::count(),
            'totalTask' => Task::count()
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | 👨‍💻 DEVELOPER DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function developer()
    {
        $userId = auth()->id();

        // 🔒 CEK apakah kolom user_id ada (biar gak error)
        if (!Schema::hasColumn('tasks', 'user_id')) {
            return view('dashboard.developer', [
                'taskProject' => 0,
                'taskProgress' => 0,
                'taskDone' => 0,
            ]);
        }

        // 🔥 HITUNG TASK BERDASARKAN USER
        $taskProject = Task::where('user_id', $userId)->count();

        $taskProgress = Task::where('user_id', $userId)
            ->where('status', 'progress')
            ->count();

        $taskDone = Task::where('user_id', $userId)
            ->where('status', 'done')
            ->count();

        return view('dashboard.developer', compact(
            'taskProject',
            'taskProgress',
            'taskDone'
        ));
    }
}
