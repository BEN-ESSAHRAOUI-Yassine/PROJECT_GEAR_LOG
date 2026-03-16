<?php

require '../auth.php';
require '../db.php';
require '../role.php';

if(!canManageUsers()){
die("Access denied");
}

$users = $pdo->query("SELECT * FROM User_db")
->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

<title>User Management</title>
<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<h1>User Management</h1>

<a href="../index.php" class="btn-back">← Back to Dashboard</a>

<a href="add_user.php" class="btn-add">Add User</a>

<br><br>

<table>

<tr>
<th>ID</th>
<th>Username</th>
<th>Email</th>
<th>Role</th>
<th>Actions</th>
</tr>

<?php foreach($users as $u): ?>

<tr>

<td><?= $u['id'] ?></td>

<td><?= htmlspecialchars($u['username']) ?></td>

<td><?= htmlspecialchars($u['email']) ?></td>

<td><?= htmlspecialchars($u['his_role']) ?></td>

<td class="actions">

<a href="edit_user.php?id=<?= $u['id'] ?>" class="btn-edit">
Edit
</a>

<a href="delete_user.php?id=<?= $u['id'] ?>"
class="btn-delete"
onclick="return confirm('Delete this user?')">
Delete
</a>

</td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>