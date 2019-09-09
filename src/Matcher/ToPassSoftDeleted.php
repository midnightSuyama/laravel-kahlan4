<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassSoftDeleted extends BaseMatcher
{
    static function match(TestCase $laravel, $table, array $data=[], $connection=null)
    {
        static::buildDescription(
            'pass assertSoftDeleted().',
            compact('table', 'data', 'connection')
        );

        return static::assert(function() use ($laravel, $table, $data, $connection) {
            $laravel->assertSoftDeleted($table, $data, $connection);
        });
    }
}
