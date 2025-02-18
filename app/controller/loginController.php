<?php
session_start();
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $user = $this->userModel->findByEmail($email);

            if ($user && $this->userModel->verifyPassword($password, $user["password"])) {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                header("Location: /dashboard");
                exit();
            } else {
                $_SESSION["error"] = "Identifiants incorrects.";
                header("Location: /login");
                exit();
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /login");
        exit();
    }
}
