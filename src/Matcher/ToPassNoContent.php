<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassNoContent extends BaseMatcher
{
    static function match(TestResponse $response, $status = 204)
    {
        static::buildDescription(
            'pass assertNoContent().',
            compact('status')
        );

        return static::assert(function() use ($response, $status) {
            $response->assertNoContent($status);
        });
    }
}

