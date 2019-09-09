<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassUnauthorized extends BaseMatcher
{
    static function match(TestResponse $response)
    {
        static::buildDescription(
            'pass assertUnauthorized().'
        );

        return static::assert(function() use ($response) {
            $response->assertUnauthorized();
        });
    }
}
