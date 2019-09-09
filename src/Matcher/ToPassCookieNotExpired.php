<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassCookieNotExpired extends BaseMatcher
{
    static function match(TestResponse $response, $cookieName)
    {
        static::buildDescription(
            'pass assertCookieNotExpired().',
            compact('cookieName')
        );

        return static::assert(function() use ($response, $cookieName) {
            $response->assertCookieNotExpired($cookieName);
        });
    }
}
