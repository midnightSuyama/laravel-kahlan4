<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassDontSee extends BaseMatcher
{
    static function match(TestResponse $response, $value)
    {
        static::buildDescription(
            'pass assertDontSee().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertDontSee($value);
        });
    }
}
