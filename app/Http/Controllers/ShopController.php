<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;

class ShopController extends Controller
{
    public function index(Request $request): Response
    {
        $user = $request->user();
        $products = Product::all();
        $user = $user->load(['basket', 'basket.products']);
        $user->basket()->firstOrCreate();

        return inertia('Home', ['products' => $products, 'basket' => $user->basket]);
    }

    public function increment(Request $request, int $id)
    {
        $this->updateQuantity($request->user(), $id);

        return back();
    }

    public function decrement(Request $request, int $id)
    {
        $this->updateQuantity($request->user(), $id, -1);

        return back();
    }

    private function updateQuantity(User $user, int $product_id, int $role = 1)
    {
        $products = $user->basket->products();
        $product = $products->find($product_id);

        if (! $product) {
            $products->attach($product_id, ['quantity' => 1]);

            return;
        }

        if ($role === 1) {
            $product->pivot->increment('quantity');
        } else {
            $product->pivot->decrement('quantity');
        }
    }
}
