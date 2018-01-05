<?php 
class Order {
	     public function remove($row_id){
        // unset & save
        $sql ="DELETE FROM Order WHERE id=[$row_id]";

        return TRUE;
     }
}
?>