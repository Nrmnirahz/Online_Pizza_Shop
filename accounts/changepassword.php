<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<!-- main -->
<main class="container">
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>

</main>
<center><h2>Change Password</h2></center>

<?php
if(isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
	if(!empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {

	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	$user_id = $_SESSION['id'];

	if (strcmp($new_password, $confirm_password)){
		alert("password not match");
		header("Location: /accounts/changepassword.php");
		exit();
	}

//Update information
	$sql = "UPDATE users SET password = '$confirm_password' WHERE user_id = $user_id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) == 1) {
		alert("Password update successfull");
		header("Location: /accounts/changepassword.php");
		exit();
		} else {
		alert("Error on updating password");
		header("Location: /accounts/changepassword.php");
		exit();
		}
	} else {
		alert("All fields are required");
		header("Location: /accounts/changepassword.php");
		exit();
	}
}
?>

<!-- main -->
<main class="flex-shrink-0">
<div class="d-flex justify-content-center">
<form class="col-4" method="POST">
      <div class="mb-3">
        <label for="inputNewPassword" class="form-label">New Password</label>
        <input type="password" name="new_password" class="form-control" id="inputNewPassword">
      </div>
      <div class="mb-3">
        <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="inputPassword">
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-primary">Change Password</button>
      </div>
  </form>
</div>
</main>

<?php include '../includes/footer.php'; ?>

</body>
</html>