<?php

namespace LaravelKahlan4\Matcher;

class ToPassSeeInOrder extends BaseMatcher
{
    static function match($response, array $values)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSeeInOrder().',
            compact('values')
        );

        return static::assert(function() use ($response, $values) {
            $response->assertSeeInOrder($values);
        });
    }
}
