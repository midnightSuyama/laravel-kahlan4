<?php

namespace LaravelKahlan4\Matcher;

class ToPassSeeTextInOrder extends BaseMatcher
{
    static function match($response, array $values)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSeeTextInOrder().',
            compact('values')
        );

        return static::assert(function() use ($response, $values) {
            $response->assertSeeTextInOrder($values);
        });
    }
}
