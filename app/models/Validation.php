<?php

namespace app\models;

class Validation
{
    public $error = [];

    /**
     * Проверка поля на пустоту
     */
    public function required($data, $type, $str = '')
    {
        if (mb_strlen($data[$type]) == 0) {
            array_push($this->error, [$type => $str]);
        }
    }

    /**
     * Минимальная длина поля
     */
    public function minLength($data, $type, $length, $str = '')
    {
        if (mb_strlen($data[$type]) < $length) {
            array_push($this->error, [$type => $str]);
        }
    }

    /**
     * Проверка email на корректность
     */
    public function checkEmail($data, $type, $str = '')
    {
        if (!filter_var($data[$type], FILTER_VALIDATE_EMAIL)) {
            array_push($this->error, [$type => $str]);
        }
    }

    /**
     * Проверка пароля на корректность (состоит из букв и цифр)
     */
    public function checkPassword($data, $type, $str = '')
    {
        $pattern = '#^(\d+[a-zA-Zа-яА-ЯёЁ]+[a-zA-Z0-9а-яА-ЯёЁ]*|[a-zA-Zа-яА-ЯёЁ]+\d+[a-zA-Z0-9а-яА-ЯёЁ]*)$#u';
        if(!preg_match($pattern, $data[$type])) {
            array_push($this->error, [$type => $str]);
        }
    }

    /**
     * Проверка имени на корректность (только буквы, мин. 2 символа)
     */
    public function checkName($data, $type, $str = '')
    {
        $pattern = '#^[a-zA-Zа-яА-ЯёЁ]{2,}$#u';
        if(!preg_match($pattern, $data[$type])) {
            array_push($this->error, [$type => $str]);
        }
    }

    /**
     * Сравнение паролей при регистрации
     */
    public function confirm_password($password, $confirm_password, $type, $str = '')
    {
        if ($password !== $confirm_password) {
            array_push($this->error, [$type => $str]);
        }
    }

    /**
     * Проверка на уникальность поля в бд
     */
    public function checkUnique($data, $type, $str = '')
    {
        if (file_exists(DB. '/Db.json')) {
            $users = file_get_contents(DB . '/Db.json');
            $users = json_decode($users, true);
            foreach ($users as $value) {
                if ($value[$type] == $data[$type]) {
                    array_push($this->error, [$type => $str]);
                }
            }
        }
    }
}