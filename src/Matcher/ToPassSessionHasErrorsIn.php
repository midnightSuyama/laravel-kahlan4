<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionHasErrorsIn extends BaseMatcher
{
    static function match($response, $errorBag, $keys=[], $format=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionHasErrorsIn().',
            compact('errorBag', 'keys', 'format')
        );

        return static::assert(function() use ($response, $errorBag, $keys, $format) {
            $response->assertSessionHasErrorsIn($errorBag, $keys, $format);
        });
    }
}
