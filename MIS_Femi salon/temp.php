<?php
    if(isset($_POST['op'])){
        // set up data from forms
        $username = $_POST["username"];
        $password = $_POST["password"];
        $operation = $_POST["op"];
        
        $mydb = "login system";
        $mytable = "users";
        $totalrows = 0;
        $record;
        echo "performing ".$operation." operation<br>";

        if($operation == "login"){
            // in case the user wants to log into an existing user account(login)
            echo "beginning procedure<br>";
            $myop = "SELECT * FROM users WHERE username='".$username."'";
            echo $myop."<br>";
            $workonit = true;

            echo "getting data<br>";
            include('getdata.php');
            echo "data processed<br>lines found :".$totalrows."<br>";

            // in case it works
            if($totalrows > 0){
                $myrow = $record[0];
                if($myrow[2] == $password){
                    echo "login successful";
                    logmein($myrow[1]);
                    showerror("login successful");
                } else {
                    showerror("wrong password");
                }
            } else {
                showerror("The username doesnt exist on this server, try signing up");
            }
        } else {
            // in case the user wants to add a new user (signup)
            echo "beginning signup procedure<br>";
            $myop = "SELECT * FROM users WHERE username='".$username."'";
            $workonit = true;
            echo $myop."<br>";

            echo "running getter code<br>";
            include('getdata.php');
            echo "getter code complete<br>";

            // in case it works
            if($totalrows > 0){
                // error, the user already exists
                showerror("there is arecord with that username, try loging in instead");
            } else {
                // add new record
                $myop = "INSERT INTO users (userid,username,password,user_role) VALUES (NULL,'".$username."','".$password."','worker')";
                $workonit = false;
                echo $myop."<br>";

                include('getdata.php');
                logmein($username);
                showerror("record added");
            }
        }
    } else {
        $errtext = 'an error occured during login';
        showerror($errtext);
    }
?>

<?php
    function showerror($err){
        echo "
            <script>
                window.location.assign(`login.php?error=".$err."`);
            </script>
        ";
    }

    function logmein($who){
        setcookie('username',$who,time() + 3600);
    }
?>