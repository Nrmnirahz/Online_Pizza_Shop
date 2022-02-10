<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<!-- main -->
<main class="container" style="background-image: url('images/pizzahut.jpg'); background-size: 100% 105%; height: 100hv; max-width: 2000px;">
<center><h1 class="text-white"><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>
<center><h2 class="text-white"><i class="fas fa-store" style="color:#EE8CDB; font-size= large;"></i>Home</h2></center>

<main class="flex-shrink-0">
  <div class="container">
    <div class="row">

<?php
session_start();
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
  <div class="card-body"  style="background-color:#FFFFFF; opacity: 0.65;">
    <h5 class="card-title text-black"><?php echo $title; ?></h5>
    <h6 class="card-subtitle mb-2 text-black">Price: RM<?php echo $price; ?></h6>
    <p class="card-text text-black"><?php echo $description; ?></p>
        <a href="/admin/addtocart.php?id=<?php echo $menu_id; ?>" class="btn btn-outline-primary">Add to Cart</a>

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


</body>
</html>
</main>

<?php include 'includes/footer.php'; ?>