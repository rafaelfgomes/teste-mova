<?php

namespace App\Strategy;

use Carbon\Carbon;
use App\Objects\WeekDay;
use App\Objects\Holiday as ObjHoliday;
use App\Interfaces\MessageStrategyContract;

class Holiday implements MessageStrategyContract
{
    public function show(?Carbon $date = null): ?array
    {
        $dateAndMonth = $date->format('d/m');

        $dayOfWeek = $date->dayOfWeek;

        $index = array_rand(ObjHoliday::MESSAGES[$dateAndMonth]);

        return [
            'week_day' => WeekDay::NAME[$dayOfWeek],
            'message' => ObjHoliday::MESSAGES[$dateAndMonth][$index]
        ];
    }
}