<?php

namespace app\models;

use fw\core\base\Model;

class User extends Model
{
    public $validation;
    private $salt = 'manao27.10.2021'; //соль для пароля

    public function __construct()
    {
        parent::__construct();
        $this->validation = new Validation();
    }

    /**
     * Проверка данных при регистрации
     */
    public function validateSignup($data)
    {
        $this->validation->required($data, 'login', 'Поле login не заполнено');
        $this->validation->required($data, 'password', 'Поле с паролем не заполнено');
        $this->validation->required($data, 'email', 'Поле email не заполнено');
        $this->validation->required($data, 'name', 'Поле с именем не заполнено');
        $this->validation->minLength($data, 'login', 6, 'Минимальная длина поля login 6 символов');
        $this->validation->minLength($data, 'password', 6, 'Минимальная длина пароля 6 символов');
        $this->validation->minLength($data, 'name', 2, 'Минимальная длина имени 2 символа');
        $this->validation->checkEmail($data, 'email', 'Email адрес указан не корректно!');
        $this->validation->checkPassword($data, 'password', 'Пароль должен состоять из цифр и букв');
        $this->validation->checkName($data, 'name', 'Имя должно состоять только из букв');
        $this->validation->confirm_password($data['password'], $data['confirm_password'], 'confirm_password', 'Пароли не совпадают');
        $this->validation->checkUnique($data, 'login', 'Данный логин уже занят');
        $this->validation->checkUnique($data, 'email', 'Данный email уже занят');
    }

    /**
     * Сохранение нового пользователя
     */
    public function saveUser($login, $password, $email, $name)
    {
        $password = $this->passwordHash($password);
        $newUer = [
            'name' => $name,
            'login' => $login,
            'email' => $email,
            'password' => $password,
            ];
        $data = [];

        if (file_exists(DB. '/Db.json')) {
            $data = file_get_contents(DB. '/Db.json');
            $data = json_decode($data, true);
        }

        array_push($data, $newUer);
        file_put_contents(DB. '/Db.json', json_encode($data));

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['login'] = $login;
        $_SESSION['user']['email'] = $email;
        setcookie('login', $login, time()+3600);
        setcookie('email', $email, time()+3600);
        setcookie('name', $name, time()+3600);
    }

    /**
     * Авторизация пользователя
     */
    public function login($login, $password){
        if (file_exists(DB. '/Db.json')) {
            $data = file_get_contents(DB. '/Db.json');
            $data = json_decode($data, true);
            if (!$data) {
                array_push($this->errors, 'Логин или пароль не совпадают');
                return;
            }
            foreach ($data as $value) {
                if ($login == $value['login']) {
                    if (password_verify($this->salt. $password, $value['password'])) {
                        setcookie('login', $value['login'], time()+3600);
                        setcookie('email', $value['email'], time()+3600);
                        setcookie('name', $value['name'], time()+3600);
                        $_SESSION['user'] = $value;
                        unset($_SESSION['user']['password']);
                        return;
                    }
                }
            }
            array_push($this->errors, 'Логин или пароль не совпадают2');
        }else {
            array_push($this->errors, 'Логин или пароль не совпадают3');
        }
    }

    /**
     * Соль + хеширование пароля
     */
    public function passwordHash($password)
    {
        return password_hash($this->salt. $password, PASSWORD_DEFAULT);
    }
}