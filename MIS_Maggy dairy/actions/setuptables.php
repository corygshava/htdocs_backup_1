<?php
	// Function to check if table exists
	function tableExists($conn, $tableName) {
	    $check = $conn->query("SHOW TABLES LIKE '$tableName'");
	    return $check->num_rows > 0;
	}

	// Tables and structures
	$tables = [
	    "Users" => "CREATE TABLE Users (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        Username TEXT,
	        Password VARCHAR(30),
	        Date_added DATETIME DEFAULT CURRENT_TIMESTAMP
	    )",
	    "Farmers" => "CREATE TABLE Farmers (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        farmer_name TEXT,
	        id_no text,
	        Password VARCHAR(30),
	        date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
	        location TEXT,
	        contact TEXT
	    )",
	    "Milk" => "CREATE TABLE Milk (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        farmerid INT,
	        quantity TEXT,
	        date_brought DATETIME DEFAULT CURRENT_TIMESTAMP
	    )",
	    "Sales" => "CREATE TABLE Sales (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        farmerid int,
	        Transaction_code TEXT,
	        quantity int,
	        Amount_paid DECIMAL(10,2),
	        Date_of_sale DATETIME DEFAULT CURRENT_TIMESTAMP,
	        status text default 'pending'
	    )",
	    "Systemdata" => "CREATE TABLE Systemdata (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        itemname TEXT,
	        itemvalue TEXT,
	        date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
	        date_changed DATETIME DEFAULT CURRENT_TIMESTAMP
	    )"
	];

	// Create tables if they do not exist
	foreach ($tables as $tableName => $createSQL) {
	    if (!tableExists($conn, $tableName)) {
	        $conn->query($createSQL);
	    }
	}

	// Insert default admin user if no records exist in Users table
	$checkusersquery = "SELECT COUNT(*) AS count FROM Users";
	$userCheck = $conn->query($checkusersquery);
	$userRow = $userCheck->fetch_assoc();

	if ($userRow['count'] == 0) {
		$conn->query("INSERT INTO Users (Username, Password) VALUES ('admin', '123')");

		echo "default admin record setup successfully, you may need to log in again";
	}

	$checksysdataquery = "SELECT COUNT(*) AS count FROM SystemData";
	$sysCheck = $conn->query($checksysdataquery);
	$sysRow = $sysCheck->fetch_assoc();

	if($sysRow['count'] == 0){
		// Data to insert into SystemData table
		$systemData = [
			"price_per_litre" => 1500
		];

		// Insert data into SystemData table
		foreach ($systemData as $itemname => $itemvalue) {
			$conn->query("INSERT INTO Systemdata (itemname, itemvalue) VALUES ('$itemname', '$itemvalue')");
		}

		echo "default system data setup successfully";
	}
?>