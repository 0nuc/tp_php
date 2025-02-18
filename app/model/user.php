<?php
require_once '../../config/bdd.php';

function emailExists($pdo, $email) {
    try {
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetchColumn() > 0;
    } catch (Exception $e) {
        echo "Erreur dans emailExists : " . $e->getMessage();
        return false;
    }
}

function createUser($pdo, $name, $email, $password) {
    try {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        
        $query = "INSERT INTO users (name, email, password, created_at) 
                 VALUES (:name, :email, :password, NOW())";
        
        echo "Query: " . $query . "<br>";
        echo "Name: " . $name . "<br>";
        echo "Email: " . $email . "<br>";
        
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        
        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Erreur SQL : " . $e->getMessage();
        return false;
    }
}