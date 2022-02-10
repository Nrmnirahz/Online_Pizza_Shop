<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php

if (isset($_GET['id'])) {
  if (!empty($_GET['id'])){
    $menu_id = $_GET['id'];

    $sql = "SELECT * FROM menu WHERE menu_id=$menu_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);
      $title = $row['title'];
      $description = $row['description'];
      $price = $row['price'];
    } else{
      alert("Menu id does not exist");
      header("Location: /admin/viewmenu.php");
      exit();
    }
  } else {
      alert("Menu id is empty and is required");
      header("Location: /admin/viewmenu.php");
      exit();
    }
  } else {
      alert("Parameter GET id is required");
      header("Location: /admin/viewmenu.php");
      exit();
}

//update data
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price'])) {
  if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price'])) {

  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  
//check if contact number input is numberical
  if (!ctype_digit($price)) {
    alert("Price must be a number");
    header("Location: /admin/editmenu.php?id=$menu_id");
    exit();
  }


//update information
$sql = "UPDATE menu SET title = '$title', description = '$description', price = $price WHERE menu_id = $menu_id";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) == 1) {
      alert("Menu update successfull");
      header("Location: /admin/viewmenu.php");
      exit();
  } else {
      alert("Error on updating menu");
      header("Location: /admin/viewmenu.php");
      exit();
    }
  } else {
      alert("All fields are required");
      header("Location: /admin/editmenu.php?id=$menu_id");
      exit();
  }
}

?>

<!-- main -->
<main class="container">
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>

<center><h2>Edit Menu</h2></center>

<div class="d-flex justify-content-center">
<form class="col-6" method="POST">
	<div class="mb-3">
		<label for="inputTitle" class="form-label">Menu Name</label>
		<input type="text" name="title" value="<?php echo $title; ?>" class="form-control" id ="inputTitle">
	</div>
	<div class="mb-3">
		<label for="inputDescription" class="form-label">Menu Description</label>
		<textarea class="form-control" name="description" id ="inputDescription" rows="3"><?php echo $description; ?></textarea>
	</div>
		<div class="mb-3">
		<label for="inputPrice" class="form-label">RM</label> 
		<input type="number" name="price" value="<?php echo $price; ?>" class="form-control" id ="inputPrice"></input>
	</div>
	<div class="d-grip gap-2">
		<button type="submit" class="btn btn-outline-primary">Update Menu</button>
	</div>
	</form>
</div>
</div>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>
</main>