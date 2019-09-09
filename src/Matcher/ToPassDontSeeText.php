<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassDontSeeText extends BaseMatcher
{
    static function match(TestResponse $response, $value)
    {
        static::buildDescription(
            'pass assertDontSeeText().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertDontSeeText($value);
        });
    }
}
