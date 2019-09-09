<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSessionHas extends BaseMatcher
{
    static function match(TestResponse $response, $key, $value=null)
    {
        static::buildDescription(
            'pass assertSessionHas().',
            compact('key', 'value')
        );

        return static::assert(function() use ($response, $key, $value) {
            $response->assertSessionHas($key, $value);
        });
    }
}
