<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBidRequest;
use App\Models\Project;

class BidController extends Controller
{
    public function store(StoreBidRequest $request, Project $project)
    {
        if (! $project->isOpen()) {
            return back()->with('err', 'Lelang proyek ini sudah ditutup.');
        }

        $sudahBid = $project->bids()
            ->where('developer_id', $request->user()->id)
            ->exists();

        if ($sudahBid) {
            return back()->with('err', 'Kamu sudah mengajukan penawaran untuk proyek ini.');
        }

        $project->bids()->create([
            ...$request->validated(),
            'developer_id' => $request->user()->id,
        ]);

        return redirect()->route('projects.show', $project)
            ->with('ok', 'Penawaran berhasil dikirim.');
    }
}
