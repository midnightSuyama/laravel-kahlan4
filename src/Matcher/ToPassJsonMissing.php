<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonMissing extends BaseMatcher
{
    static function match($response, array $data, $exact=false)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonMissing().',
            compact('data', 'exact')
        );

        return static::assert(function() use ($response, $data, $exact) {
            $response->assertJsonMissing($data, $exact);
        });
    }
}
