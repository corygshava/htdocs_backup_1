<?php
	// Function to check if a table exists
	function tableExists($conn, $tableName) {
		$checkTable = $conn->query("SHOW TABLES LIKE '$tableName'");
		return $checkTable && $checkTable->num_rows > 0;
	}

	// Tables and their structures
	$tables = [
		"Users" => "CREATE TABLE Users (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			Username TEXT,
			Password VARCHAR(30),
			Date_added DATETIME DEFAULT CURRENT_TIMESTAMP
		)",
		"Visitors" => "CREATE TABLE Visitors (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			visitor_name TEXT,
			date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
			id_no TEXT,
			contact TEXT,
			user_type TEXT,
			status TEXT
		)",
		"Visits" => "CREATE TABLE Visits (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			visitorid INT,
			tour_type TEXT,
			date_started DATETIME DEFAULT CURRENT_TIMESTAMP,
			date_ended DATETIME,
			payment_code TEXT,
			status TEXT DEFAULT 'pending'
		)",
		"Payments" => "CREATE TABLE Payments (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			pay_code TEXT,
			pay_amount DECIMAL(10,2),
			pay_purpose TEXT,
			pay_date DATETIME DEFAULT CURRENT_TIMESTAMP
		)",
		"Event_Reservations" => "CREATE TABLE Event_Reservations (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			rsv_date DATETIME DEFAULT CURRENT_TIMESTAMP,
			rsv_serial TEXT,
			rsv_status TEXT,
			facility TEXT,
			event_name TEXT,
			event_date DATETIME DEFAULT CURRENT_TIMESTAMP,
			event_type TEXT,
			event_description TEXT,
			pay_code text
		)",
		"Visit_Reservations" => "CREATE TABLE Visit_Reservations (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			rsv_date DATETIME DEFAULT CURRENT_TIMESTAMP,
			rsv_serial TEXT,
			rsv_status TEXT,
			visitor_id INT
		)",
		"Feedback" => "CREATE TABLE Feedback (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			fbk_date DATETIME DEFAULT CURRENT_TIMESTAMP,
			fbk_status TEXT DEFAULT 'pending',
			fbk_text TEXT,
			fbk_review TEXT,
			visitor_id INT
		)",
		"SystemData" => "CREATE TABLE SystemData (
			Id INT PRIMARY KEY AUTO_INCREMENT,
			date_changed DATETIME DEFAULT CURRENT_TIMESTAMP,
			date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
			itemname TEXT,
			itemvalue TEXT,
			itemdata TEXT
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
			"utype_local_adult" => 15000,
			"utype_foreign_child" => 7000,
			"utype_foreign_adult" => 5000,
			"utype_local_child" => 2000,
			"tour_halfday" => 5000,
			"tour_fullday" => 11000,
			"tour_private" => 12000,
			"tour_multiday_2" => 24000,
			"tour_multiday_3" => 36000,
			"tour_multiday_4" => 48000,
			"tour_multiday_5" => 60000,
			"tour_multiday_6" => 72000,
			"tour_multiday_7" => 84000,
			"tour_VIP" => 20000,
			"tour_Family" => 17500,
			"tour_Night" => 9000,
			"fac_Animal orphanage" => 25000,
			"fac_Kifaru ark" => 25000,
			"fac_black rhino sanctuary" => 25000,
			"fac_Ivory monument" => 25000,
			"fac_Hippo pools" => 25000,
			"fac_Camping site" => 25000,
			"fac_Conference hall" => 25000
		];

		// Insert data into SystemData table
		foreach ($systemData as $itemname => $itemvalue) {
			$conn->query("INSERT INTO SystemData (itemname, itemvalue, itemdata) VALUES ('$itemname', '$itemvalue', '')");
		}

		echo "default system data setup successfully";
	}
?>
