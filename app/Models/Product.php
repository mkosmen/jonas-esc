<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'price',
        'stock_quantity',
    ];

    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class);
    }

    #[Scope]
    protected function hasRemaining(Builder $query): void
    {
        $query->where('stock_quantity', '>', 0);
    }
}
