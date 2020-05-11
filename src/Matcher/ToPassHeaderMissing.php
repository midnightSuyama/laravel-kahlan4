<?php

namespace LaravelKahlan4\Matcher;

class ToPassHeaderMissing extends BaseMatcher
{
    static function match($response, $headerName)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertHeaderMissing().',
            compact('headerName')
        );

        return static::assert(function() use ($response, $headerName) {
            $response->assertHeaderMissing($headerName);
        });
    }
}
