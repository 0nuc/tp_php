<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require_once "../config/database.php";

$database = new Database();
$pdo = $database->getConnection();

$user_id = $_SESSION['user']['id'];

$sql = "SELECT * FROM tasks WHERE user_id = :user_id ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>
    <a href="logout.php">Déconnexion</a>
    <h2>Liste des Tâches</h2>

    <a href="create_task.php">Créer une nouvelle tâche</a>

    <?php if (empty($tasks)): ?>
        <p>Aucune tâche disponible.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <strong><?php echo htmlspecialchars($task['title']); ?></strong><br>
                    <?php echo nl2br(htmlspecialchars($task['description'])); ?><br>
                    Status: <?php echo htmlspecialchars($task['status']); ?><br>

                    <a href="edit_task.php?id=<?php echo $task['id']; ?>">Modifier</a> |
                    <a href="delete_task.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
