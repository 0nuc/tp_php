<?php
session_start();
require_once '../../config/bdd.php';
require_once '../model/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    
    try {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        if (emailExists($pdo, $email)) {
            echo "Email existe déjà";
            exit;
        }
        
        $result = createUser($pdo, $name, $email, $password);
        
        if ($result) {
            echo "Utilisateur créé avec succès !";
        } else {
            echo "Échec de la création";
        }
        
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage();
    }
}