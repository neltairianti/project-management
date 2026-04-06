<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    // 📋 Tampilkan semua task
    public function index()
    {
        $tasks = Task::with('project')->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    // ➕ Form tambah task
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    // 💾 Simpan task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'project_id' => 'required'
        ]);

        Task::create([
            'title' => $request->title,
            'status' => 'todo',
            'project_id' => $request->project_id
        ]);

        return redirect('/tasks')->with('success', 'Task berhasil ditambahkan');
    }

    // ✏️ Form edit
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::all();

        return view('tasks.edit', compact('task', 'projects'));
    }

    // 🔄 Update task
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->title,
            'project_id' => $request->project_id
        ]);

        return redirect('/tasks');
    }

    // ❌ Hapus task
    public function destroy($id)
    {
        Task::destroy($id);
        return back();
    }

    // 🔥 UPDATE STATUS (INI YANG KAMU TANYA)
    public function updateStatus($id, $status)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'status' => $status
        ]);

        return back();
    }
}
