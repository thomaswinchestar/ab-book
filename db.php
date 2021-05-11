<?php
$link = mysqli_connect('localhost', 'root', '', 'ab_book');
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
