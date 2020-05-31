<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonMissingExact extends BaseMatcher
{
    static function match($response, array $data)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonMissingExact().',
            compact('data')
        );

        return static::assert(function() use ($response, $data) {
            $response->assertJsonMissingExact($data);
        });
    }
}
