<?php


include_once 'product.php';
require_once './Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('web');
$twig = new Twig_Environment($loader);
include_once 'user.php';

session_start();

$user = new User();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $new_username = trim($username, " ");
    $email = $_POST['email'];
    $password = $_POST['password'];

    $row = $user->validate($new_username, $email, $password);
    $details = $row->fetch_array(MYSQLI_ASSOC);

    if (strlen($new_username) == 0 || strlen($email) == 0) {
        header('Location: login.php');
    } else {

        if ($details['username'] === $new_username && $details['email'] === $email && $details['password'] === $password) {
            $_SESSION['logged-in'] = true;
            $_SESSION['email'] = $email;
            header('Location: cart.php');
        } else {
            header('Location: login.php');
        }
    }
}
echo $twig->render('login.tpl');