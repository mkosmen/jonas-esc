<?php

namespace App\Http\Controllers;

use App\Events\CheckLowStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BasketController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user = $user->load(['basket', 'basket.products']);

        if (! $user->basket || ! $user->basket->products->count()) {
            return to_route('home');
        }

        $totalPrice = $user->basket->products->reduce(function ($p0, $value) {
            return $p0 + ($value->price * $value->pivot->quantity);
        }, 0);

        return inertia('Basket', ['basket' => $user->basket, 'totalPrice' => $totalPrice]);
    }

    public function purchase(Request $request)
    {
        try {
            $user = $request->user();
            $user = $user->load(['basket', 'basket.products']);

            if (! $user->basket || ! $user->basket->products->count()) {
                return back()->with('errMessage', 'You need to add at least 1 product for this process');
            }

            $user->basket->products->each(function ($value) {
                if ($value->pivot->quantity > $value->stock_quantity) {
                    $value->update(['stock_quantity' => 0]);
                } else {
                    $value->decrement('stock_quantity', $value->pivot->quantity);
                }
            });

            $user->basket->update(['purchased_at' => now()]);
            Cache::set($user->id, 'purchased');
            CheckLowStock::dispatch($user->basket);

            return to_route('basket.success');
        } catch (\Throwable $th) {
            return back()->with('errMessage', 'There is an error. Please try again');
        }
    }

    public function success(Request $request)
    {
        $user = $request->user();
        $purchasedCache = Cache::get($user->id);

        if (! $purchasedCache || $purchasedCache !== 'purchased') {
            return to_route('home');
        }

        Cache::forget($user->id);

        return inertia('Success');
    }
}
