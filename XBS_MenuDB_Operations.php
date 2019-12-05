<?php
include_once 'menuDB.xbs.php';


//---------------單樣餐點---------------
//新增餐點
function addItem($ID,$type,$price,$picture,$info){
    global $conn;
    $sql = "INSERT INTO Item (ID,type,price,picture,info) VALUES (?,?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    
    mysqli_stmt_bind_param($stmt,"ssiss",$ID,$type,$price,$picture,$info);
    mysqli_stmt_execute($stmt);
}
function editItem($ID,$type,$price,$picture,$info){
    global $conn;
    $sql = "UPDATE Item SET type = $type ,price = $price,pictuer = $picture, info = $info WHERE ID = $ID";
    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    
    mysqli_stmt_bind_param($stmt,"ssiss",$ID,$type,$price,$picture,$info);
    mysqli_stmt_execute($stmt);

}

function delItem($ID){
    global $conn;
    $sql = "DELETE Item where ID = $ID";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_execute($stmt);
}

//--------------------套餐----------------------/
//新增combo
function addCombo($ID,$price,$picture,$items){
   
    global $conn;
    $sql = "INSERT INTO Item (ID,price,picture,items) VALUES (?,?,?,?);";
        
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
        
    mysqli_stmt_bind_param($stmt,"siss",$ID,$price,$picture,$items);
    mysqli_stmt_execute($stmt);
   
}
//編輯combo
function editCombo($ID,$price,$picture,$items){
    global $conn;
    $sql = "UPDATE Combo SET price = $price, pictuer = $picture, items = $items WHERE ID = $ID";
    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    
    mysqli_stmt_bind_param($stmt,"siss",$ID,$price,$picture,$items);
    mysqli_stmt_execute($stmt);
    
}
//刪除combo
function delCombo(){
    global $conn;
    $sql = "DELETE Combo where ID = $ID";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_execute($stmt);
}
?>