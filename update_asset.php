<?php

require 'db.php';
require 'auth.php';
require 'role.php';

if(!canEditAssets()){
die("Access denied");
}

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

$categories = $pdo->query("SELECT * FROM categories")
->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->prepare("SELECT * FROM assets WHERE id = ?");
$stmt->execute([$id]);

$asset = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$asset) {
    die("Asset not found");
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $serial = trim($_POST['serial'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $price = $_POST['price'] ?? '';
    $status = $_POST['status'] ?? '';
    $category = $_POST['category'] ?? '';

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

        $check = $pdo->prepare(
            "SELECT id FROM assets 
             WHERE serial_number = ? 
             AND id != ?"
        );

        $check->execute([$serial, $id]);

        if ($check->fetch()) {
            $errors[] = "Serial number already exists.";
        }

    }

    if (empty($errors)) {

        $update = $pdo->prepare(
            "UPDATE assets
             SET serial_number = ?, 
                 device_name = ?, 
                 price = ?, 
                 status = ?, 
                 category_id = ?
             WHERE id = ?"
        );

        $update->execute([
            $serial,
            $name,
            $price,
            $status,
            $category,
            $id
        ]);

        header("Location: index.php");
        exit();
    }

}

?>

<!DOCTYPE html>
<html>

<head>
<title>Edit Asset</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<div class="form-container">

    <h1>Edit Asset</h1>

    <?php if (!empty($errors)): ?>
        <div class="error-box">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form class="asset-form" method="POST">

        <input type="text" name="serial"
        placeholder="Serial Number"
        value="<?= htmlspecialchars($_POST['serial'] ?? $asset['serial_number']) ?>">

        <input type="text" name="name"
        placeholder="Device Name"
        value="<?= htmlspecialchars($_POST['name'] ?? $asset['device_name']) ?>">

        <input type="number" step="0.01" name="price"
        placeholder="Price"
        value="<?= htmlspecialchars($_POST['price'] ?? $asset['price']) ?>">

        <select name="status">
            <option value="Available" <?= ($asset['status']=="Available")?"selected":"" ?>>Available</option>
            <option value="Deployed" <?= ($asset['status']=="Deployed")?"selected":"" ?>>Deployed</option>
            <option value="Under Repair" <?= ($asset['status']=="Under Repair")?"selected":"" ?>>Under Repair</option>
            <option value="Unavailable" <?= ($asset['status']=="Unavailable")?"selected":"" ?>>Unavailable</option>
        </select>

        <select name="category">
            <?php foreach ($categories as $c): ?>
                <option value="<?= $c['id'] ?>"
                <?= ($asset['category_id']==$c['id'])?"selected":"" ?>>
                    <?= htmlspecialchars($c['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn-submit">Update</button>

    </form>

    <a href="index.php" class="btn-back">Back</a>

</div>

</body>

</html>