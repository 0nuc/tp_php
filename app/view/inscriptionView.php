<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
</head>
<body>

    <h2>Inscription</h2>
    <form action="/signup" method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" required>

        <label for="email">Email :</label><br>
        <input type="email" id="email"  required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" required>

        <label for="confirm_password">Confirmer le mot de passe :</label><br>
        <input type="password" id="confirm_password"  required>

        <input type="submit" value="S'inscrire">
    </form>

</body>
</html>
