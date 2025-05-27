<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors, $success, $old;
    public static function throw(array $errors, $success, $old){
       $instance = new static;
       $instance->errors = $errors;
       $instance->success = $success;
       $instance->old = $old;
       throw $instance;
    }

}