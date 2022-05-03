<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Summary</title>
        <link rel="stylesheet" href="css/bottom-right.css">

    <?php 
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bottom-right.css\" />";
    ?>

</head>
<body>

<script>
alert('You cannot add anymore items in the cart!');
</script>

<?php

session_start();

    foreach($_SESSION["items"] as $product){ ?>
      <p><a href="#"><?php echo $product["product_name"];?></a> * <?php echo $product["quantity"];?><span class="price">$<?php echo $product["unit_price"]*$product["quantity"];?></span></p>
  <?php } ?>

    <hr>

    <p>Total <span class="price" style="color:black"><b>$
    <?php
    $total = 0;
    foreach($_SESSION["items"] as $product){
      $total += $product["unit_price"]*$product["quantity"];
    }
    echo $total;
 
?>

<div class=confirm_msg>
Please press 'purchase' to confirm your order.
</div>
<br><br>
<a href="Login.php" target="top-right" class="purchase" id="purchase-btn">Purchase ></a>

</body>
</html>
