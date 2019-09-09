<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassDatabaseHas extends BaseMatcher
{
    static function match(TestCase $laravel, $table, array $data, $connection=null)
    {
        static::buildDescription(
            'pass assertDatabaseHas().',
            compact('table', 'data', 'connection')
        );

        return static::assert(function() use ($laravel, $table, $data, $connection) {
            $laravel->assertDatabaseHas($table, $data, $connection);
        });
    }
}
