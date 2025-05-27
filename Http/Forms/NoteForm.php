<?php

namespace Http\Forms;

use Core\NoteValidationException;
use Core\Validator;

class NoteForm
{
   protected $errors = [], $success = [];

   public function __construct(public $attributes)
   {
       if(!Validator::string($this->attributes['body'], 1, 20)){
           $this->errors['body'] = 'Body must be at least 1 and at-most 20 characters.';
       }
   }

   public static function validate($attributes): static
   {
       $instance = new static($attributes);
       return $instance->failed() ? $instance->throw() : $instance;
   }

   public function failed(): bool
   {
       return count($this->errors) > 0;
   }

   public function throw(): void
   {
       NoteValidationException::throw($this->errors, $this->success, $this->attributes);
   }

   public function getErrors(){
       return $this->errors;
   }

    public function error($error, $message): void
    {
        $this->errors[$error] = $message;
    }

    public function getSuccess(): array
    {
        return $this->success;
    }
    public function setMessageError($key, $message): static
    {
        $this->errors[$key] = $message;
        return $this;
    }

    public function setMessageSuccess($key, $message): void
    {
        $this->success[$key] = $message;
    }
}