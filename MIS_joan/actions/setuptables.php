<?php

	// Function to check if a table exists
	function tableExists($conn, $tableName) {
	    $checkTable = $conn->query("SHOW TABLES LIKE '$tableName'");
	    return $checkTable && $checkTable->num_rows > 0;
	}

	$currentDate = date('Y-m-d H:i:s');

	// Farmers Table
	if (!tableExists($conn, 'Farmers')) {
	    $sql = "CREATE TABLE Farmers (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        Name TEXT,
	        Phone_contact TEXT,
	        email TEXT,
	        intakes INT,
	        seeds_brought INT,
	        location TEXT,
	        date_added DATETIME
	    )";
	    $conn->query($sql);
	}

	// Intakes Table
	if (!tableExists($conn, 'Intakes')) {
	    $sql = "CREATE TABLE Intakes (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        in_serial text,
	        Farmer_id INT,
	        Amt_brought INT,
	        Amt_paid DECIMAL(10,2),
	        Date_added DATETIME
	    )";
	    $conn->query($sql);
	}

	// Users Table
	if (!tableExists($conn, 'Users')) {
	    $sql = "CREATE TABLE Users (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        Username TEXT,
	        Password VARCHAR(30),
	        Date_added DATETIME
	    )";
	    $conn->query($sql);

	    // Insert default admin user
	    $conn->query("INSERT INTO Users (Username, Password, Date_added) VALUES ('admin', '123', '$currentDate')");
	}

	// Inprocessing Table
	if (!tableExists($conn, 'Inprocessing')) {
	    $sql = "CREATE TABLE Inprocessing (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        Date_added DATETIME,
	        Amount INT,
	        Status TEXT,
	        Date_cleared DATETIME
	    )";
	    $conn->query($sql);
	}

	// Inventory Table
	if (!tableExists($conn, 'Inventory')) {
	    $sql = "CREATE TABLE Inventory (
	        id INT PRIMARY KEY AUTO_INCREMENT,
	        itemname TEXT,
	        itemamt DECIMAL(10,2)
	    )";
	    $conn->query($sql);

	    // Insert default inventory items
	    $conn->query("INSERT INTO Inventory (itemname, itemamt) VALUES ('coffee_seeds', 0), ('coffee', 0)");
	}

	// Deposits Table
	if (!tableExists($conn, 'Deposits')) {
	    $sql = "CREATE TABLE Deposits (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        Transaction_code TEXT,
	        Depo_amt INT,
	        date_done DATETIME
	    )";
	    $conn->query($sql);
	}

	// Sales Table
	if (!tableExists($conn, 'sales')) {
	    $sql = "CREATE TABLE Sales (
	        Id INT PRIMARY KEY AUTO_INCREMENT,
	        Transaction_code TEXT,
	        Amt_sold DECIMAL(10,2),
	        Amt_recieved INT,
	        Date_done DATETIME
	    )";
	    $conn->query($sql);
	}

	// sysdata Table
	if (!tableExists($conn, 'sysdata')) {
	    $sql = "CREATE TABLE sysdata (
	        id INT PRIMARY KEY AUTO_INCREMENT,
	        itemname TEXT,
	        itemvalue DECIMAL(10,2),
	        description TEXT,
	        date_updated DATETIME
	    )";
	    $conn->query($sql);

	    // Insert default sysdata records
	    $conn->query("INSERT INTO sysdata (itemname, itemvalue, description, date_updated) VALUES
	        ('price_per_kilo', 250.00, 'price to pay for 1 kilo of coffee seeds', '$currentDate'),
	        ('sale_per_kilo', 450.00, 'price to sell 1 kilo of coffee', '$currentDate')");
	}
?>
