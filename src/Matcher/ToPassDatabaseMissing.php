<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassDatabaseMissing extends BaseMatcher
{
    static function match(TestCase $laravel, $table, array $data, $connection=null)
    {
        static::buildDescription(
            'pass assertDatabaseMissing().',
            compact('table', 'data', 'connection')
        );

        return static::assert(function() use ($laravel, $table, $data, $connection) {
            $laravel->assertDatabaseMissing($table, $data, $connection);
        });
    }
}
