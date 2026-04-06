<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::query();

        // 🔍 SEARCH
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $projects = $query->latest()->paginate(5);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deadline' => 'required|date',
            'status' => 'required'
        ]);

        Project::create([
            'name' => $request->name,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'user_id' => auth()->id()
        ]);

        return redirect()->route('projects.index')->with('success', 'Project berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project berhasil diupdate');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return back()->with('success', 'Project berhasil dihapus');
    }
}
