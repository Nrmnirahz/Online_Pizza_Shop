<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<?php

//put this at the first line
session_start();
//if  authentication successful 
$_SESSION['login'] = true;

//check if email and password field post data exist
if (isset($_POST['email']) && isset($_POST['password'])) {
	if (!empty($_POST['email']) && !empty($_POST['password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
	} else {
		alert("Email and password is required");
		header("Location: /login.php");
		exit();
	}

	//perform sql login
	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_assoc($result);
		if($row['role'] == 1){
			$_SESSION['is_admin'] = True;
		} else {
			$_SESSION['is_admin'] = False;
		}

		$_SESSION['id'] = $row['user_id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		alert("Welcome " . $_SESSION['username']);
		header("Location: /index.php");
		exit();
	} else {
		alert("email or password is incorrect");
		header("Location: /login.php");
		exit();
	}
}
?>

<!-- main -->
<main class="flex-shrink-0"> 
<div class="container">
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>
<center><h2>Login</h2></center>
<div class="d-flex justify-content-center">
<form class="col-4" method="POST">
	<div class="mb-3">
		<label for="inputEmail" class="form-label">Email Address</label>
		<input type="email" name="email" class="form-control" id ="inputEmail">
	</div>
	<div class="mb-3">
		<label for="inputPassword" class="form-label">Password</label>
		<input type="password" name="password" class="form-control" id ="inputPassword">
	</div>
	<div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-primary">Login</button>
      </div>
	</form>

</div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>