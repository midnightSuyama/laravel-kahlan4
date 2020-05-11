<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionHasErrors extends BaseMatcher
{
    static function match($response, $keys=[], $format=null, $errorBag='default')
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionHasErrors().',
            compact('keys', 'format', 'errorBag')
        );

        return static::assert(function() use ($response, $keys, $format, $errorBag) {
            $response->assertSessionHasErrors($keys, $format, $errorBag);
        });
    }
}
