<?php
// initializ shopping cart class
//include 'Cart.php';
//$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Cart</title>
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
    <?php $OrderID=$_GET['id']; 

    ?>

    <h1>Order #<?php echo  $OrderID; ?></h1>
    <form method="post" action="checkout.php">
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>         
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td></td>
            <td></td>
            <td><input type="number" name="qty"></td>
            <td></td>
            <td>
                <a href="AdminAction.php?action=removeItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>

        </tr>

    </tbody>
    <tfoot>
        <tr>
            <td><a href="Adminview.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Order List</a></td>
            <td colspan="2"></td>
            <?php { ?>
            <td class="text-center"><strong>Total</strong></td>
            <td><a href="Adminview.php"  class="btn btn-success btn-block">Finish <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</body>
</html>