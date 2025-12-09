<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'purchased_at',
    ];

    protected function casts(): array
    {
        return [
            'purchased_at' => 'datetime',
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public static function productsForDailyReport()
    {
        return DB::table('baskets AS b')
            ->select([
                'p.name',
                'p.price',
                DB::raw('SUM(bp.quantity) AS quantity'),
                DB::raw('(SUM(bp.quantity) * p.price) AS totalPrice'),
            ])
            ->join('basket_product as bp', 'b.id', 'bp.basket_id')
            ->join('products as p', 'p.id', 'bp.product_id')
            ->whereDate('b.purchased_at', '=', DB::raw('DATE(NOW())'))
            ->groupBy('p.id')
            ->get();
    }
}
