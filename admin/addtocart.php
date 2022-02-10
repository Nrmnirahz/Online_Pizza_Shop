<?php include '../includes/config.php'; ?>
<?php include '../includes/header.php'; ?>

<?php

if (isset($_GET['id'])) { 
    if (!empty($_GET['id'])) { 
        $menu_id = $_GET['id']; 
        $user_id = $_SESSION['id'];


        // checking utk check menu_id dh ada atau belum dlm cart and user
        // klau ada = update table
        // klau tkde = insert into carts
        $sql2 = "SELECT * FROM carts WHERE menu_id = $menu_id AND user_id = $user_id"; 
        $result2 = mysqli_query($conn, $sql2); 
        
        if (mysqli_num_rows($result2)>0) { 
            $row = mysqli_fetch_assoc($result2);
            $cart_id = $row['cart_id'];
            $quantity = $row['quantity'];

            $quantity = $quantity + 1;

            $addquantity = "UPDATE carts SET quantity = $quantity WHERE cart_id = $cart_id";
            $addquantres = mysqli_query($conn, $addquantity);

            if ($addquantres) { 
            alert("SUCCESSFULLY add Cart."); 
            header("Location: ../index.php"); 
            exit(); 
        } else { 
            alert($quantity); 
            header("Location: ../login.php"); 
            exit();
        }

    }else{

        $sql = "INSERT INTO carts ( menu_id, quantity, user_id ) VALUES ( '$menu_id', 1, '$user_id' )"; 
        $result = mysqli_query($conn, $sql); 
        
        if ($result) { 
            alert("SUCCESSFULLY add to Cart."); 
            header("Location: ../index.php"); 
            exit(); 
        } else { 
            alert("Please login first."); 
            header("Location: ../login.php"); 
            exit(); 
        } 
    }
    }else { 
        alert("ERROR! Menu ID is empty and is required."); 
        header("Location: ../index.php"); 
        exit(); 
    } 
} else { 
    alert("ERROR! Parameter GET ID is required."); 
    header("Location: ../index.php"); 
    exit(); 
} 
?>