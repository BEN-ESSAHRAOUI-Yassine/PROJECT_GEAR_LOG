<?php

require '../auth.php';
require '../db.php';
require '../role.php';

if(!canManageUsers()){
die("Access denied");
}

$id=$_GET['id'];

$stmt=$pdo->prepare("DELETE FROM User_db WHERE id=:id");
$stmt->execute(['id'=>$id]);

header("Location: users.php");
exit;