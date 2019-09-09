<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSessionDoesntHaveErrors extends BaseMatcher
{
    static function match(TestResponse $response, $keys=[], $format=null, $errorBag='default')
    {
        static::buildDescription(
            'pass assertSessionDoesntHaveErrors().',
            compact('keys', 'format', 'errorBag')
        );

        return static::assert(function() use ($response, $keys, $format, $errorBag) {
            $response->assertSessionDoesntHaveErrors($keys, $format, $errorBag);
        });
    }
}
