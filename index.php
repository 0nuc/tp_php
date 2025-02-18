<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /tasks");  
    exit();
}

require_once 'app/views/home.php';  
?>
