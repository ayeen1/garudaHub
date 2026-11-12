<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
        protected $fillable = [
        'client_id', 'category_id', 'title', 'description',
        'budget_min', 'budget_max', 'deadline', 'status', 'winning_bid_id',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'date',
            'budget_min' => 'integer',
            'budget_max' => 'integer',
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }

    public function winningBid(): BelongsTo
    {
        return $this->belongsTo(Bid::class, 'winning_bid_id');
    }

    public function isOpen(): bool
    {
        return $this->status === 'open' && $this->deadline->gte(today());
    }
}
