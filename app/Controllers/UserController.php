<?php

namespace App\Controllers;

use App\models\User;
use App\Validation\Validator;

class UserController extends Controller {

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {

        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'username' => ['required', 'min:3'],
            'password' => ['required']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /RetroAddict/views/auth/login');
            exit;
        }

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->admin;
            return header('Location: /RetroAddict/admin/posts?success=true');
        } else {
            return header('Location: /RetroAddict/views/auth/login');
        }
    }

    public function logout()
    {
        session_destroy();

        return header('Location: /RetroAddict/');
    }
}
