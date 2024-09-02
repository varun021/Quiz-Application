<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (!isset($_POST['answers']) || !isset($_POST['quiz_data'])) {
    header('Location: quiz.php');
    exit();
}

$user_answers = $_POST['answers'];
$quiz_data = json_decode($_POST['quiz_data'], true);

if ($quiz_data === null) {
    die('Invalid quiz data.');
}

$score = 0;
$total_questions = count($quiz_data);

foreach ($quiz_data as $index => $question) {
    if (isset($user_answers[$index]) && $user_answers[$index] === $question['correct_answer']) {
        $score++;
    }
}

// Save result to database
$user_id = $_SESSION['user_id'];
$category = $quiz_data[0]['category']; // Using the category of the first question

$stmt = $pdo->prepare("INSERT INTO quiz_results (user_id, category, score, total_questions) VALUES (?, ?, ?, ?)");
$stmt->execute([$user_id, $category, $score, $total_questions]);

include 'templates/header.php';
include 'templates/result.php';
include 'templates/footer.php';
