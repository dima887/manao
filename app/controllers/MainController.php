<?php

namespace app\controllers;

use app\models\User;
use fw\core\base\View;

class MainController extends AppController
{
    public $user;

    public function __construct($route) {
        parent::__construct($route);
        $this->layout = 'main';
        $this->user = new User();
    }

    /**
     * Главная страница
     */
    public function indexAction()
    {
        unset($_SESSION['form_data']);
        unset($_SESSION['error']);
        View::setMeta('Главная страница');
    }

    /**
     * Страница 1
     */
    public function page1Action()
    {
        View::setMeta('Страница 1');
    }

    /**
     * Страница 2
     */
    public function page2Action()
    {
        View::setMeta('Страница 2');
    }
}