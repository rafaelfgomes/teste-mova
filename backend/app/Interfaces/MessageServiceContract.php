<?php

namespace App\Interfaces;

interface MessageServiceContract
{
    public function messageOfDay(string $date): ?array;
}