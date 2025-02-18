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
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" required><br><br>

        <label for="email">Email :</label><br>
        <input type="email" id="email" required><br><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" required><br><br>

        <label for="confirm_password">Confirmer le mot de passe :</label><br>
        <input type="password" id="confirm_password" <br><br>

        <input type="submit" value="S'inscrire">
    </form>

</body>
</html>
