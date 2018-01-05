<?php
include 'dbConfig.php';
//include 'Cart.php';
//$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Orders details</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>
</head>
</head>
<body>
<div class="container">
    <?php 
    $OrderID=$_GET['id']; 
    $query = $db->query("SELECT products.name,products.id , order_items.quantity , products.price
                         FROM order_items
                         INNER JOIN products
                         WHERE order_items.product_id=products.id AND order_items.order_id=" .$OrderID);

    ?>

    <h1>Order #<?php echo  $OrderID; ?>  Details</h1>
    <form method="post" action="checkout.php">
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th> 
            <th>Subtotal</th>
        </tr>
    </thead>
    
    <tbody>
         <?php   
             while($IT = $query->fetch_assoc()){
        ?>
        <tr>
            <td> <?php echo $IT['name']; ?></td>
            <td><?php echo $IT['price']; ?></td>
            <td><?php echo $IT['quantity']; ?></td>
            <td><?php echo $IT['price']*$IT['quantity']; ?></td>


        </tr>
       <?php }?>

    </tbody>
    <tfoot>
        <tr>

            <td></td>
            <td></td>
            <td><a href="Adminview.php" class="btn btn-warning"> Order List</a></td>
            <td colspan="1"></td>

        </tr>
    </tfoot>
    </table>
    <div class="shipAddr">
        <h4><B>Customer's Information</B></h4>
    <?php     
    $CS = $db->query("SELECT customers.name,customers.email , customers.address , customers.phone
                          FROM orders
                          INNER JOIN customers
                          WHERE orders.customer_id=customers.id AND orders.id=" .$OrderID);
    while($custRow = $CS->fetch_assoc()){
    ?>
        <p><B>Name:</B> <?php echo $custRow['name']; ?></p>
        <p><B>Mail: </B><?php echo $custRow['email']; ?></p>
        <p><B>Phone: </B><?php echo $custRow['phone']; ?></p>
        <p><B>Address:</B> <?php echo $custRow['address']; ?></p>
       <?php }?>        
    </div> 

</div>
</body>
</html>