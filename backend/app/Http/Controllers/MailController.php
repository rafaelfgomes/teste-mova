<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use App\Interfaces\MailServiceContract;
use Exception;
use Illuminate\Http\JsonResponse;

class MailController extends Controller
{
    public function __construct(
        protected MailServiceContract $mailService
    ) {
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(MailRequest $request)
    {
        try {
            $validated = $request->validated();

            $result = $this->mailService->sendMessage($validated);

            if (! $result) {
                return new JsonResponse(['data' => ['message' => 'Erro ao enviar o email']]);
            }

            return new JsonResponse(['data' => ['message' => 'Email enviado com sucesso']]);

        } catch (Exception $e) {
            return new JsonResponse(['data' => ['error' => $e->getMessage()]]);
        }
    }
}
