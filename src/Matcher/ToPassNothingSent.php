<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Support\Testing\Fakes\NotificationFake;

class ToPassNothingSent extends BaseMatcher
{
    static function match(NotificationFake $fake)
    {
        static::buildDescription(
            'pass assertNothingSent().'
        );

        return static::assert(function() use ($fake) {
            $fake->assertNothingSent();
        });
    }
}
