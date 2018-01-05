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
         
      }



?>