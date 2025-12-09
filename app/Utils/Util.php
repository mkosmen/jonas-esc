<?php

namespace App\Utils;

use Illuminate\Support\Number;

class Util
{
    public static function money(int|float $value)
    {
        return Number::currency($value, in: 'EUR', locale: 'en', precision: 2);
    }
}
