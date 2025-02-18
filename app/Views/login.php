<?php
session_start();

// Supposons que tu as vérifié les informations de l'utilisateur dans la base de données
// Exemple d'affectation après une connexion réussie
$_SESSION['user'] = [
    'id' => $user_id,  // L'ID de l'utilisateur récupéré depuis la base de données
    'name' => $user_name,  // Le nom de l'utilisateur
    // Ajoute d'autres informations comme l'email si nécessaire
];

header("Location: dashboard.php");
exit();
?>



<form action="../public/index.php" method="post">
    <input type="hidden" name="action" value="login">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" required>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>
    <button type="submit">Se connecter</button>
</form>
