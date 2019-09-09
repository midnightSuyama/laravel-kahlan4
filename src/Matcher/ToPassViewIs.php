<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassViewIs extends BaseMatcher
{
    static function match(TestResponse $response, $value)
    {
        static::buildDescription(
            'pass assertViewIs().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertViewIs($value);
        });
    }
}
