<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonFragment extends BaseMatcher
{
    static function match(TestResponse $response, array $data)
    {
        static::buildDescription(
            'pass assertJsonFragment().',
            compact('data')
        );

        return static::assert(function() use ($response, $data) {
            $response->assertJsonFragment($data);
        });
    }
}
