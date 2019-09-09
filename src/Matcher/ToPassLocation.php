<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassLocation extends BaseMatcher
{
    static function match(TestResponse $response, $uri)
    {
        static::buildDescription(
            'pass assertLocation().',
            compact('uri')
        );

        return static::assert(function() use ($response, $uri) {
            $response->assertLocation($uri);
        });
    }
}
