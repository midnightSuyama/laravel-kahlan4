<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonCount extends BaseMatcher
{
    static function match($response, int $count, $key=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonCount().',
            compact('count', 'key')
        );

        return static::assert(function() use ($response, $count, $key) {
            $response->assertJsonCount($count, $key);
        });
    }
}
