<?php

namespace app\controllers;

use app\models\User;
use fw\core\base\View;

class UserController extends AppController
{
    public $user;

    public function __construct($route) {
        parent::__construct($route);
        $this->layout = 'main';
        $this->user = new User();
    }

    /**
     * Страница с регистрацией
     */
    public function signupAction()
    {
        View::setMeta('Регистрация');
    }

    /**
     * Сохранение нового пользователя
     */
    public function storeAction()
    {
        $this->user->validateSignup($_POST);
        if ($this->user->validation->error) {
            $_SESSION['error'] = $this->user->validation->error;
            $_SESSION['form_data'] = $_POST;
            redirect('signup');
        }
        unset($_SESSION['form_data']);
        unset($_SESSION['error']);
        $this->user->saveUser($_POST['login'], $_POST['password'], $_POST['email'], $_POST['name']);
        redirect('/');
    }

    /**
     * Страница с авторизацией
     */
    public function loginAction()
    {
        View::setMeta('Вход');
    }

    /**
     * Аутентификация пользователя
     */
    public function authAction()
    {
        $this->user->login($_POST['login'], $_POST['password']);
        if ($this->user->errors) {
            $_SESSION['error'] = $this->user->errors;
            $_SESSION['form_data'] = $_POST;
            redirect('login');
        }
        unset($_SESSION['form_data']);
        redirect('/');
    }

    /**
     * Выход из приложения
     */
    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/');
    }

    /**
     * Удалить все куки пользователя
     */
    public function deleteCookieAction()
    {
        setcookie('login', '', time()-3600);
        setcookie('email', '', time()-3600);
        setcookie('name', '', time()-3600);
        redirect('/');
    }
}