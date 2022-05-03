<?php
session_start();
?>
<html>
<head>
    <title>Show Product</title>
</head>
<body>
<?php
$servername = "aa1co89ywu609b.cxln4yoxhdkv.us-east-1.rds.amazonaws.com";
$username = "uts";
$password = "internet";
$dbname = "assignment1";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}



$product_name = "";
$unit_price = "";
$unit_quantity = "";
$in_stock = "";
$itemId = "";
$showNoItem = "display: none";
$showItem = "";


if (isset($_GET['data'])) {
    $itemId = $_GET['data'];
    $sql = "SELECT product_id , product_name , unit_price, unit_quantity, in_stock  FROM products where product_id=".$itemId;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        $showNoItem = "display: none";
        $showItem = "";
        while($row = $result->fetch_assoc()) {
            $product_name = $row["product_name"];
            $unit_price =  $row["unit_price"];
            $unit_quantity =  $row["unit_quantity"];
            $in_stock =  $row["in_stock"];
            break;
        }
    } else {

        $showNoItem = "";
        $showItem = "display: none";
    }
} else {
    $showNoItem = "";
    $showItem = "display: none";
}



?>

<div id="noItem" style="<?php echo $showNoItem?>"><h2>Please select items from categories on the left.</h2></div>
<div id="itemDiv" style="<?php echo $showItem?>">
    <div class="item-title">
        <span class="item-name"><?php echo $product_name?> </span>
        (<span class="item-quatity"><?php echo $unit_quantity?></span>)
    </div>
    <div class="itemDetail">

        <div class="item-desp">
            <div class="in-stock-div">In Stock: <span class="item-in-stock"><?php echo $in_stock?> </span> </div>
            <div class="price-tag-div">Price: <span class="item-price-red">$<?php echo $unit_price ?></span></div>
            <p></p>
            
            <?php 
            $_SESSION["currentProduct"] = $row;?>

                <form action="bottom-right.php" method="get" target="bottom-right" class="order-row" onsubmit="return validate_quantity()">
                Quantity (between 1 and 20):
				<input type="number" id="quantity" name="quantity" min="1" value="1">
				<input type="submit" value="ADD">
                <input type="hidden" name="productId" value="<?php echo $itemId?>">
                <input type="hidden" name="productInfo" value='<?php echo "$product_name($unit_quantity)"?>'>
                <input type="hidden" name="productPrice" value="<?php echo $unit_price ?>" >

                
            </form>
        </div>

    </div>
</div>

<?php
$conn->close();

?>
<?php 
    if( $_REQUEST["Login"] == 1 && (count($_SESSION["itmes"]) > 0) )
	{
		require('Login.php');
	}

?>


<script>
	function validate_quantity(){
		var quantity = document.getElementById("quantity").value;
		if (quantity > 20) {
			alert("quantity should less than 20");
    		return false;			
		} 
		return true;
	}
	
</script>
</body>
</html>