<?php

    // Array of table names and their corresponding fields
    $tables = array(
        'users' => array(
            'userid INT AUTO_INCREMENT PRIMARY KEY',
            'username text',
            'userpassword text',
            'usertype text',
            'usercontact text',
            'dateadded datetime'
        ),
        'events' => array(
            'eventid INT AUTO_INCREMENT PRIMARY KEY',
            'eventcreator text',
            'eventname text',
            'eventdate datetime',
            'starttime time',
            'endtime time',
            'ticketcost int',
            'description text',
            'venue text',
            'themecolor int',
            'eventkey text',
            'eventcode text'
        ),
        'performers' => array(
            'recid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'pname text',
            'role text',
            'starttime time',
            'endtime time',
            'checkedin text'
        ),
        'vendors' => array(
            'recid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'vname text',
            'role text',
            'description text',
            'contact text'
        ),
        'bookings' => array(
            'recid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'userid int',
            'contact text',
            'cname text',
            'ticketcode text',
            'checkedin text'
        ),
        'tasks' => array(
            'taskid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'description text',
            'assignedto text',
            'duedate datetime',
            'iscomplete text'
        ),

    );

/* 
    users table
        fields
            userid INT AUTO_INCREMENT PRIMARY KEY,
            username text,
            userpassword text,
            usertype text,
            usercontact text,
            dateadded datetime

    events
        fields
            eventid INT AUTO_INCREMENT PRIMARY KEY,
            eventname text,
            eventdate datetime,
            starttime time,
            endtime time,
            ticketcost number,
            description text,
            venue text,
            themecolor number,
            eventkey text,
            eventcode text

    performers
        fields
            'recid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'pname text',
            'role text',
            'starttime time',
            'endtime time',
            'checkedin text'

    vendors
        fields
            'recid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'vname text',
            'role text',
            'description text',
            'contact text'

    bookings
        fields
            'recid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'userid int',
            'contact text',
            'cname text',
            'ticketcode text',
            'checkedin text'

    tasks
        fields
            'taskid INT AUTO_INCREMENT PRIMARY KEY',
            'eventid int',
            'description text',
            'assignedto text',
            'duedate datetime',
            'iscomplete text'
*/

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

    /*
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
    */
?>