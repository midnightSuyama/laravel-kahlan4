<?php

namespace LaravelKahlan4\Matcher;

use InvalidArgumentException;
use PHPUnit\Framework\ExpectationFailedException;

abstract class BaseMatcher
{
    protected static $_description = [];

    static function description()
    {
        return static::$_description;
    }

    protected static function buildDescription(string $description, array $data=[])
    {
        static::$_description = compact('description', 'data');
    }

    protected static function assert(callable $callback)
    {
        try {
            $callback();
        } catch (ExpectationFailedException $e) {
            static::$_description['data']['message'] = $e->getMessage();
            return false;
        }

        return true;
    }

    protected static function ensureValidResponse($response)
    {
        if (
            !$response instanceof \Illuminate\Foundation\Testing\TestResponse  // 6.x
            && !$response instanceof \Illuminate\Testing\TestResponse          // 7.x
        ) {
            throw new InvalidArgumentException('Response must be an instance of \Illuminate\Foundation\Testing\TestResponse or \Illuminate\Testing\TestResponse.');
        }
    }
}
