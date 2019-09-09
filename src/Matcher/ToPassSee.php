<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSee extends BaseMatcher
{
    static function match(TestResponse $response, $value)
    {
        static::buildDescription(
            'pass assertSee().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertSee($value);
        });
    }
}
