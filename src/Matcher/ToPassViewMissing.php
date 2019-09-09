<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassViewMissing extends BaseMatcher
{
    static function match(TestResponse $response, $key)
    {
        static::buildDescription(
            'pass assertViewMissing().',
            compact('key')
        );

        return static::assert(function() use ($response, $key) {
            $response->assertViewMissing($key);
        });
    }
}
