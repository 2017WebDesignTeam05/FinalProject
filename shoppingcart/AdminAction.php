<?php
include 'dbConfig.php';

if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'editOrder' && !empty($_REQUEST['id'])){
        $OrderID = $_REQUEST['id'];
        header("Location: edit.php? id=$OrderID"); 
        }

		elseif($_REQUEST['action'] == 'removeOrdertItem' && !empty($_REQUEST['id'])){
		$OrderID = $_REQUEST['id'];
		$sql = "DELETE FROM orders WHERE id = $OrderID";
		mysqli_query($link, $sql);
        header("Location: Adminview.php");      
          } 

		elseif($_REQUEST['action'] == 'removeItem' && !empty($_REQUEST['Oid']&$_REQUEST['Iid'])){
		$IteamsID = $_REQUEST['Iid'];
		$OrderID = $_REQUEST['Oid'];		
		$sql = "DELETE FROM orders_iteams WHERE product_id = $IteamsID and order_id = $OrderID";
		mysqli_query($link, $sql);
        header("Location: Adminview.php");      
          }           
      }

?>