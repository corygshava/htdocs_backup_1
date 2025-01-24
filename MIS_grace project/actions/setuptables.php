<?php

    // Array of table names and their corresponding fields
    /*$tables = array(
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
    */
    $tables = array(
        'users' => array(
            'userid INT AUTO_INCREMENT PRIMARY KEY',
            'usertype TEXT',
            'username TEXT',
            'userpassword VARCHAR(25)',
            'datecreated DATETIME'
        ),
        'recommendations' => array(
            'id INT AUTO_INCREMENT PRIMARY KEY',
            'userid INT',
            'bname text',
            'age INT',
            'gender text',
            'BCnumber INT',
            'Description text',
            'medicalstatus text',
            'amountrequired INT',
            'startdate datetime',
            'enddate datetime',
            'residence text',
            'status text'
        ),
        'beneficiaries' => array(
            'benid INT AUTO_INCREMENT PRIMARY KEY',
            'bname text',
            'age INT',
            'gender text',
            'BCnumber INT',
            'Description text',
            'medicalstatus text',
            'amountrequired INT',
            'startdate datetime',
            'enddate datetime',
            'lastfunddate datetime',
            'residence text'
        ),
        'deposits' => array(
            'depoid INT AUTO_INCREMENT PRIMARY KEY',
            'userid INT',
            'depoamount DECIMAL(10,2)',
            'depodate datetime',
            'code text',
            'status text'
        ),
        'transactions' => array(
            'transid INT AUTO_INCREMENT PRIMARY KEY',
            'benid INT',
            'bname text',
            'transamount DECIMAL(10,2)',
            'transdate datetime',
            'code text'
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

    // add the default record
    $theop = "SELECT * FROM users WHERE username = 'admin'";
    $result = $conn -> query($theop);

    if($result){
        if($result -> num_rows == 0){
            $thedate = date("d/m/y h:i:s");
            $theop = "INSERT INTO users (username,userpassword,datecreated,usertype) VALUES ('admin','123','$thedate','admin')";

            $result = $conn -> query($theop);

            if($result){
                echo "default record added successfully";
            } else {
                echo "Error adding default record: " . $conn->error . "<br>";
            }
        }
    }
?>