<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassForbidden extends BaseMatcher
{
    static function match(TestResponse $response)
    {
        static::buildDescription(
            'pass assertForbidden().'
        );

        return static::assert(function() use ($response) {
            $response->assertForbidden();
        });
    }
}
