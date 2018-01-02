<?php
// include database configuration file
include 'dbConfig.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>check order</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
</head>
<body>
<div class="container">
    <h1>Orders</h1>

    <div id="orders" class="row list-group">
        <?php
        //get rows query
        $query = $db->query("SELECT * FROM orders ORDER BY id DESC LIMIT 10");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"> 訂單編號: <?php echo $row["id"]; ?></h4>
                    <p class="list-group-item-text">顧客編號: <?php echo $row["customer_id"]; ?></p>
                    <p class="list-group-item-text">下單日期: <?php echo $row["created"]; ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead">總金額: <?php echo '$  '.$row["total_price"]; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger" href="edit.php" > 編輯</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Order(s) not found.....</p>
        <?php } ?>
    </div>
</div>
</body>
</html>