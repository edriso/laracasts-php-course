<?php

use Core\Session;

view('session/create', [
    'heading'=> 'Log in',
    'errors' => Session::get('errors', []),
]);