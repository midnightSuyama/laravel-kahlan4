<?php

namespace LaravelKahlan4\Matcher;

class ToPassHeader extends BaseMatcher
{
    static function match($response, $headerName, $value=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertHeader().',
            compact('headerName', 'value')
        );

        return static::assert(function() use ($response, $headerName, $value) {
            $response->assertHeader($headerName, $value);
        });
    }
}
