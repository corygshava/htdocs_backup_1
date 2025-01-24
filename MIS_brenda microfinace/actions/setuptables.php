<?php

    // Include the database connection file
    // include "connect.php";

    // Array of table names and their corresponding fields
    $tables = array(
        'loans' => array(
            'loanid INT AUTO_INCREMENT PRIMARY KEY',
            'loanholder TEXT',
            'loanamount DECIMAL(10,2)',
            'balance DECIMAL(10,2)',
            'loanguarantors TEXT',
            'dateapplied DATETIME',
            'dateapproved DATETIME',
            'dateverified DATETIME',
            'amountpaid DECIMAL(10,2)',
            'paymentcode TEXT',
            'status TEXT'
        ),
        'deposits' => array(
            'depoid INT AUTO_INCREMENT PRIMARY KEY',
            'depoamt DECIMAL(10,2)',
            'depoholder TEXT',
            'depodate DATETIME',
            'depo_transactioncode TEXT',
            'depostatus TEXT'
        ),
        'withdrawals' => array(
            'wdid INT AUTO_INCREMENT PRIMARY KEY',
            'wdamt DECIMAL(10,2)',
            'wdholder TEXT',
            'wddate DATETIME'
        ),
        'savings' => array(
            'saveid INT AUTO_INCREMENT PRIMARY KEY',
            'saveamt DECIMAL(10,2)',
            'saveholder TEXT',
            'savestatus TEXT',
            'updatedates TEXT',
            'savestartdate DATETIME'
        ),
        'customers' => array(
            'custid INT AUTO_INCREMENT PRIMARY KEY',
            'custname TEXT',
            'custpassword TEXT',
            'custcontact VARCHAR(25)',
            'custstatus TEXT',
            'custjoindate DATETIME'
        ),
        'users' => array(
            'userid INT AUTO_INCREMENT PRIMARY KEY',
            'username TEXT',
            'userpassword TEXT',
            'datecreated DATETIME'
        ),
        'usagelogs' => array(
            'logid INT AUTO_INCREMENT PRIMARY KEY',
            'logdate DATETIME',
            'logcontents TEXT'
        )
    );

    // Loop through each table and check if it exists, if not, create it
    foreach ($tables as $tableName => $fields) {
        $checkTableQuery = "SHOW TABLES LIKE '$tableName'";
        $result = $conn->query($checkTableQuery);

        if ($result->num_rows == 0) {
            // Table doesn't exist, create it
            $createTableQuery = "CREATE TABLE $tableName (";
            $createTableQuery .= implode(",", $fields);
            $createTableQuery .= ")";
            
            if ($conn->query($createTableQuery) === TRUE) {
                echo "Table $tableName created successfully.<br>";
            } else {
                echo "Error creating table $tableName: " . $conn->error . "<br>";
            }
        } else {
            // echo "Table $tableName already exists.<br>";
        }
    }

    // add an admin record in users
    $theop = "SELECT * FROM users WHERE username = 'admin'";
    $result = $conn -> query($theop);

    if($result){
        if($result -> num_rows == 0){
            $thedate = date("d/m/y h:i:s");
            $theop = "INSERT INTO users (username,userpassword,datecreated) VALUES ('admin','123','$thedate')";
            // echo "$theop";

            $result = $conn -> query($theop);
        }
    }
?>
