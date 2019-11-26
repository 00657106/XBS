<?php
    include_once 'menuDB.xbs.php';
    $sql = "create table Item(
            ID          varchar(15)     not NULL,
            type        varchar(15)     not NULL,
            name        varchar(15)     not NULL,
            price       integer(4)      not NULL,
            picture     varchar(200),
            info       nvarchar(4000)  not NULL,
            Primary key(ID)
        );";
    if (mysqli_query($conn, $sql)) {
        echo "Table Item created successfully";
    } else {
        echo "Creating Items Error" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>