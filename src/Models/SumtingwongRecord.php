<?php

namespace Athphane\Sumtingwong\Models;

use Athphane\Sumtingwong\Database\Factories\SumtingwongRecordFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User;

class SumtingwongRecord extends Model
{
    use HasFactory;

    protected $table = 'sumtingwong_entries';

    protected $fillable = [
        'addressed_at'
    ];

    protected $casts = [
        'addressed_at' => 'datetime',
    ];

    protected static function newFactory()
    {
        return new (SumtingwongRecordFactory::class);
    }

    public static function latest(): Builder
    {
        return static::query()->latest();
    }

    public static function latestEntry(): self
    {
        return static::query()->latest()->first();
    }

    public function scopeOrderBySeverity(Builder $query): Builder
    {
        return $query->orderBy('severity');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedUserAttribute(): ?string
    {
        if ($this->user) {
            return "{$this->user?->name} ({$this->user_id})";
        }

        return null;
    }
}
