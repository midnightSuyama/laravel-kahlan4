<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassHeader extends BaseMatcher
{
    static function match(TestResponse $response, $headerName, $value=null)
    {
        static::buildDescription(
            'pass assertHeader().',
            compact('headerName', 'value')
        );

        return static::assert(function() use ($response, $headerName, $value) {
            $response->assertHeader($headerName, $value);
        });
    }
}
