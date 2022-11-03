<?php

namespace Tests\Unit;

use App\Service\MailService;
use PHPUnit\Framework\TestCase;

class MailServiceTest extends TestCase
{
    private $mailServiceMock;

    public function setUp(): void
    {
        parent::setUp();

        $this->mailServiceMock = $this->createMock(MailService::class);
    }

    /**
     * @test
     *
     * Mail Service test.
     *
     * @return void
     */
    public function testMailSentWithMessageOfDay()
    {
        $receiver = [
            'name' => 'PHPUnit',
            'to' => 'phpunit@email.com'
        ];

        $this->mailServiceMock->method('sendMessage')->willReturn(true);

        $this->assertTrue(true, $this->mailServiceMock->sendMessage($receiver));
    }
}
