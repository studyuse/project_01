<?php
$dbtype = 'mysql';
$host = 'localhost';
$dbname = 'student';
$username = 'root';
$password = '123456';
$dsn = "$dbtype:host=$host;dbname=$dbname";
$pdo = new PDO($dsn, $username, $password);
?>