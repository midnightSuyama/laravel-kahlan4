<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassViewHas extends BaseMatcher
{
    static function match(TestResponse $response, $key, $value=null)
    {
        static::buildDescription(
            'pass assertViewHas().',
            compact('key', 'value')
        );

        return static::assert(function() use ($response, $key, $value) {
            $response->assertViewHas($key, $value);
        });
    }
}
