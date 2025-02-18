<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require_once "../config/database.php";

if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$task_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];

// Vérifier si la tâche appartient à l'utilisateur
$sql = "SELECT * FROM tasks WHERE id = :task_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['task_id' => $task_id, 'user_id' => $user_id]);
$task = $stmt->fetch();

if (!$task) {
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);

    if (!empty($title)) {
        // Mettre à jour la tâche
        $sql = "UPDATE tasks SET title = :title, description = :description WHERE id = :task_id AND user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['title' => $title, 'description' => $description, 'task_id' => $task_id, 'user_id' => $user_id]);

        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Le titre est obligatoire.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier la tâche</title>
</head>
<body>
    <h1>Modifier la tâche</h1>

    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="POST">
        <label for="title">Titre :</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required><br>

        <label for="description">Description :</label>
        <textarea name="description"><?php echo htmlspecialchars($task['description']); ?></textarea><br>

        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
