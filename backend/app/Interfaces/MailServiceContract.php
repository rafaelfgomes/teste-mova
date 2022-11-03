<?php

namespace App\Interfaces;

interface MailServiceContract
{
    public function sendMessage(array $receiver): ?bool;
}