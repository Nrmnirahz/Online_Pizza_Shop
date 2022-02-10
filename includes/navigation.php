
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container-fluid">
    <a class="nav-link disabled" href="#" tabindex="1" aria-disabled="true"><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 1.5em;"></i>PizzaShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
        </li>
        <?php
        if ($_SESSION['is_admin']) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/admin/addmenu.php">Add Menu</a></li>
            <li><a class="dropdown-item" href="/admin/editmenu.php">Edit Menu</a></li>
            <li><a class="dropdown-item" href="/admin/viewmenu.php">View Menu</a></li>
            <li><a class="dropdown-item" href="/admin/deletemenu.php">Delete Menu</a></li>
          </ul>
        </li>
          </li>
        <?php } ?>
        <?php
        if (isset($_SESSION['username'])) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          My Account
        </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/accounts/profile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="/accounts/changepassword.php">Change Password</a></li>
          </ul>
        </li>
         <li class="nav-item" style="margin-left: 1000px;">
          <a class="nav-link" href="/cart.php" ><i class="fas fa-shopping-cart"></i></a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="/logout.php">Logout</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="/login.php">Login</a>
        </li>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="/signup.php">Sign Up</a>
        </li>
      <?php } ?>
      </ul>
    </div>
  </div>
</nav>