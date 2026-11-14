<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $cari = trim((string) $request->query('q', ''));

        $projects = Project::with(['client', 'category'])
            ->withCount('bids')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('title', 'like', "%{$cari}%")
                      ->orWhereHas('category', fn ($k) => $k->where('name', 'like', "%{$cari}%"));
                });
            })
            ->latest('id')
            ->get();

        return view('projects.index', compact('projects', 'cari'));
    }

    public function show(Project $project)
    {
        $project->load([
            'client',
            'category',
            'winningBid.developer',
            'bids' => fn ($q) => $q->with('developer')->orderBy('price'),
        ]);

        return view('projects.show', compact('project'));
    }


    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('projects.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        $project = $request->user()->projects()->create($request->validated());

        return redirect()->route('projects.show', $project)
            ->with('ok', 'Proyek berhasil dipasang.');
    }
}
