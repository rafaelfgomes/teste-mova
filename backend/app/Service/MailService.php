<?php

namespace App\Service;

use App\Events\EmailSentEvent;
use App\Interfaces\MailServiceContract;
use App\Interfaces\MessageServiceContract;
use App\Mail\MessageOfDay;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Mail;

class MailService implements MailServiceContract
{
    public function __construct(
        protected MessageServiceContract $messageService
    ) {
    }

    public function sendMessage(array $receiver): ?bool
    {
        $date = Carbon::now()->format('d/m');

        $message = $this->messageService->messageOfDay($date);

        $emailSent = Mail::to($receiver['to'])->send(new MessageOfDay($message));

        if (! $emailSent) {
            return false;
        }

        $nowFormated = CarbonImmutable::now(env('APP_TIMEZONE'))->format('d/m/Y H:i:s');

        $explodedDate = explode(' ', $nowFormated);

        $emailSentMessage = 'Email enviado com sucesso para %s no email %s em ' .$explodedDate[0] . ' às ' . $explodedDate[1];

        event(new EmailSentEvent(sprintf($emailSentMessage, $receiver['name'], $receiver['to'])));

        return true;
    }
}