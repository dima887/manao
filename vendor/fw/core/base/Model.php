<?php

namespace fw\core\base;

use Cassandra\SSLOptions\Builder;
use fw\core\Db;
use fw\core\Validate;

/**
 * Description of Model
 *
 */
abstract class Model {

    public $errors = [];

    public function __construct() {

    }
}
