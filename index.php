<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'templates/header.php';
include 'templates/home.php';
include 'templates/footer.php';