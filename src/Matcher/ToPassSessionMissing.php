<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSessionMissing extends BaseMatcher
{
    static function match(TestResponse $response, $key)
    {
        static::buildDescription(
            'pass assertSessionMissing().',
            compact('key')
        );

        return static::assert(function() use ($response, $key) {
            $response->assertSessionMissing($key);
        });
    }
}
