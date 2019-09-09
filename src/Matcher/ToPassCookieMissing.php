<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassCookieMissing extends BaseMatcher
{
    static function match(TestResponse $response, $cookieName)
    {
        static::buildDescription(
            'pass assertCookieMissing().',
            compact('cookieName')
        );

        return static::assert(function() use ($response, $cookieName) {
            $response->assertCookieMissing($cookieName);
        });
    }
}
