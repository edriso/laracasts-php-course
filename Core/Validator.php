<?php

namespace Core;

class Validator {
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email(string $value): bool
    {
        // notice that :bool is doing the same as return (bool) filter_var...
        // so it's redundant, but we might want to add it for crestal clarity?
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function greaterThan(int $value, int $greaterThan): bool
    {
        return $value > $greaterThan;
    }
}