<?php

namespace fw\core;

/**
 * Description of App
 *
 */
class App {
    
    public static $app;
    
    public function __construct() {
        session_start();
    }
}
