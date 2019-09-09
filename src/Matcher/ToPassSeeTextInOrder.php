<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSeeTextInOrder extends BaseMatcher
{
    static function match(TestResponse $response, array $values)
    {
        static::buildDescription(
            'pass assertSeeTextInOrder().',
            compact('values')
        );

        return static::assert(function() use ($response, $values) {
            $response->assertSeeTextInOrder($values);
        });
    }
}
