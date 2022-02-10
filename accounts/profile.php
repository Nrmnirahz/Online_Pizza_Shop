<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<!-- main -->
<main class="container">
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>

</main>
<center><h2>Profile</h2></center>
<?php
$user_id = $_SESSION['id'];

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['contact_number']) && isset($_POST['address'])) {
	if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['contact_number']) && !empty($_POST['address'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$contact_number = $_POST['contact_number'];
	$address = $_POST['address'];
	

	//check if contact number input is numberical
	if (!ctype_digit($contact_number)) {
		alert("Contact number must be a number");
		header("Location: /accounts/profile.php");
		exit();
	}

	//Update information
	$sql = "UPDATE users SET username = '$username', email = '$email', contact_number = '$contact_number', address = '$address' WHERE user_id = $user_id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) == 1) {
		alert("Profile update successfull");
		header("Location: /accounts/profile.php");
		exit();
		} else {
		alert("Error on updating profile");
		header("Location: /accounts/profile.php");
		exit();
		}
	} else {
		alert("All fields are required");
		header("Location: /accounts/profile.php");
		exit();
	}
}

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) == 1) {
  	$row = mysqli_fetch_assoc($result);

  	$username = $row['username'];
  	$email = $row['email'];
  	$contact_number = $row['contact_number'];
  	$address = $row['address'];
?>

<main class="flex-shrink-0">
<div class="container">
<div class="d-flex justify-content-center">
<form class="col-4" method="POST">
      <div class="mb-3">
        <label for="inputUsername" class="form-label">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" id="inputUsername">
      </div>
      <div class="mb-3">
        <label for="inputEmail" class="form-label">Email address</label>
        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" id="inputEmail" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="inputContactNumber" class="form-label">Contact Number</label>
        <input type="tel" name="contact_number" value="<?php echo $contact_number; ?>" class="form-control" id="inputContactNumber">
      </div>
      <div class="mb-3">
        <label for="inputAddress" class="form-label">Address</label>
        <textarea class="form-control" name="address" value="<?php echo $address; ?>" id="inputAddress" rows="3"></textarea>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" class="btn btn-outline-primary">Update Profile</button>
      </div>
    </form>
</div>
</main>
<?php } ?>
<?php include '../includes/footer.php'; ?>
</body>
</html>