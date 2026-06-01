<?php

namespace App\Models;

use App\Events\BookCreatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property \Illuminate\Database\Eloquent\Collection<int, Borrowing> $borrowings
 * @property Publisher|null $publisher
 */
class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The event map for the model.
     *
     * @var array<string, class-string>
     */
    protected $dispatchesEvents = [
        'created' => BookCreatedEvent::class,
    ];

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }

    public function isBorrowed()
    {
        return $this->borrowings
            ->whereNull('return_date')
            ->isNotEmpty();
    }

    public function statusLabel()
    {
        return $this->isBorrowed()
            ? __('books.borrowed')
            : __('books.available');
    }
}
