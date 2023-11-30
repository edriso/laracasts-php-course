<?php

namespace Http\Forms;

use Core\App;
use Core\Database;
use Core\Validator;

class RegisterForm
{
    private $errors = [];
    public function validate($email, $password)
    {

        if (! Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($password, 7, 255)) {
            $this->errors['password'] = 'Please provide a password of at least seven characters.';
        }

        if (! empty($this->errors)) {
            return false;
        }

        $is_email_exists = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email,
        ])->find();
    
        if ($is_email_exists) {
            $this->error('email', 'Email address already in use.');
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}