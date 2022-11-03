<?php

namespace Tests\Unit;

use Carbon\Carbon;
use App\Service\MessageService;
use PHPUnit\Framework\TestCase;

class MessageServiceTest extends TestCase
{
    private MessageService $messageService;

    public function setUp(): void
    {
        parent::setUp();

        $this->messageService = new MessageService();
    }

    /**
     * @test
     *
     * Message of day success test
     *
     * @return void
     */
    public function testMessageOfDayIsCreatedSucessfully()
    {
        $date = Carbon::now()->format('d/m');

        $result = $this->messageService->messageOfDay($date);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('week_day', $result);
        $this->assertArrayHasKey('message', $result);
    }
}
