<?php
class menudb
{
	private $dbServername = "localhost";
	private $dbUsername = "root";
	private $dbPassword = "";
	private $dbName = "xbs";
	function __construct()
	{
        try 
		{
            $this->conn = new PDO('mysql:dbname=' . $this->dbName . ';host=' . $this->dbServername, $this->dbUsername, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } 
		catch (PDOException $e) 
		{
            echo 'no db<br>';
        }
	}
    function __destruct()
    {
        $this->conn = null;
    }
	//---------------單樣餐點---------------
	//新增餐點
	function addItem($item_ID,$item_type,$item_price,$item_picture,$item_info)
	{
		$sql = "INSERT INTO Item (item_ID,item_type,item_price,item_picture,item_info) VALUES (?,?,?,?,?);";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(1, $item_ID);
		$stmt->bindParam(2, $item_type);
		$stmt->bindParam(3, $item_price);
		$stmt->bindParam(4, $item_picture);
		$stmt->bindParam(5, $item_info);
		try
		{
			$stmt->execute();
        }
        catch (PDOException $e)
		{
           echo 'addItem error<br>';
        }
	}
	function editItem($item_ID,$item_type,$item_price,$item_picture,$item_info)//has BUG
	{
		$sql = "UPDATE Item SET item_type = $item_type ,item_price = $item_price,item_pictuer = $item_picture, item_info = $item_info WHERE item_ID LIKE '%" . $item_ID . "%';";
		try
		{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
        catch (PDOException $e)
		{
           echo 'editItem error<br>';
        }
	}
	function delItem($item_ID)
	{
		$sql = "DELETE FROM Item where item_ID = $item_ID;";
		try
		{
			$stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
        catch (PDOException $e)
		{
           echo 'deleteItem error<br>';
        }
	}
	function searchItem($str)
    {
        $searchResult = array();
        $sql = "SELECT * FROM Item WHERE item_ID LIKE '%" . $str . "%';";
        try 
		{
            $result = $this->conn->query($sql);
            $searchResult = $result->fetchAll();
            $searchResult = json_encode($searchResult);
            return $searchResult;
        } 
		catch (PDOException $e) 
		{
            echo 'searchItem error<br>';
        }
    }
	function getItem()
    {
        $itemData = array();
        $sql = "SELECT * FROM Item;";
        try 
		{
            $result = $this->conn->query($sql);
            $itemData = $result->fetchAll();
            $itemData = json_encode($itemData);
            return $itemData;
        } 
		catch (PDOException $e) 
		{
            echo 'getItem error';
        }
    }
	//--------------------套餐----------------------/
	//新增combo
	function addCombo($combo_ID,$combo_price,$combo_picture,$combo_items)
	{
 		$sql = "INSERT INTO Combo (combo_ID,combo_price,combo_picture,combo_items) VALUES (?,?,?,?);";
			
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(1, $combo_ID);
		$stmt->bindParam(2, $combo_price);
		$stmt->bindParam(3, $combo_picture);
		$stmt->bindParam(4, $combo_items);
		try
		{
			$stmt->execute();
        }
        catch (PDOException $e)
		{
           echo 'addCombo error<br>';
        }
   	}
	//編輯combo
	function editCombo($combo_ID,$combo_price,$combo_picture,$combo_items)//has BUG
	{
		$sql = "UPDATE Combo SET combo_price = $combo_price, combo_pictuer = $combo_picture, combo_items = $combo_items WHERE combo_ID LIKE '%" . $combo_ID . "%';";
		try
		{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
        catch (PDOException $e)
		{
           echo 'editCombo error<br>';
        }
	}
	//刪除combo
	function delCombo($combo_ID)
	{
		$sql = "DELETE FROM Combo where combo_ID = $combo_ID";
		try
		{
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
        catch (PDOException $e)
		{
           echo 'deleteCombo error<br>';
        }
	}
	function searchCombo($str)
    {
        $searchResult = array();
        $sql = "SELECT * FROM Combo WHERE combo_ID LIKE '%" . $str . "%';";
        try 
		{
            $result = $this->conn->query($sql);
            $searchResult = $result->fetchAll();
            $searchResult = json_encode($searchResult);
            return $searchResult;
        }
		catch (PDOException $e) 
		{
            echo 'searchCombo error<br>';
        }
    }
	function getCombo()
    {
        $comboData = array();
        $sql = "SELECT * FROM Combo;";
        try 
		{
            $result = $this->conn->query($sql);
            $comboData = $result->fetchAll();
            $comboData = json_encode($comboData);
            return $comboData;
        } 
		catch (PDOException $e) 
		{
            echo 'getCombo error';
        }
    }

}
?>