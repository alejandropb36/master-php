<?php
// Conexion
$server = 'localhost';
$username = 'root';
$password = '';
$databse = 'blog_master';

$db = mysqli_connect($server, $username, $password, $databse);

mysqli_query($db, "SET NAMES 'utf8'");

session_start();