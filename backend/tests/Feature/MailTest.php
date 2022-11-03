<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class MailTest extends TestCase
{
    private const MAIL_API_ROUTE = 'send.email';

    /**
     * Test send email and return ok.
     *
     * @return void
     */
    public function testSendEmailReturnOk()
    {
        $receiver = [
            'name' => 'PHPUnit',
            'to' => 'phpunit@email.com'
        ];

        $response = $this->post(route(self::MAIL_API_ROUTE), $receiver);

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * Test send email and return unprocessable.
     *
     * @return void
     */
    public function testSendEmailReturnUnprocessable()
    {
        $receiver = [
            'name' => 'PHPUnit',
            'to' => ''
        ];

        $header = [
            'Accept' => 'application/json'
        ];

        $response = $this->postJson(route(self::MAIL_API_ROUTE), $receiver, $header);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
