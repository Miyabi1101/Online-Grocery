<?php

session_start();
?>

<?php
$servername = "aa1co89ywu609b.cxln4yoxhdkv.us-east-1.rds.amazonaws.com";
$username = "uts";
$password = "internet";
$dbname = "assignment1";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

if ($_GET["clear"] == 1) {
  unset($_SESSION["currentProduct"]);
  unset($_SESSION['showCheckout']);
  unset($_SESSION['items']);
}
if(isset($_SESSION["currentProduct"]) && $_GET["quantity"] > 0){

  if (!isset($_SESSION["items"])) {  
 
      $itemid = $_SESSION["currentProduct"][product_id];
      $_SESSION["items"][$itemid][product_id] = $_SESSION["currentProduct"][product_id];
      $_SESSION["items"][$itemid][product_name] = $_SESSION["currentProduct"][product_name];
      $_SESSION["items"][$itemid][unit_price] = $_SESSION["currentProduct"][unit_price];
      $_SESSION["items"][$itemid][unit_quantity] = $_SESSION["currentProduct"][unit_quantity];
      $_SESSION["items"][$itemid][quantity] = $_GET["quantity"];

  }else
  {
    $serchid = $_SESSION["currentProduct"][product_id];
    $find = 0;

      foreach ($_SESSION["items"] as $item) {
        if ($item["product_id"] == $serchid) {    
          $_SESSION["items"][$serchid][quantity] = $_GET["quantity"];
          $t = $_SESSION["items"][$serchid][quantity];

          $find = 1;
          break;
        }

      }

      if ($find == 0) {
        $itemid = $_SESSION["currentProduct"][product_id];  
        $_SESSION["items"][$itemid][product_id] = $_SESSION["currentProduct"][product_id];
        $_SESSION["items"][$itemid][product_name] = $_SESSION["currentProduct"][product_name];
        $_SESSION["items"][$itemid][unit_price] = $_SESSION["currentProduct"][unit_price];
        $_SESSION["items"][$itemid][unit_quantity] = $_SESSION["currentProduct"][unit_quantity];
        $_SESSION["items"][$itemid][quantity] = $_GET["quantity"];
       
      }

      $number = 0;
      foreach ($_SESSION["items"] as $item){
        $number += $item[quantity];
      }
    }

} 
      $total_number = 0;
      foreach ($_SESSION["items"] as $item){
        $total_number += $item[quantity];
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <?php 
    echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/bottom-right.css\" />";
    echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/mystyle.css\" />";
    ?>

</head>
<body>

<div id="info-banner" style="display:none" class="alert alert-info">
  <strong>Note:</strong> No items! 
  <br>Click 'CHECKOUT' button to hide this information.
</div>

<a href="bottom-right.php?clear=1" target="bottom-right" class="button button_red" style="float:right">CLEAR</a>
<a href="Confirmation.php" target="top-right" class="button" id="checkout-btn">CHECKOUT</a>
<hr>

<div class="row">
<div class="col-25" >
  <div class="container">
    <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i><b id='number-items'><?php echo $total_number;?></b></span></h4>
  
  <?php 
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
    ?></b></span></p>
    <?php
  $conn->close();

  ?>
  </div>
</div>
</div>

<script>
  document.getElementById("checkout-btn").onclick=checkout;
  function checkout() {	
    var number = document.getElementById("number-items").innerHTML;
    if (number == 0) 
    {
      var popup = document.getElementById("info-banner");
      popup.classList.toggle("show");

            
    } else {

    }
  }
  
    
</script>
</body>
</html>
