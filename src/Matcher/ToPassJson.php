<?php

namespace LaravelKahlan4\Matcher;

class ToPassJson extends BaseMatcher
{
    static function match($response, array $data, $strict=false)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJson().',
            compact('data', 'strict')
        );

        return static::assert(function() use ($response, $data, $strict) {
            $response->assertJson($data, $strict);
        });
    }
}
