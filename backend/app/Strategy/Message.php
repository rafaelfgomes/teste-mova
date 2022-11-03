<?php

namespace App\Strategy;

use Carbon\Carbon;
use App\Objects\WeekDay;
use App\Objects\Message as ObjMessage;
use App\Interfaces\MessageStrategyContract;

class Message implements MessageStrategyContract
{
    public function show(?Carbon $date = null): ?array
    {
        $dayOfWeek = $date->dayOfWeek;

        $index = array_rand(ObjMessage::LIST[$dayOfWeek]);

        return [
            'week_day' => WeekDay::NAME[$dayOfWeek],
            'message' => ObjMessage::LIST[$dayOfWeek][$index]
        ];
    }
}