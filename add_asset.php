<?php

require 'db.php';
require 'auth.php';
require 'role.php';

if(!canEditAssets()){
die("Access denied");
}

$categories = $pdo->query("SELECT * FROM categories")
->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $serial = trim($_POST['serial'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $price = $_POST['price'] ?? '';
    $status = $_POST['status'] ?? '';
    $category = $_POST['category'] ?? '';

    $errors = [];

    if ($serial === '') {
        $errors[] = "Serial number is required";
    }

    if ($name === '') {
        $errors[] = "Device name is required";
    }

    if ($price === '' || !is_numeric($price)) {
        $errors[] = "Price must be a valid number";
    }

    if ($status === '') {
        $errors[] = "Status is required";
    }

    if ($category === '') {
        $errors[] = "Category is required";
    }

    if (empty($errors)) {

        $check = $pdo->prepare("SELECT id FROM assets WHERE serial_number = ?");
        $check->execute([$serial]);

        if ($check->rowCount() > 0) {
            $errors[] = "Serial number already exists.";
        }

    }

if (empty($errors)) {

$stmt = $pdo->prepare(
"INSERT INTO assets(serial_number,device_name,price,status,category_id)
VALUES(?,?,?,?,?)"
);

$stmt->execute([
$serial,
$name,
$price,
$status,
$category
]);

header("Location: index.php");
exit();

}
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Add Asset</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div class="form-container">
<h1>Add Asset</h1>

<form class="asset-form" method="POST">

<input type="text" name="serial" placeholder="Serial Number" required>

<input type="text" name="name" placeholder="Device Name" required>

<input name="price" type="number" step="0.01" placeholder="Price" required>

<select name="status" required>

<option>Unavailable</option>
<option>Available</option>
<option>Deployed</option>
<option>Under Repair</option>

</select>

<select name="category" required>

<?php foreach($categories as $c): ?>

<option value="<?= $c['id'] ?>">
<?= htmlspecialchars($c['name']) ?>
</option>

<?php endforeach; ?>

</select>

<button type="submit" class="btn-submit">Add</button>

</form>

<?php if(!empty($errors)): ?>

<div class="error-box">

<?php foreach($errors as $error): ?>

<p><?= htmlspecialchars($error) ?></p>

<?php endforeach; ?>

</div>

<?php endif; ?>

<a href="index.php" class="btn-back">Back</a>
</div>
</body>
</html>