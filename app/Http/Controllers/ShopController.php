<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class ShopController extends Controller
{
    public function index(): Response
    {
        $products = \App\Models\Product::all();

        return Inertia::render('Home', ['products' => $products]);
    }
}
