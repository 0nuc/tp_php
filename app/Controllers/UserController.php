<?php
require_once "../Models/User.php";
class UserController {
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();
            if ($user->register($_POST['username'], $_POST['password'])) {
                header("Location: /public/index.php");
            } else {
                echo "Erreur lors de l'inscription";
            }
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = new User();
            if ($user->login($_POST['username'], $_POST['password'])) {
                session_start();
                $_SESSION['user'] = $_POST['username'];
                header("Location: ../Views/dashboard.php");
            } else {
                echo "Identifiants incorrects";
            }
        }
    }
}