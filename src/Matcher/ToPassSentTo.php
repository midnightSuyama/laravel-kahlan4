<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Support\Testing\Fakes\NotificationFake;

class ToPassSentTo extends BaseMatcher
{
    static function match(NotificationFake $fake, $notifiable, $notification, $callback = null)
    {
        static::buildDescription(
            'pass assertSentTo().',
            compact('notifiable', 'notification', 'callback')
        );

        return static::assert(function() use ($fake, $notifiable, $notification, $callback) {
            $fake->assertSentTo($notifiable, $notification, $callback);
        });
    }
}
