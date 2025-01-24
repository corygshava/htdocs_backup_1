<?php

    // Array of table names and their corresponding fields
    $tables = array(
        'users' => array(
            'userid INT AUTO_INCREMENT PRIMARY KEY',
            'username TEXT',
            'userpassword TEXT',
            'datecreated DATETIME'
        ),
        'patients' => array(
            'patientid INT AUTO_INCREMENT PRIMARY KEY',
            'patientname text',
            'patientContact text',
            'idnumber INT',
            'age INT',
            'gender text',
            'registrationdate datetime',
            'lastvisit datetime'
        ),
        'visits' => array(
            'visitid INT AUTO_INCREMENT PRIMARY KEY',
            'visitserial text',
            'patientidnumber INT',
            'facilityused text',
            'visitdate datetime',
            'doctorsRemarks text',
            'dateverified datetime',
            'visitstatus text'
        ),
        'appointments' => array(
            'appointmentid int auto_increment primary key',
            'appointmentserial text',
            'appointmentdate datetime',
            'facility text',
            'patientidnumber int',
            'appointmentstatus text'
        ),
        'inventory' => array(
            'itemid int auto_increment primary key',
            'itemname text',
            'itemquantity int',
            'dateadded datetime',
            'dateupdated datetime',
            'updatelog text'
        ),
        'facilities' => array(
            'facid int primary key auto_increment',
            'facname text',
            'dateadded datetime'
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

            $result = $conn -> query($theop);

            if($result){
                echo "default record added successfully";
            } else {
                echo "Error adding default record: " . $conn->error . "<br>";
            }
        }
    }
?>
