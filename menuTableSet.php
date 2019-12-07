<?php
    include_once 'menudb.php';
	$conn;
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "xbs";
	try 
	{
		$conn = new PDO('mysql:dbname=' . $dbName . ';host=' . $dbServername, $dbUsername, $dbPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Error Handling
		$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	} 
	catch (PDOException $e) 
	{
		echo 'conn error<br>';
	}	
	$sqlItem = "create table Item(
            item_ID          varchar(15)     not NULL,
            item_type        varchar(15)     not NULL,
            item_price       integer(4)      not NULL,
            item_picture     varchar(200),
            item_info       nvarchar(4000)  not NULL,
            Primary key(item_ID)
        );";
	$sqlCombo = "create table Combo(
            combo_ID          nvarchar(15)     not NULL,
            combo_price       integer(4)      not NULL,
            combo_picture     varchar(200),
            combo_items       nvarchar(4000)  not NULL,
            Primary key(combo_ID)
        );";
	try
	{
		$conn->exec($sqlItem);
		echo "create Item table success<br>";
	}
	catch (PDOException $e)
	{
		echo "fail to create Item table<br>";
	}
	echo "<br>";
	try
	{
		$conn->exec($sqlCombo);
		echo "create Combo table success<br>";
	}
	catch (PDOException $e)
	{
		echo "fail to create Combo table<br>";
	}
	$conn = new menudb();
	/*$conn->addItem("1", "蛋餅", 30,"培根蛋餅的圖片","培根+蛋+餅");
	$conn->addItem("2", "蛋餅", 35,"薯餅蛋餅的圖片","薯餅+蛋+餅");
	$conn->addItem("3","漢堡", 50,"壽喜燒牛肉堡的圖片","壽喜燒+牛肉+堡");
	$conn->addItem("4","漢堡", 55,"卡拉雞腿堡的圖片","卡拉雞腿+堡");
	$conn->addItem("5","麵", 50,"奶油麵的圖片","奶油+麵");
	$conn->addItem("6","麵", 50,"蘑菇麵的圖片","蘑菇+麵");
	$conn->addItem("7","麵", 100,"蘑菇麵的圖片","蘑菇+麵");
	$conn->addCombo("1", "蛋餅", 60,"培根蛋餅+薯餅蛋餅的圖片","培根蛋餅+薯餅蛋餅");
	$conn->addCombo("2", "蛋餅", 100,"壽喜燒牛肉堡+卡拉雞腿堡的圖片","壽喜燒牛肉堡+卡拉雞腿堡");
	$conn->addCombo("3","漢堡", 99,"奶油麵+蘑菇麵的圖片","奶油麵+蘑菇麵");*/
	//$conn->editItem("7", "蛋餅2", 40,"培根蛋餅的圖片1","培根+蛋+餅2");//bug
	//$conn->delItem("7");
	//echo $conn->searchItem("6");
	//echo $conn->getItem();
	$conn->editCombo("3", "2","培根蛋餅的圖片1","培根+蛋+餅2");//bug
	//$conn->delCombo("3");
	//echo $conn->searchCombo("3");
	//echo $conn->getCombo();

?>