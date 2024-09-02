<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user information
$stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

// Fetch quiz results
$stmt = $pdo->prepare("SELECT id, category, score, total_questions, date_taken FROM quiz_results WHERE user_id = ? ORDER BY date_taken DESC");
$stmt->execute([$user_id]);
$quiz_results = $stmt->fetchAll();

include 'templates/header.php';
include 'templates/profile.php';
include 'templates/footer.php'; 
?>
