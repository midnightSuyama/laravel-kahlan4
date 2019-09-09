<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonMissingValidationErrors extends BaseMatcher
{
    static function match(TestResponse $response, $keys=null)
    {
        static::buildDescription(
            'pass assertJsonMissingValidationErrors().',
            compact('keys')
        );

        return static::assert(function() use ($response, $keys) {
            $response->assertJsonMissingValidationErrors($keys);
        });
    }
}
