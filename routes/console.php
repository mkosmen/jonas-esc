<?php

use App\Jobs\DailySalesReport;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new DailySalesReport)->daily('23:55');
