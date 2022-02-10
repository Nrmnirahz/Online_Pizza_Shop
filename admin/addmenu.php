<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php
// check if post request contains our post data
if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price'])) {
 if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['price'])) {
  // assgining variable
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  //check if contact number input is numberical
  if (!ctype_digit($price)) {
    alert("Price must be a number");
    header("Location: /admin/addmenu.php");
    exit();
  }

	$sql = "INSERT INTO menu (title, description, price) VALUES ('$title', '$description', $price)";
  $result = mysqli_query($conn, $sql);
  if ($result) {
  	alert("Menu successfully added.");
    header('Location: /admin/viewmenu.php');
    exit();
  }else{
  	alert("There was an error during adding menu.");
    header('Location: /admin/viewmenu.php');
    exit();
  }
}else{
    alert("All fields are required.");
    header('Location: /admin/addmenu.php');
    exit();
  }
}
?>

<!-- main -->
<main class="container">
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>

</main>
<center><h2>Add Menu</h2></center>

<div class="d-flex justify-content-center">
<form class="col-6" method="POST">
	<div class="mb-3">
		<label for="inputTitle" class="form-label" >Menu Name</label>
		<input type="text" name="title" class="form-control" id ="inputTitle">
	</div>
	<div class="mb-3">
		<label for="inputDescription" class="form-label">Menu Description</label>
		<textarea class="form-control" name="description" id ="inputDescription" rows="3"></textarea>
	</div>
		<div class="mb-3">
		<label for="inputPrice" class="form-label">RM</label> 
		<input type="number" name="price" class="form-control" id ="inputPrice"></input>
	</div>
	<div class="d-grip gap-2">
		<button type="submit" class="btn btn-outline-primary">Add Menu</button>
	</div>
	</form>
</div>
</div>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>