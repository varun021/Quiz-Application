<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$category_id = isset($_GET['category']) ? intval($_GET['category']) : 0;
$difficulty = isset($_GET['difficulty']) ? htmlspecialchars($_GET['difficulty']) : 'easy';

$api_url = 'https://opentdb.com/api.php?amount=10&difficulty=' . $difficulty;
if ($category_id > 0) {
    $api_url .= '&category=' . $category_id;
}

$response = file_get_contents($api_url);
$data = json_decode($response, true);

if ($data['response_code'] !== 0) {
    die('Error fetching questions from the API');
}

$questions = $data['results'];

include 'templates/header.php';
include 'templates/quiz.php';
include 'templates/footer.php'; ?>