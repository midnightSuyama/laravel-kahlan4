<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonValidationErrors extends BaseMatcher
{
    static function match(TestResponse $response, $errors)
    {
        static::buildDescription(
            'pass assertJsonValidationErrors().',
            compact('errors')
        );

        return static::assert(function() use ($response, $errors) {
            $response->assertJsonValidationErrors($errors);
        });
    }
}
