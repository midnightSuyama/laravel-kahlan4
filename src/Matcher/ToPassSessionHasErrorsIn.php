<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSessionHasErrorsIn extends BaseMatcher
{
    static function match(TestResponse $response, $errorBag, $keys=[], $format=null)
    {
        static::buildDescription(
            'pass assertSessionHasErrorsIn().',
            compact('errorBag', 'keys', 'format')
        );

        return static::assert(function() use ($response, $errorBag, $keys, $format) {
            $response->assertSessionHasErrorsIn($errorBag, $keys, $format);
        });
    }
}
