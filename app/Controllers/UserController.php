<?php

namespace App\Controllers;

use App\models\User;
use App\Validation\Validator;

class UserController extends Controller {

    public function index()
    {
        $this->isAdmin();

        $users = (new User($this->getDB()))->all();

        return $this->view('admin.usercrud.index', compact('users'));
    }

    public function login()
    {
        return $this->view('auth.login');
    }

    public function loginPost()
    {

        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'email' => ['required', 'min:3'],
            'password' => ['required', 'min:4']
        ]);

        if ($errors) {
            $_SESSION['errors'][] = $errors;
            header('Location: /RetroAddict/views/auth/login');
            exit;
        }

        $user = (new User($this->getDB()))->getByEmail($_POST['email']);


        if (password_verify($_POST['password'], $user->password)) {
            $_SESSION['auth'] = (int) $user->admin;
            $_SESSION['id'] = (int) $user->id;

            return header('Location: /RetroAddict/admin/posts?success=true');
        } else {
            return header('Location: /RetroAddict/login');
        }

    }

    public function logout()
    {
        session_destroy();

        return header('Location: /RetroAddict/');
    }
    public function register(){
        return $this->view('auth.register');

    }
    public function registeruser(){

        $post = new User($this->getDB());
        $result = $post->create($_POST);
        if ($result) {
            return header('Location: /RetroAddict/login');
        }
    }

    public function getUserlist(){

        $this->isAdmin();

        $posts = (new User($this->getDB()))->all();

        return $this->view('admin.usercrud.index', compact('posts'));
    }
    public function getUsergestion(){
        return $this->view('admin/usercrud/usergestion');
    }

    public function deleteUser(int $id)
    {
        $this->isAdmin();

        $user = new User($this->getDB());
        $result = $user->deleteUser($id);

        if ($result) {
            return header('Location: /RetroAddict/users');
        }
    }
    public function editUser(int $id)
    {
        $this->isAdmin();

        $user = (new User($this->getDB()))->findById($id);


        return $this->view('admin.usercrud.usergestion', compact('user'));
    }
    public function editProfil(int $id)
    {
        $this->isLogged();

        $user = (new User($this->getDB()))->findById($id);


        return $this->view('admin.usercrud.profil', compact('user'));
    }
    public function updateUser(int $id)
    {
        $this->isLogged();

        $user = new User($this->getDB());

        $result = $user->update($id, $_POST);

        if ($result) {
            return header('Location: /RetroAddict/users');
        }
    }
}
