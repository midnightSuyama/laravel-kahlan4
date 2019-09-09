<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassNotFound extends BaseMatcher
{
    static function match(TestResponse $response)
    {
        static::buildDescription(
            'pass assertNotFound().'
        );

        return static::assert(function() use ($response) {
            $response->assertNotFound();
        });
    }
}
