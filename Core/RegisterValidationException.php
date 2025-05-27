<?php

namespace Core;

class RegisterValidationException  extends \Exception
{
    public readonly array $errors, $success, $old;
    public static function throw(array $errors, array $success, array $old)
    {
        $instance = new static;
        $instance->errors = $errors;
        $instance->success = $success;
        $instance->old = $old;
        throw $instance;
    }

}