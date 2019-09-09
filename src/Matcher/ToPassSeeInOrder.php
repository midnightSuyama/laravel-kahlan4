<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSeeInOrder extends BaseMatcher
{
    static function match(TestResponse $response, array $values)
    {
        static::buildDescription(
            'pass assertSeeInOrder().',
            compact('values')
        );

        return static::assert(function() use ($response, $values) {
            $response->assertSeeInOrder($values);
        });
    }
}
