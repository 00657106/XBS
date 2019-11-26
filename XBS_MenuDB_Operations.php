<?php
include_once 'menuDB.xbs.php';

//---------------單樣餐點---------------
//新增餐點
function addItem($ID,$type,$name,$price,$picture,$info){
    global $conn;
    $sql = "INSERT INTO Item (ID,type,name,price,picture,info) VALUES (?,?,?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
    
    mysqli_stmt_bind_param($stmt,"sssiss",$ID,$type,$name,$price,$picture,$info);
    mysqli_stmt_execute($stmt);
}
function editItem(){
}

function delItem(){
}
function searchItem(){
}
//--------------------套餐----------------------/
//新增combo
function addCombo($ID,$name,$price,$picture,$items){
   
    global $conn;
    $sql = "INSERT INTO Item (ID,name,price,picture,items) VALUES (?,?,?,?,?);";
        
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt,$sql);
        
    mysqli_stmt_bind_param($stmt,"ssiss",$ID,$name,$price,$picture,$items);
    mysqli_stmt_execute($stmt);
   
}
//編輯combo
function editCombo(){
}
//刪除combo
function delCombo(){
}
?>