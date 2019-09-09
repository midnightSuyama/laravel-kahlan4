<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSessionHasNoErrors extends BaseMatcher
{
    static function match(TestResponse $response)
    {
        static::buildDescription(
            'pass assertSessionHasNoErrors().'
        );

        return static::assert(function() use ($response) {
            $response->assertSessionHasNoErrors();
        });
    }
}
