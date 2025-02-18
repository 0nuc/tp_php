<?php
$host = 'localhost';
$dbname = 'projet_php';
$username = 'root';
$password = 'root'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // Débogage - vérifier la connexion
    echo "Connexion réussie à la BDD";
} catch (PDOException $error) {
    die("Erreur de connexion : " . $error->getMessage());
}
?>