<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonCount extends BaseMatcher
{
    static function match(TestResponse $response, int $count, $key=null)
    {
        static::buildDescription(
            'pass assertJsonCount().',
            compact('count', 'key')
        );

        return static::assert(function() use ($response, $count, $key) {
            $response->assertJsonCount($count, $key);
        });
    }
}
