<?php
$pdo = new PDO('mysql:host=localhost;dbname=ab_book', 'root', '');
if ($pdo === false) {
    die('ERROR: Could not connect. ' . mysqli_connect_error());
}
