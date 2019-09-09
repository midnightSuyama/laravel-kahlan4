<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassOk extends BaseMatcher
{
    static function match(TestResponse $response)
    {
        static::buildDescription(
            'pass assertOk().'
        );

        return static::assert(function() use ($response) {
            $response->assertOk();
        });
    }
}
