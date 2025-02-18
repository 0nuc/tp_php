<?php
require_once "..//Controllers/UserController.php";
$userController = new UserController();
if (isset($_POST['action'])) {
    if ($_POST['action'] == "register") {
        $userController->register();
    } elseif ($_POST['action'] == "login") {
        $userController->login();
    }
}
?>
<a href="../Views/register.php">S'inscrire</a>
<a href="../Views/login.php">Se connecter</a>