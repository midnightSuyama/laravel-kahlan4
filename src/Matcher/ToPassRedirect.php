<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassRedirect extends BaseMatcher
{
    static function match(TestResponse $response, $uri=null)
    {
        static::buildDescription(
            'pass assertRedirect().',
            compact('uri')
        );

        return static::assert(function() use ($response, $uri) {
            $response->assertRedirect($uri);
        });
    }
}
