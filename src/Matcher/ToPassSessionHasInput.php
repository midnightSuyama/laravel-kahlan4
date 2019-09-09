<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSessionHasInput extends BaseMatcher
{
    static function match(TestResponse $response, $key, $value=null)
    {
        static::buildDescription(
            'pass assertSessionHasInput().',
            compact('key', 'value')
        );

        return static::assert(function() use ($response, $key, $value) {
            $response->assertSessionHasInput($key, $value);
        });
    }
}
