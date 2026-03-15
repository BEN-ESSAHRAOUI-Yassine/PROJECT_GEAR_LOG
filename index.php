<?php

require 'db.php';

$search = $_GET['search'] ?? '';

$sql = "SELECT assets.*, categories.name AS category_name
FROM assets
INNER JOIN categories
ON assets.category_id = categories.id";

if($search){

$sql .= " WHERE device_name LIKE :search
OR serial_number LIKE :search";

}

$stmt = $pdo->prepare($sql);

if($search){

$stmt->bindValue(':search',"%$search%");

}

$stmt->execute();

$assets = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = $pdo->query("SELECT SUM(price) AS total FROM assets")
->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>

<title>GearLog</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<h1>GearLog Dashboard</h1>

<h2>Total Inventory Value: $<?= htmlspecialchars($total['total'] ?? 0) ?></h2>

<a href="add_asset.php">Add Asset</a>

<form method="GET">

<input name="search" placeholder="Search asset"
value="<?= htmlspecialchars($search) ?>">

<button>Search</button>

</form>

<table>

<tr>
<th>Serial</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php foreach($assets as $a): ?>

<tr>

<td><?= htmlspecialchars($a['serial_number']) ?></td>
<td><?= htmlspecialchars($a['device_name']) ?></td>
<td><?= htmlspecialchars($a['category_name']) ?></td>
<td>$<?= htmlspecialchars($a['price']) ?></td>

<td class="<?= strtolower(str_replace(' ','-',$a['status'])) ?>">
<?= htmlspecialchars($a['status']) ?>
</td>

<td>
<a href="update_asset.php?id=<?= $a['id'] ?>">
Edit
</a>
<a href="delete_asset.php?id=<?= $a['id'] ?>">
Delete
</a>
</td>

</tr>

<?php endforeach; ?>

</table>

</body>
</html>