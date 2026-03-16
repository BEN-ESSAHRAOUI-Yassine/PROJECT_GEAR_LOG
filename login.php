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

<h2>Login</h2>

<?php if($error): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">

<input name="username" placeholder="Username" required>

<br><br>

<input type="password" name="password" placeholder="Password" required>

<br><br>

<button type="submit">Login</button>

</form>

</body>

</html>