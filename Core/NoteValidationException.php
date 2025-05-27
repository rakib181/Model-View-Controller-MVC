<?php

namespace Core;

class NoteValidationException extends \Exception
{
    public array $errors, $success, $old;
    public static function throw(array $errors, $success, $old)
    {
       $instance = new static;
       $instance->errors = $errors;
       $instance->success = $success;
       $instance->old = $old;
       throw $instance;
    }
}