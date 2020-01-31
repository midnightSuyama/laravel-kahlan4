<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Support\Testing\Fakes\NotificationFake;

class ToPassSentToTimes extends BaseMatcher
{
    static function match(NotificationFake $fake, $notifiable, $notification, $times = 1)
    {
        static::buildDescription(
            'pass assertSentToTimes().',
            compact('notifiable', 'notification', 'times')
        );

        return static::assert(function() use ($fake, $notifiable, $notification, $times) {
            $fake->assertSentToTimes($notifiable, $notification, $times);
        });
    }
}
