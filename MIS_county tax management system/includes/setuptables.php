<?php

    // Include the database connection file
    // include "connect.php";

    // Array of table names and their corresponding fields
    $tables = array(
        'admin' => array(
            'userid INT AUTO_INCREMENT PRIMARY KEY',
            'username TEXT',
            'email TEXT',
            'password TEXT',
            'id_number INT'
        ),
        'payments' => array(
            'id INT AUTO_INCREMENT PRIMARY KEY',
            'user_id_number INT',
            'payment_type TEXT',
            'payment_mode TEXT',
            'date_payed DATE',
            'time_payed TIME',
            'valid_untill DATE',
            'amount DECIMAL(10,2)'
        ),
        'payments_report' => array(
            'id int auto_increment primary key',
            'user_id_number int',
            'payment_type TEXT',
            'payment_mode TEXT',
            'date_payed DATE',
            'time_payed TIME',
            'valid_untill DATETIME',
            'amount DECIMAL(10,2)'
        ),
        'users' => array(
            'id int auto_increment primary key',
            'username TEXT',
            'email TEXT',
            'password TEXT',
            'location TEXT',
            'id_number int',
            'phone VARCHAR(30)'
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

    // add an admin record in admin
    $theop = "SELECT * FROM admin WHERE id_number = '11335'";
    $result = $conn -> query($theop);

    if($result){
        if($result -> num_rows == 0){
            $thehash = md5('11335');
            $theop = "INSERT INTO admin (username,email,password,id_number) VALUES ('System admin','admin@gmail.com','$thehash','11335')";

            $result = $conn -> query($theop);

            if($result){
                echo "<br>default admin records added";
            } else {
                echo "An error happened : ".$conn->error;
            }
        } else {
            // echo "its there";
        }
    }

    // add a default record in users
    $theop = "SELECT * FROM users WHERE id_number = '11335'";
    $result = $conn -> query($theop);

    if($result){
        if($result -> num_rows == 0){
            $thehash = md5('11335');
            $theop = "INSERT INTO users (username,email,password,location,id_number,phone) VALUES ('NebulaWorks','corygshava777@gmail.com','$thehash','Nairobi','11335','+254754079047')";

            $result = $conn -> query($theop);

            if($result){
                echo "<br>default records added";
            } else {
                echo "An error happened : ".$conn->error;
            }
        } else {
            // echo "its there";
        }
    }
?>
