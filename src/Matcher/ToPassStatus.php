<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassStatus extends BaseMatcher
{
    static function match(TestResponse $response, $status)
    {
        static::buildDescription(
            'pass assertStatus().',
            compact('status')
        );

        return static::assert(function() use ($response, $status) {
            $response->assertStatus($status);
        });
    }
}
