<?php
    $dontredirect = "yes";
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <title>Dashboard</title>
</head>

<body>
    <?php
        if($curuser == ""){
    ?>

    <div class="halfguy">
        <div class="container">
            <h1>Log in</h1>
            <form action="actions/handlelogin.php" method="post">
                <input type="text" name="thename" placeholder="enter your name here" required>
                <input type="password" name="thepassword" placeholder="enter your password here" required>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <?php
        } else {
            // include 'components/navbar.php';
    ?>

    <header class="w3-center">
        <h1>Welcome <span class="w3-text-blue"><?php echo $curuser;?></span></h1>
        <a class="themetxt-hover" href="actions/logout.php">log out</a>
    </header>

    <div class="content">
        <div>
            <div class="w3-row">
                <div class="w3-col m6">
                    <div class="main">
                        <h2>Patient</h2>
                        <a class="themetxt-hover" href="newpatient.php">New Patient</a><br>
                        <a class="themetxt-hover" href="listpatients.php">List Patients</a><br>
                        <a class="themetxt-hover" href="searchpatient.php">Search for a Patient</a><br>
                        <a class="themetxt-hover" href="listvisits.php">List Visits</a><br>
                    </div>
                </div>
                <div class="w3-col m6">
                    <div class="main">
                        <h2>Appointments</h2>
                        <a class="themetxt-hover" href="listappointments.php">List Appointments</a><br>
                        <a class="themetxt-hover" href="listappointments.php?filter=today">Today's Appointment</a><br>
                        <a class="themetxt-hover" href="listappointments.php?filter=Expired">Expired Appointments</a><br>
                        <a class="themetxt-hover" href="listappointments.php?filter=Kept">Kept Appointments</a><br>
                        <a class="themetxt-hover" href="listappointments.php?filter=pending">pending Appointments</a><br>
                        <a class="themetxt-hover" href="searchappointments.php">Search Appointments</a><br>
                    </div>
                </div>
            </div>
            <div class="w3-row">
                <div class="w3-col m6">
                    <div class="main">
                        <h2>Inventory</h2>
                        <a class="themetxt-hover" href="listinventory.php">View Inventory</a><br>
                        <a class="themetxt-hover" href="newitem.php">Add Item</a><br>
                        <a class="themetxt-hover" href="searchinventory.php">search Inventory</a><br>
                    </div>
                </div>
                <div class="w3-col m6">
                    <div class="main">
                        <h2>Users</h2>
                        <a class="themetxt-hover" href="listusers.php">List Users</a><br>
                        <a class="themetxt-hover" href="newuser.php">Add User</a><br>
                    </div>
                </div>
            </div>
        
        <?php
            include 'components/printwidget.php';
            }
        ?>
    </div>

    <?php
        include 'components/footer.php';
    ?>
</body>
</html>
