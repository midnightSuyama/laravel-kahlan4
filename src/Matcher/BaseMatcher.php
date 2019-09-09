<?php

namespace LaravelKahlan4\Matcher;

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
}
