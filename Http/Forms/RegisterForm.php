<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\ValidationException;
use Core\Validator;

class RegisterForm
{
    private $errors = [];

    public function __construct(public array $attributes)
    {
        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }
    
        if (! Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least seven characters.';
        }
    
        if ($this->failed()) return;
    
        $is_email_exists = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $attributes['email'],
        ])->find();
    
        if ($is_email_exists) {
            $this->error('email', 'Email address already in use.');
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed() {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}