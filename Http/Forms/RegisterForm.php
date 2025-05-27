<?php

namespace Http\Forms;

use Core\RegisterValidationException;
use Core\Validator;

class RegisterForm
{
    protected array $errors = [], $success = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::string($this->attributes['name'], 3, 20)){
            $this->errors['name'] = 'Name must be at least 3 characters';
        }

        if(!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = "Please enter a valid email address";
        }

        if(!Validator::string($this->attributes['password'], 6, 20)) {
            $this->errors['password'] = "Password must be at least 6 characters";
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
        RegisterValidationException::throw($this->errors, $this->success,  $this->attributes);
    }
    public function getErrors(): array
    {
        return $this->errors;
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