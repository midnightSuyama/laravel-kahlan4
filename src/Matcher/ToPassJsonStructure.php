<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassJsonStructure extends BaseMatcher
{
    static function match(TestResponse $response, array $structure=null, $responseData=null)
    {
        static::buildDescription(
            'pass assertJsonStructure().',
            compact('structure', 'responseData')
        );

        return static::assert(function() use ($response, $structure, $responseData) {
            $response->assertJsonStructure($structure, $responseData);
        });
    }
}
