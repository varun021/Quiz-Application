<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quiz_id'])) {
    $quiz_id = $_POST['quiz_id'];
    $user_id = $_SESSION['user_id'];

    // Delete the quiz entry
    $stmt = $pdo->prepare("DELETE FROM quiz_results WHERE id = ? AND user_id = ?");
    $stmt->execute([$quiz_id, $user_id]);

    // Redirect back to profile page
    header('Location: profile.php');
    exit();
}
?>
