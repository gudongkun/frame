<?php 

$config = require('config.php');
require '../vendor/autoload.php';

(new frame\base\Application($config))->run();

 ?>