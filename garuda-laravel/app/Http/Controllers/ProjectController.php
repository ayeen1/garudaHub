<?php

namespace App\Http\Controllers;

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
}
