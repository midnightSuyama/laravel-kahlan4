<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonFragment extends BaseMatcher
{
    static function match($response, array $data)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonFragment().',
            compact('data')
        );

        return static::assert(function() use ($response, $data) {
            $response->assertJsonFragment($data);
        });
    }
}
