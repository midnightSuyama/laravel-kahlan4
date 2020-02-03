<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Support\Testing\Fakes\NotificationFake;

class ToPassNotSentTo extends BaseMatcher
{
    static function match(NotificationFake $fake, $notifiable, $notification, $callback = null)
    {
        static::buildDescription(
            'pass assertNotSentTo().',
            compact('notifiable', 'notification', 'callback')
        );

        return static::assert(function() use ($fake, $notifiable, $notification, $callback) {
            $fake->assertNotSentTo($notifiable, $notification, $callback);
        });
    }
}
