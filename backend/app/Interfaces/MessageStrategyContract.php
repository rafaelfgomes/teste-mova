<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface MessageStrategyContract
{
    public function show(?Carbon $date = null): ?array;
}