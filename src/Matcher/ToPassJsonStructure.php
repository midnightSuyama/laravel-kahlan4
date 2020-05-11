<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonStructure extends BaseMatcher
{
    static function match($response, array $structure=null, $responseData=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonStructure().',
            compact('structure', 'responseData')
        );

        return static::assert(function() use ($response, $structure, $responseData) {
            $response->assertJsonStructure($structure, $responseData);
        });
    }
}
