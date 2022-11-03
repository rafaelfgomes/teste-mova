<?php

namespace App\Objects;

class Holiday
{
   public const NEW_YEAR = '01/01';
   public const TIRADENTES = '21/04';
   public const WORKERS_DAY = '01/05';
   public const INDEPENDENCE_DAY = '07/09';
   public const HOLY_MOTHER_DAY = '12/10';
   public const DEADS_DAY = '02/11';
   public const REPUBLICS_PROCLAMATION = '15/11';
   public const CHRISTMAS = '25/12';

   public const MESSAGES = [
      self::NEW_YEAR => [
         'Feliz Ano Novo!!!!',
      ],
      self::TIRADENTES => [
         'Libertas quæ sera tamen'
      ],
      self::WORKERS_DAY => [
         'Dia do trabalho!!!',
      ],
      self::INDEPENDENCE_DAY => [
         'Dia da Independência!!!',
      ],
      self::HOLY_MOTHER_DAY => [
         'NSA',
      ],
      self::DEADS_DAY => [
         'Finados',
      ],
      self::REPUBLICS_PROCLAMATION => [
         'Pátria amada Brasiil!!!',
      ],
      self::CHRISTMAS => [
         'Ho Ho Ho!!!! Feliz Natal!!!!',
      ],
   ];
}
