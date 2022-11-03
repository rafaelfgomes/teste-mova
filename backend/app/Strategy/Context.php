<?php

namespace App\Strategy;

use App\Interfaces\MessageStrategyContract;
use Carbon\Carbon;

class Context
{
    public function __construct(
        protected MessageStrategyContract $messageStrategy
    ) {
    }

    public function messageOfDay(?Carbon $date)
    {
        return $this->messageStrategy->show($date);
    }
}