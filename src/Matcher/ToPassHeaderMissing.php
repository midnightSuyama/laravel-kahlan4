<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassHeaderMissing extends BaseMatcher
{
    static function match(TestResponse $response, $headerName)
    {
        static::buildDescription(
            'pass assertHeaderMissing().',
            compact('headerName')
        );

        return static::assert(function() use ($response, $headerName) {
            $response->assertHeaderMissing($headerName);
        });
    }
}
