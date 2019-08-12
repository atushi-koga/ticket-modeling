<?php

namespace Tests\Unit\TicketPrice\App;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use TicketPrice\App\GetTicketPriceService;
use TicketPrice\App\Request\GetTicketPriceRequest;

class GetTicketPriceServiceTest extends TestCase
{
    /**
     * @dataProvider getPriceProvider
     * @param $request
     * @param $expected
     * @throws \Exception
     */
    public function testGetPrice($request, $expected)
    {
        /** @var GetTicketPriceService $service */
        $service = app(GetTicketPriceService::class);

        $this->assertEquals($expected, $service->getPrice($request));
    }

    public function getPriceProvider()
    {
        $weekday = '2019-08-12';
        $holiday = '2019-08-11';
        $movieDay = '2019-08-01';
        $dayTime = '19:59:59';
        $lateTime = '20:00:00';

        return [
            /*
             * 一般
             */
            '一般・平日・〜20:00' => [
                new GetTicketPriceRequest(1, "{$weekday} {$dayTime}"),
                1800
            ],
            '一般・平日・20:00〜（レイト）' => [
                new GetTicketPriceRequest(1, "{$weekday} {$lateTime}"),
                1300
            ],
            '一般・土日祝・〜20:00' => [
                new GetTicketPriceRequest(1, "{$holiday} {$dayTime}"),
                1800
            ],
            '一般・土日祝・20:00〜（レイト）' => [
                new GetTicketPriceRequest(1, "{$holiday} {$lateTime}"),
                1300
            ],
            '一般・映画の日・〜20:00' => [
                new GetTicketPriceRequest(1, "{$movieDay} {$dayTime}"),
                1100
            ],
            '一般・映画の日・20:00〜（レイト）' => [
                new GetTicketPriceRequest(1, "{$movieDay} {$lateTime}"),
                1100
            ],

            /*
             * シニア（70才以上）
             */
            'シニア（70才以上）・平日・〜20:00' => [
                new GetTicketPriceRequest(2, "{$weekday} {$dayTime}"),
                1100
            ],
            'シニア（70才以上）・平日・20:00〜（レイト）' => [
                new GetTicketPriceRequest(2, "{$weekday} {$lateTime}"),
                1100
            ],
            'シニア（70才以上）・土日祝・〜20:00' => [
                new GetTicketPriceRequest(2, "{$holiday} {$dayTime}"),
                1100
            ],
            'シニア（70才以上）・土日祝・20:00〜（レイト）' => [
                new GetTicketPriceRequest(2, "{$holiday} {$lateTime}"),
                1100
            ],
            'シニア（70才以上）・映画の日・〜20:00' => [
                new GetTicketPriceRequest(2, "{$movieDay} {$dayTime}"),
                1100
            ],
            'シニア（70才以上）・映画の日・20:00〜（レイト）' => [
                new GetTicketPriceRequest(2, "{$movieDay} {$lateTime}"),
                1100
            ],

            /*
             *学生（大・専）
             */
            '学生（大・専）・平日・〜20:00' => [
                new GetTicketPriceRequest(3, "{$weekday} {$dayTime}"),
                1500
            ],
            '学生（大・専）・平日・20:00〜（レイト）' => [
                new GetTicketPriceRequest(3, "{$weekday} {$lateTime}"),
                1300
            ],
            '学生（大・専）・土日祝・〜20:00' => [
                new GetTicketPriceRequest(3, "{$holiday} {$dayTime}"),
                1500
            ],
            '学生（大・専）・土日祝・20:00〜（レイト）' => [
                new GetTicketPriceRequest(3, "{$holiday} {$lateTime}"),
                1300
            ],
            '学生（大・専）・映画の日・〜20:00' => [
                new GetTicketPriceRequest(3, "{$movieDay} {$dayTime}"),
                1100
            ],
            '学生（大・専）・映画の日・20:00〜（レイト）' => [
                new GetTicketPriceRequest(3, "{$movieDay} {$lateTime}"),
                1100
            ],
        ];
    }
}
