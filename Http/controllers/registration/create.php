<?php

use Core\Session;

view('registration/create', [
    'heading'=> 'Register',
    'errors' => Session::get('errors', []),
]);