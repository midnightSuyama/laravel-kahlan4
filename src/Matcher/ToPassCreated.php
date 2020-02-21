<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassCreated extends BaseMatcher
{
    static function match(TestResponse $response)
    {
        static::buildDescription(
            'pass assertCreated().'
        );

        return static::assert(function() use ($response) {
            $response->assertCreated();
        });
    }
}

