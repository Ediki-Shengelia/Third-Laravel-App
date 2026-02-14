<?php

namespace App\Models;

use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Market extends Model
{
    use Notifiable;

    use HasFactory;
    public function isLikedByUser($user)
    {
        return $user ? $this->likes()->where('user_id', $user->id)->exists() : false;
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public static array $type = ['TV', "PC", 'Mobile', 'Watch', 'Others'];
    protected $fillable = ['title', 'old_price', 'price', 'type', 'product_image', 'unique_id', 'phone_number', 'description', 'location', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', "LIKE", '%' . $title . '%');
    }
    private function dateRangeFilter(Builder $query, $from = null, $to = null)
    {
        if ($from && !$to) {
            $query->where('created_at', '>=', $from);
        } elseif (!$from && $to) {
            $query->where('created_at', '<=', $to);
        } elseif ($from && $to) {
            $query->whereBetween('created_at', [$from, $to]);
        }
        return  $query;
    }
    public function scopeWithReviewsCount(Builder $query, $from = null, $to = null): Builder|QueryBuilder
    {
        return $query->withCount([
            'reviews' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ]);
    }
    public function scopeWithAvgRating(Builder $query, $from = null, $to = null): Builder|QueryBuilder
    {
        return $query->withAvg([
            'reviews' => fn(Builder $q) => $this->dateRangeFilter($q, $from, $to)
        ], 'rating');
    }
    public function scopePopular(Builder $query, $from = null, $to = null): Builder|QueryBuilder
    {
        return $query->withReviewsCount($from, $to)
            ->orderBy('reviews_count', 'desc');
    }
    public function scopeHighestRated(Builder $query, $from = null, $to = null): Builder|QueryBuilder
    {
        return $query->withAvgRating($from, $to)
            ->orderBy('reviews_avg_rating', 'desc');
    }
    public function scopeMinReviews(Builder $query, int $min): Builder|QueryBuilder
    {
        return $query->having('reviews_count', '>=', $min);
    }
    public function scopePopularLastMonth(Builder $query): Builder|QueryBuilder
    {
        return $query->popular(now()->subMonth(), now())
            ->highestRated(now()->subMonth(), now())
            ->minReviews(2);
    }
    public function scopePopularLast6Months(Builder $query): Builder|QueryBuilder
    {
        return $query->popular(now()->subMonths(6), now())
            ->highestRated(now()->subMonths(6), now())
            ->minReviews(5);
    }
    public function scopeHighestRatedLastMonth(Builder $query): Builder|QueryBuilder
    {
        return $query->highestRated(now()->subMonth(), now())
            ->popular(now()->subMonth(), now())
            ->minReviews(2);
    }
    public function scopeHighestRatedLast6Months(Builder $query): Builder|QueryBuilder
    {
        return $query->highestRated(now()->subMonths(6), now())
            ->popular(now()->subMonths(6), now())
            ->minReviews(5);
    }
}
