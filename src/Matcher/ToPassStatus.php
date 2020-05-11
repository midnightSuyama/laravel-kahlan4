<?php

namespace LaravelKahlan4\Matcher;

class ToPassStatus extends BaseMatcher
{
    static function match($response, $status)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertStatus().',
            compact('status')
        );

        return static::assert(function() use ($response, $status) {
            $response->assertStatus($status);
        });
    }
}
