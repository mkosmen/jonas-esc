<?php

namespace App\Jobs;

use App\Mail\DailySalesReport as DailySalesReportMail;
use App\Models\Basket;
use App\Utils\Util;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class DailySalesReport implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        $products = Basket::productsForDailyReport();
        if (! $products->count()) {
            return;
        }

        $products = $products->map(function ($item) {
            $item->priceMoney = Util::money($item->price);
            $item->totalPriceMoney = Util::money($item->totalPrice);

            return $item;
        });

        $grandTotal = $products->reduce(fn ($p0, $value, $key) => $p0 + $value->totalPrice, 0);

        Mail::to(config('mail.from.address'))->send(new DailySalesReportMail($products, $grandTotal));
    }
}
