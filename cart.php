<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

<!-- main -->
<!-- <main class="container" style="background-image: url('images/1.jpg'); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>
<center><h2>Cart</h2></center>  -->

<!-- main -->
<ul class="nav justify-content-center">
  <main class="container">
<center><h1><i class="fas fa-pizza-slice" style="color: Tomato; font-size= 4em;"></i>Welcome to Muni's Pizza!</center></h1>
</ul>
<section class="vh-100" style="background-color:">
<div class="container">
</main>
<center><h2>Cart</h2></center>

<?php
$user_id = $_SESSION['id'];

$sql = "SELECT carts.cart_id,carts.quantity, menu.title,menu.price FROM menu INNER JOIN carts WHERE menu.menu_id = carts.menu_id AND carts.user_id = $user_id";
$result = mysqli_query($conn, $sql);
$row_count_value = mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) {
  
?>

<section class="pt-5 pb-5">
  <div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
            <p class="mb-5 text-center">
                <i class="text-info font-weight-bold">3</i> items in your cart</p>
            <table id="shoppingCart" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th style="width:60%">Menu</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Subtotal</th>
                        <th style="width:10%">Quantity</th>
                        <th style="width:16%"></th>
                    </tr>
                </thead>

                <?php

                while ($row = mysqli_fetch_assoc ($result)) { 

                $menu_id = $row['menu_id'];
                $title = $row['title'];
                $price = $row['price']; 
                $cart_id = $row['cart_id'];
                $quantity = $row['quantity']; 

                $tot_price = $price * $quantity;
                $total = $total + $tot_price; 

                ?>

                <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-9 text-left mt-2">
                                    <h5 class="card-title"><?php echo $title; ?></h5>

                                </div>
                            </div>
                        </td>
                        <td data-th="Price">RM <?php echo $price; ?></td>
                        <td data-th="Price">RM <?php echo $tot_price; ?></td>
                        <td data-th="Quantity">

                            <div class="d-flex">
                                <a href = "/admin/deletecart.php?action=minus&id=<?php echo $cart_id; ?>" class="btn btn-link px-2" style="color:white">
                                    <i class="fas fa-minus" style="color:blue"></i>
                                </a>

                                <input id="form1" type="number" class="form-control form-control-sm text-center" min="1" value="<?php echo $quantity; ?>" style="width: 60px;">
                                
                                <a href = "/admin/deletecart.php?action=add&id=<?php echo $cart_id; ?>" class="btn btn-link px-2" style="color:white">
                                    <i class="fas fa-plus" style="color:blue"></i>
                                </a>
                            </div>
                            
                        </td>
                        <td class="actions" data-th="">
                            <div class="text-right">
                                <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                    <a href="/admin/deletecart.php?action=delete&id=<?php echo $cart_id; ?>" class="fas fa-trash"></a>
                                </button>
                            </div>
                        <?php } ?>
                        </td>
                    </tr>
                    <tr>
                </tbody>
            </table>
            <div class="float-right text-right">
                <h4>Total: RM <?php echo $total; ?></h4>
            </div>
        </div>
    </div>
  <tr>
        <td><a href="/index.php?" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td><a href="/admin/pay.php?id=<?php echo $user_id;?>" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
      </tr>
</div>
</section>

<?php } else{ ?> 
                                 
    <div class="p-2" style="height: 400px;"> 
    <h1 class="text-white mb-2" style="text-align: center"><i class="fas fa-shopping-cart me-2 mt-5"></i>Shopping cart is empty<i class="fas fa-shopping-cart ms-2 mt-5"></i></h1> 
    <h5><center><a>Your Cart is Empty!</a></center></h5>
    <img src="images/empty.png" width="700hv" height="500hv" style="display: block; margin-left: auto ;margin-right: auto; "> 
    </div> 
 
   <?php  } ?>

</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>