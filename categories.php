<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch categories from the Open Trivia Database API
$api_url = 'https://opentdb.com/api_category.php';
$response = file_get_contents($api_url);
$data = json_decode($response, true);

if (!$data || !isset($data['trivia_categories'])) {
    die('Error fetching categories from the API');
}

$categories = $data['trivia_categories'];

// Sort categories alphabetically by name
usort($categories, function($a, $b) {
    return strcmp($a['name'], $b['name']);
});

include 'templates/header.php';
include 'templates/categories.php';
include 'templates/footer.php'; ?>
