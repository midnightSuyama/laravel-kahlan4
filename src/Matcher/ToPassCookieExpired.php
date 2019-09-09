<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassCookieExpired extends BaseMatcher
{
    static function match(TestResponse $response, $cookieName)
    {
        static::buildDescription(
            'pass assertCookieExpired().',
            compact('cookieName')
        );

        return static::assert(function() use ($response, $cookieName) {
            $response->assertCookieExpired($cookieName);
        });
    }
}
