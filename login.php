<?php
session_start();
require 'db.php';

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM User_db WHERE username = :username";

$stmt = $pdo->prepare($sql);
$stmt->execute(['username'=>$username]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($password,$user['password'])){

$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
$_SESSION['role'] = $user['his_role'];

header("Location: index.php");
exit;

}else{

$error = "Invalid username or password";

}

}

?>

<!DOCTYPE html>
<html>

<head>
<title>GearLog Login</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="login-container">

    <form method="POST" class="login-form">

        <h2>Login</h2>

        <?php if($error): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <label>Username</label>
        <input name="username" placeholder="Enter your username" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>

    </form>

</div>

</body>

</html>