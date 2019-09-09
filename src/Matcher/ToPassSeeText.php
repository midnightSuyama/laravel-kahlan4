<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSeeText extends BaseMatcher
{
    static function match(TestResponse $response, $value)
    {
        static::buildDescription(
            'be passed assertSeeText().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertSeeText($value);
        });
    }
}
