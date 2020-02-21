<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonPath extends BaseMatcher
{
    static function match(TestResponse $response, $path, $expect, $strict = false)
    {
        static::buildDescription(
            'pass assertJsonPath().',
            compact('path', 'expect', 'strict')
        );

        return static::assert(function() use ($response, $path, $expect, $strict) {
            $response->assertJsonPath($path, $expect, $strict);
        });
    }
}

