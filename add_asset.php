<?php

require 'db.php';

$categories = $pdo->query("SELECT * FROM categories")
->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] === "POST"){

$stmt = $pdo->prepare(
"INSERT INTO assets(serial_number,device_name,price,status,category_id)
VALUES(?,?,?,?,?)"
);

$stmt->execute([
$_POST['serial'],
$_POST['name'],
$_POST['price'],
$_POST['status'],
$_POST['category']
]);

header("Location: index.php");
exit();

}

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Asset</title>

</head>

<body>

<h2>Add Asset</h2>

<form method="POST">

<input name="serial" placeholder="Serial Number">

<input name="name" placeholder="Device Name">

<input name="price" type="number" step="0.01" placeholder="Price">

<select name="status">

<option>Not Available</option>
<option>Available</option>
<option>Deployed</option>
<option>Under Repair</option>

</select>

<select name="category">

<?php foreach($categories as $c): ?>

<option value="<?= $c['id'] ?>">
<?= htmlspecialchars($c['name']) ?>
</option>

<?php endforeach; ?>

</select>

<button>Add</button>

</form>

<a href="index.php">Back</a>

</body>
</html>