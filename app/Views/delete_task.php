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

// Supprimer la tâche de la base de données
$sql = "DELETE FROM tasks WHERE id = :task_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['task_id' => $task_id, 'user_id' => $user_id]);

header('Location: dashboard.php');
exit();
