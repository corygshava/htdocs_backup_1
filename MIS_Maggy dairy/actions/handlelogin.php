<?php
    // Include the database connection
    include 'connect.php';

    $restxt = "the code didnt run";
    $toredirect = '../login.php';
    $theid = 0;

    function startsession($utype,$uname, $id){
        setcookie("curusername", $uname, time() + (86400 * 30), "/"); // Cookie valid for 30 days
        setcookie("curusertype", $utype, time() + (86400 * 30), "/"); // Cookie valid for 30 days
        setcookie("curuserid", $id, time() + (86400 * 30), "/"); // Cookie valid for 30 days
    }

    // Check if required values are passed
    if (isset($_POST['userrole'], $_POST['Username'], $_POST['Password'])) {
        $userrole = $_POST['userrole'];
        $username = $_POST['Username'];
        $password = $_POST['Password'];

        if ($userrole == "admin") {
            // Check if username exists
            $checkUser = $conn->query("SELECT * FROM Users WHERE Username='$username'");
            if ($checkUser->num_rows === 0) {
                $restxt = "Username not found.";
            } else {
                // Verify password
                $user = $checkUser->fetch_assoc();
                $opres = ($user['Password'] === $password);
                $theid = $user['Id'];
                $restxt = $opres ? "user Login successful." : "Incorrect password.";
                $toredirect = !$opres ? '../login.php' : "../index.php";

                startsession($userrole,$username,$theid);
            }
        } else {
            // Check if farmer exists by name or ID
            $checkFarmer = $conn->query("SELECT * FROM Farmers WHERE farmer_name='$username' OR id_no='$username'");
            if ($checkFarmer->num_rows === 0) {
                $restxt = "Farmer not found.";
            } else {
                // Verify password
                $farmer = $checkFarmer->fetch_assoc();
                $opres = ($farmer['Password'] === $password);
                $theid = $farmer['Id'];
                $thename = $farmer['farmer_name'];
                $restxt = $opres ? "farmer Login successful." : "Incorrect password.";
                $toredirect = !$opres ? '../login.php' : "../index.php";

                startsession($userrole,$thename,$theid);
            }
        }
    } else {
        $restxt = "invalid request data";
    }

	include '../elements/loader.php';
?>
