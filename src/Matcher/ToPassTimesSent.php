<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Support\Testing\Fakes\NotificationFake;

class ToPassTimesSent extends BaseMatcher
{
    static function match(NotificationFake $fake, $expectedCount, $notification)
    {
        static::buildDescription(
            'pass assertTimesSent().',
            compact('expectedCount', 'notification')
        );

        return static::assert(function() use ($fake, $expectedCount, $notification) {
            $fake->assertTimesSent($expectedCount, $notification);
        });
    }
}
