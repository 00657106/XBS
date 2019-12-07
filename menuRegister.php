<?php
    include_once 'menudb.php';
    $conn = new menudb();
    
    if($conn->register($_POST['item_ID'],$_POST['item_type'],$_POST['item_price'],$_POST['item_picture']
                        ,$_POST['item_info']))
        echo "success";
    else 
		echo "fail";
    
?>