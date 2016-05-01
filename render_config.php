<?php

require './Twig/Autoloader.php';
require 'vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('./web');
$twig = new Twig_Environment($loader);


?>