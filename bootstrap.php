<?php

require 'core/ClassLoader.php';

$loader = new ClassLoader();

// __FILE__: /var/www/bootstrap.php (EX.)
// dirname(__FILE__): /var/www/ (EX.)
$loader->registerDir(dirname(__FILE__).'/core');
$loader->registerDir(dirname(__FILE__).'/models');

$loader->register();