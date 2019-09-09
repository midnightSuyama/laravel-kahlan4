<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSuccessful extends BaseMatcher
{
    static function match(TestResponse $response)
    {
        static::buildDescription(
            'pass assertSuccessful().'
        );

        return static::assert(function() use ($response) {
            $response->assertSuccessful();
        });
    }
}
