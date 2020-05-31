<?php

namespace LaravelKahlan4\Matcher;

class ToPassExactJson extends BaseMatcher
{
    static function match($response, array $data)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertExactJson().',
            compact('data')
        );

        return static::assert(function() use ($response, $data) {
            $response->assertExactJson($data);
        });
    }
}
