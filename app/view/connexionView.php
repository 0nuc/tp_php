<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de connexion</title>
</head>
<body>

    <h2>Connexion</h2>
    <form action="/login" method="POST">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username"  required><br><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>

</body>
</html>
