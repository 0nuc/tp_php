<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require_once "../config/database.php";

$database = new Database();
$pdo = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO tasks (title, description, status, user_id, created_at) VALUES (:title, :description, :status, :user_id, NOW())";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['title' => $title, 'description' => $description, 'status' => $status, 'user_id' => $user_id])) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Erreur lors de la création de la tâche.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une Tâche</title>
</head>
<body>
    <h1>Créer une nouvelle tâche</h1>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label for="title">Titre :</label>
        <input type="text" name="title" required><br>

        <label for="description">Description :</label>
        <textarea name="description" required></textarea><br>

        <label for="status">Statut :</label>
        <select name="status" required>
            <option value="En cours">En cours</option>
            <option value="Terminé">Terminé</option>
            <option value="À faire">À faire</option>
        </select><br>

        <button type="submit">Créer la tâche</button>
    </form>
</body>
</html>
