<?php
session_start();

include_once 'product.php';

print_r($_SESSION);


require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./web');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('checkout.tpl');
$data = array();

$params = array('random' => $data);
$template->display($params);

?>