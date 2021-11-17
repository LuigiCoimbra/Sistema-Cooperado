<?php
require_once('config.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$telephone = $_POST['telephone'];
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);

$sql = "INSERT INTO users (firstname, lastname, email, telephone, password) VALUES (?, ?, ?, ?, ?)";
$stmtselect = $db->prepare($sql);
$result = $stmtselect->execute([$fname, $lname, $username, $telephone, $password]);
echo "1";