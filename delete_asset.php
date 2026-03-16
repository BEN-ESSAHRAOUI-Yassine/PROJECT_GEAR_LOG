<?php

require 'auth.php';
require 'role.php';

if(!canEditAssets()){
die("Access denied");
}

if(isset($_GET['id'])){

$stmt = $pdo->prepare("DELETE FROM assets WHERE id=?");

$stmt->execute([$_GET['id']]);

}

header("Location: index.php");
exit();