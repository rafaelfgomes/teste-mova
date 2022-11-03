<?php

namespace App\Service;

use Carbon\Carbon;
use App\Strategy\Message;
use App\Strategy\Holiday;
use App\Strategy\Context;
use App\Objects\Holiday as ObjHoliday;
use App\Interfaces\MessageServiceContract;
use Carbon\Exceptions\InvalidDateException;

class MessageService implements MessageServiceContract
{
    /**
     * Set message of day
     *
     * @param string $date
     *
     * @throws InvalidDateException
     *
     * @return array|null
     */
    public function messageOfDay(string $date): ?array
    {
        $dateArray = explode('/', $date);

        $objDate = Carbon::createSafe(null, (int) $dateArray[1], (int) $dateArray[0]);

        if (in_array($objDate->format('d/m'), array_keys(ObjHoliday::MESSAGES))) {
            return (new Context(new Holiday()))->messageOfDay($objDate);
        }

        return (new Context(new Message()))->messageOfDay($objDate);;
    }
}