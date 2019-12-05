<?php
    include_once 'menuDB.xbs.php';
    $sql = "create table Combo(
            ID          nvarchar(15)     not NULL,
            price       integer(4)      not NULL,
            picture     varchar(200),
            items       nvarchar(4000)  not NULL,
            Primary key(ID)
        );";
    if (mysqli_query($conn, $sql)) {
        echo "Table Combo created successfully";
    } else {
        echo "Creating Combo Error" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>