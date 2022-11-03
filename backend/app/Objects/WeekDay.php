<?php

namespace App\Objects;

class WeekDay
{
    public const SUNDAY = 0;
    public const MONDAY = 1;
    public const TUESDAY = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY = 4;
    public const FRIDAY = 5;
    public const SATURDAY = 6;

    public const NAME = [
        self::SUNDAY => 'Domingo',
        self::MONDAY => 'Segunda-feira',
        self::TUESDAY => 'Terça-feira',
        self::WEDNESDAY => 'Quarta-feira',
        self::THURSDAY => 'Quinta-feira',
        self::FRIDAY => 'Sexta-feira',
        self::SATURDAY => 'Sábado',
    ];
}