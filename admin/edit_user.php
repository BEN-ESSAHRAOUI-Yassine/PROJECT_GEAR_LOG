<?php

require '../auth.php';
require '../db.php';
require '../role.php';

if(!canManageUsers()){
die("Access denied");
}

$id=$_GET['id'];

$stmt=$pdo->prepare("SELECT * FROM User_db WHERE id=:id");
$stmt->execute(['id'=>$id]);

$user=$stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']=='POST'){

$email=$_POST['email'];
$role=$_POST['role'];

$sql="UPDATE User_db
SET email=:email, his_role=:role
WHERE id=:id";

$stmt=$pdo->prepare($sql);

$stmt->execute([
'email'=>$email,
'role'=>$role,
'id'=>$id
]);

header("Location: users.php");
exit;

}

?>

<h2>Edit User</h2>

<a href="users.php" class="btn-back">← Back to Users</a>

<form method="POST">

<p>Username: <?= htmlspecialchars($user['username']) ?></p>

<input name="email" value="<?= htmlspecialchars($user['email']) ?>">

<br><br>

<select name="role">

<option value="Admin" <?= $user['his_role']=='Admin'?'selected':'' ?>>Admin</option>
<option value="Technician" <?= $user['his_role']=='Technician'?'selected':'' ?>>Technician</option>
<option value="Guest" <?= $user['his_role']=='Guest'?'selected':'' ?>>Guest</option>

</select>

<br><br>

<button>Update User</button>

</form>