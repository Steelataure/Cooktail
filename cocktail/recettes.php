<?php
$dbh = include '../config/config.php';
ob_start();


$content = ob_get_clean();
include 'layout.php';
