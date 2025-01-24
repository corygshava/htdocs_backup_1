<?php
	$tables = array(
        'admin' => array(
            'userid INT AUTO_INCREMENT PRIMARY KEY',
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
            'valid_untill DATETIME',
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

?>