<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Http\Requests\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Interfaces\MessageServiceContract;
use Exception;

class MessageController extends Controller
{
    public function __construct(
        protected MessageServiceContract $messageService
    ) {
    }

    public function __invoke(MessageRequest $request)
    {
        try {
            $data = $request->validated();

            $result = $this->messageService->messageOfDay($data['date']);

            return new MessageResource($result);
        } catch (Exception $e) {
            return new JsonResponse(['data' => ['error' => $e->getMessage()]]);
        }
    }
}
