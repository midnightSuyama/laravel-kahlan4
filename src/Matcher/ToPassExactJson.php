<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassExactJson extends BaseMatcher
{
    static function match(TestResponse $response, array $data)
    {
        static::buildDescription(
            'pass assertExactJson().',
            compact('data')
        );

        return static::assert(function() use ($response, $data) {
            $response->assertExactJson($data);
        });
    }
}
