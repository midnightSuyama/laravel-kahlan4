<?php

namespace LaravelKahlan4\Matcher;

class ToPassNoContent extends BaseMatcher
{
    static function match($response, $status = 204)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertNoContent().',
            compact('status')
        );

        return static::assert(function() use ($response, $status) {
            $response->assertNoContent($status);
        });
    }
}

