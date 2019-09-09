<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJson extends BaseMatcher
{
    static function match(TestResponse $response, array $data, $strict=false)
    {
        static::buildDescription(
            'pass assertJson().',
            compact('data', 'strict')
        );

        return static::assert(function() use ($response, $data, $strict) {
            $response->assertJson($data, $strict);
        });
    }
}
