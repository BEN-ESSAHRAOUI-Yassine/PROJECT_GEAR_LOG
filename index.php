<?php
require 'db.php';

/* ---------- PARAMETERS ---------- */

$search = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';

$sort = $_GET['sort'] ?? 'device_name';
$order = $_GET['order'] ?? 'ASC';

$page = $_GET['page'] ?? 1;

/* ---------- SORT SECURITY ---------- */

$allowedSort = ['device_name','price','status'];

if (!in_array($sort,$allowedSort)) {
    $sort = 'device_name';
}

$order = ($order === 'DESC') ? 'DESC' : 'ASC';

/* ---------- PAGINATION ---------- */

$limit = 10;

$page = max(1,(int)$page);

$offset = ($page - 1) * $limit;

/* ---------- QUERY ---------- */

$sql = "SELECT assets.*, categories.name AS category_name
FROM assets
INNER JOIN categories
ON assets.category_id = categories.id
WHERE 1";

$params = [];

/* Search */

if ($search !== '') {

$sql .= " AND (device_name LIKE :search OR serial_number LIKE :search)";
$params['search'] = "%$search%";

}

/* Category filter */

if ($category !== '') {

$sql .= " AND category_id = :category";
$params['category'] = $category;

}

/* Sorting + Pagination */

$sql .= " ORDER BY $sort $order
LIMIT :limit OFFSET :offset";

/* Execute query */

$stmt = $pdo->prepare($sql);

foreach ($params as $key => $value) {
    $stmt->bindValue(":$key",$value);
}

$stmt->bindValue(':limit',$limit,PDO::PARAM_INT);
$stmt->bindValue(':offset',$offset,PDO::PARAM_INT);

$stmt->execute();

$assets = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* ---------- COUNT FOR PAGINATION ---------- */

$countSql = "SELECT COUNT(*) FROM assets WHERE 1";

$countParams = [];

if ($search !== '') {

$countSql .= " AND (device_name LIKE :search OR serial_number LIKE :search)";
$countParams['search'] = "%$search%";

}

if ($category !== '') {

$countSql .= " AND category_id = :category";
$countParams['category'] = $category;

}

$countStmt = $pdo->prepare($countSql);
$countStmt->execute($countParams);

$totalAssets = $countStmt->fetchColumn();

$totalPages = ceil($totalAssets / $limit);

/* ---------- TOTAL INVENTORY VALUE ---------- */

$valueStmt = $pdo->query("SELECT SUM(price) FROM assets");
$totalValue = $valueStmt->fetchColumn();

/* ---------- LOAD CATEGORIES ---------- */

$categories = $pdo->query("SELECT * FROM categories")
->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

<title>GearLog Dashboard</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<h1>GearLog - Asset Dashboard</h1>

<h3>Total Inventory Value: $<?= htmlspecialchars($totalValue) ?></h3>

<a href="add_asset.php">Add New Asset</a>

<br><br>

<!-- SEARCH + FILTER -->

<form method="GET">

<input
name="search"
placeholder="Search asset"
value="<?= htmlspecialchars($search) ?>">

<select name="category">

<option value="">All Categories</option>

<?php foreach ($categories as $c): ?>

<option
value="<?= $c['id'] ?>"
<?= ($category==$c['id'])?'selected':'' ?>>

<?= htmlspecialchars($c['name']) ?>

</option>

<?php endforeach; ?>

</select>

<button>Filter</button>

</form>

<br>

<!-- TABLE -->

<table>

<tr>

<th>
<a href="?search=<?= $search ?>&category=<?= $category ?>&sort=device_name&order=ASC">
Device
</a>
</th>

<th>Serial</th>

<th>
<a href="?search=<?= $search ?>&category=<?= $category ?>&sort=price&order=ASC">
Price
</a>
</th>

<th>
<a href="?search=<?= $search ?>&category=<?= $category ?>&sort=status&order=ASC">
Status
</a>
</th>

<th>Category</th>

<th>Actions</th>

</tr>

<?php foreach ($assets as $a): ?>

<tr>

<td><?= htmlspecialchars($a['device_name']) ?></td>

<td><?= htmlspecialchars($a['serial_number']) ?></td>

<td>$<?= htmlspecialchars($a['price']) ?></td>


<td class="<?= strtolower(str_replace(' ','-',$a['status'])) ?>">
<?= htmlspecialchars($a['status']) ?>
</td>


<td><?= htmlspecialchars($a['category_name']) ?></td>

<td>

<a href="update_asset.php?id=<?= $a['id'] ?>">Edit</a>

 | 

<a href="delete_asset.php?id=<?= $a['id'] ?>"
onclick="return confirm('Delete this asset?')">

Delete

</a>

</td>

</tr>

<?php endforeach; ?>

</table>

<br>

<!-- PAGINATION -->

<div>

<?php for ($i=1;$i<=$totalPages;$i++): ?>

<a
href="?search=<?= $search ?>&category=<?= $category ?>&sort=<?= $sort ?>&order=<?= $order ?>&page=<?= $i ?>">

<?= $i ?>

</a>

<?php endfor; ?>

</div>

</body>

</html>