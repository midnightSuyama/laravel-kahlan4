<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonMissing extends BaseMatcher
{
    static function match(TestResponse $response, array $data, $exact=false)
    {
        static::buildDescription(
            'pass assertJsonMissing().',
            compact('data', 'exact')
        );

        return static::assert(function() use ($response, $data, $exact) {
            $response->assertJsonMissing($data, $exact);
        });
    }
}
