<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonMissingExact extends BaseMatcher
{
    static function match(TestResponse $response, array $data)
    {
        static::buildDescription(
            'pass assertJsonMissingExact().',
            compact('data')
        );

        return static::assert(function() use ($response, $data) {
            $response->assertJsonMissingExact($data);
        });
    }
}
