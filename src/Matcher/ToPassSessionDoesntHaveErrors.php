<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionDoesntHaveErrors extends BaseMatcher
{
    static function match($response, $keys=[], $format=null, $errorBag='default')
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionDoesntHaveErrors().',
            compact('keys', 'format', 'errorBag')
        );

        return static::assert(function() use ($response, $keys, $format, $errorBag) {
            $response->assertSessionDoesntHaveErrors($keys, $format, $errorBag);
        });
    }
}
