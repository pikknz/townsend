<?php

namespace Townsend\Json;

class JsonMessage
{
    public static function generateMessage($fields)
    {
        return json_encode($fields);
    }
}