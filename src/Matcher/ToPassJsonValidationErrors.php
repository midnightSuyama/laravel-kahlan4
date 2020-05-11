<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonValidationErrors extends BaseMatcher
{
    static function match($response, $errors)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonValidationErrors().',
            compact('errors')
        );

        return static::assert(function() use ($response, $errors) {
            $response->assertJsonValidationErrors($errors);
        });
    }
}
