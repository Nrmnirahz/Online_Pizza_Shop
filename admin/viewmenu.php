<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<!-- main -->
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>

<main class="flex-shrink-0">
  <div class="container">
    <center><h1 class="mt-5">All Menu</h1></center>
    <div class="row">

<?php

$sql = "SELECT * FROM menu";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {

    $menu_id = $row['menu_id'];
    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price']; ?>

<div class="col-4 mt-5">
<div class="card bg-transparent">
	<div class="card-body">
    <h5 class="card-title"><?php echo $title; ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Price: RM<?php echo $price; ?></h6>
    <p class="card-text"><?php echo $description; ?></p>
    <a href="/admin/editmenu.php?id=<?php echo $menu_id; ?>" class="btn btn-outline-primary">Edit</a>
    <a href="/admin/deletemenu.php?id=<?php echo $menu_id; ?>" class="btn btn-outline-primary">Delete</a>
  </div>
</div>
</div>

<?php
}
} else {
  echo "No Menu";
}

?>

</div>
</div>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>