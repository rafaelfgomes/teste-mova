<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class MessageTest extends TestCase
{
    private const MESSAGE_API_ROUTE = 'message.of.day';

    /**
     * Test message of day and return response ok.
     *
     * @return void
     */
    public function testReceiveMessageOfDayReturnOk()
    {
        $responseStrucuture = [
            'data' => [
                'week_day',
                'message',
            ]
        ];

        $payload = [
            'date' => Carbon::now()->format('d/m')
        ];

        $response = $this->postJson(route(self::MESSAGE_API_ROUTE, $payload));

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure($responseStrucuture,  $response->getContent());
    }

    /**
     * Test message of day and return unprocessable.
     *
     * @return void
     */
    public function testReceiveMessageOfDayReturnUnprocessable()
    {
        $payload = [
            'date' => ''
        ];

        $header = [
            'Accept' => 'application/json'
        ];

        $response = $this->postJson(route(self::MESSAGE_API_ROUTE), $payload, $header);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * Undocumented function
     *
     * Test message of day and return exception.
     *
     * @expectedException InvalidDateException
     *
     * @return void
     */
    public function testReceiveMessageOfDayReturnException()
    {
        $payload = [
            'date' => '15/13'
        ];

        $response = $this->postJson(route(self::MESSAGE_API_ROUTE, $payload));

        $response->assertStatus(Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
