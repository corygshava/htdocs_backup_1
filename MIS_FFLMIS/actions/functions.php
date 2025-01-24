<?php
    function db_connect()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'medlabs';

        $conn = mysqli_connect($servername, $username, $password, $database);
        return $conn;
    }

    function startSession($uname,$utype){
        addCookie("username",$uname,3600*48);
        addCookie("usertype",$utype,3600*48);
    }

    function endSession(){
        deleteCookie("username");
        deleteCookie("usertype");
    }

    function addCookie($cookieName, $cookieValue) {
        // Set the cookie expiration time to one day from the current time
        $expiration = time() + (24 * 60 * 60); // 24 hours
        
        // Set the cookie with the provided name, value, and expiration time
        setcookie($cookieName, $cookieValue, $expiration);
        
        // Optional: Display a message indicating that the cookie has been set
        // echo "Cookie '$cookieName' has been set with value '$cookieValue'.";
    }

    function deleteCookie($cookieName) {
        // Set the cookie expiration time to a past date to immediately expire the cookie
        $expiration = time() - 3600; // 1 hour ago
        
        // Delete the cookie by setting its expiration time to a past date
        setcookie($cookieName, "", $expiration);
        
        // Optional: Display a message indicating that the cookie has been deleted
        echo "Cookie '$cookieName' has been deleted.";
    }

    function exist_user($conn, $username)
    {
        $sql = "SELECT * FROM `users` WHERE user_name='$username'";
        
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
            return true;
        return false;
    }

    function exist_booking($conn, $customer_id, $route_id)
    {
        $sql = "SELECT * FROM `bookings` WHERE customer_id='$customer_id' AND route_id='$route_id'";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num)
        {
            $row = mysqli_fetch_assoc($result);   
            return $row["id"];
        }
        return false;
    }

    function bus_assign($conn, $busno)
    {
        $sql = "UPDATE buses SET bus_assigned=1 WHERE bus_no='$busno'";
        $result = mysqli_query($conn, $sql);
    }

    function bus_free($conn, $busno)
    {
        $sql = "UPDATE buses SET bus_assigned=0 WHERE bus_no='$busno'";
        $result = mysqli_query($conn, $sql);
    }

    function busno_from_routeid($conn, $id)
    {
        $sql = "SELECT * from routes WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row)
        {
            return $row["bus_no"];
        }
        return false;
    }

    function get_from_table($conn, $table, $primaryKey, $pKeyValue, $toget)
    {
        $sql = "SELECT * FROM $table WHERE $primaryKey='$pKeyValue'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row)
        {
            return $row["$toget"];
        }
        return false;
    }

    function mysql_field_name($res,$field_offset)
    {
        $properties = mysqli_fetch_field_direct($res,$field_offset);
        return is_object($properties) ? $properties->name : null;
    }

    function createFileIfNotExists($filename) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        try {
            // Your file creation code here
        } catch (Exception $e) {
            // Handle the exception and log the error
            echo 'Error: ' . $e->getMessage();
        }

        if (!file_exists($filename)) {
            // Create the file and write an initial content (empty in this case)
            if (file_put_contents($filename, '') === false) {
                // If unable to create the file, return false or handle the error
                echo "file writing operation failed";
                return false;
            }
        }
        return true;
    }
?>