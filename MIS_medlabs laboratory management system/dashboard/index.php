<?php
    require "../actions/checksession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/iconic.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <title>User Dashboard</title>
</head>
<body class="imagebg">
    <nav class="w3-bar w3-white">
        <a href="#" class="w3-bar-item pagetitle"><i class="icon icon-dashboard"></i></a>
        <a href="#" class="w3-bar-item pagetitle">Dashboard</a>
    </nav>

    <div style="height:150px" class="Udetails w3-center">
        <div class="w3-animate-opacity w3-text-white">
            <span>current user : <b class="w3-text-orange"><?php echo $curuser;?></b></span><br>
            <button class="w3-tag w3-black w3-btn w3-round"><?php echo $curusertype;?></button>
        </div>
    </div>

    <?php
        if($curusertype == "doctor"){
    ?>
    <!-- in case the user is a doctor -->
    <div class="menu w3-center">
        <div>
            <h1>Available actions</h1>
            <a class="menuitem w3-hover-black" href="referpatient.php">refer a patient</a>
            <a class="menuitem w3-hover-black" href="viewreferals.php">my referals</a>
            <hr>
            <a class="menuitem w3-hover-black" href="../actions/logout.php">logout</a>
        </div>
    </div>

    
    <?php
        } else if($curusertype == "lab technician") {
    ?>
    <!-- in case the user is a lab technician -->
    <div class="menu w3-row w3-center">
        <div class="w3-col m3">
            <h1>Available actions</h1>
            <a class="menuitem w3-hover-black" href="searchreferals.php">search referals</a>
            <a class="menuitem w3-hover-black" href="servepatient.php">serve patient</a>
            <a class="menuitem w3-hover-black" href="viewreferals.php">view referals</a>
        </div>
        <div class="w3-col m3">
            <h2>Inventory Management</h2>
            <a class="menuitem w3-hover-black" href="inventoryManagement.php?myaction=add">add item</a>
            <a class="menuitem w3-hover-black" href="inventoryManagement.php?myaction=give">administer item</a>
            <a class="menuitem w3-hover-black" href="inventoryManagement.php?myaction=remove">remove item</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=inventory">view inventory</a>
        </div>
        <div class="w3-col m3">
            <h2>User options</h2>
            <a class="menuitem w3-hover-black" href="../actions/logout.php">logout</a>
        </div>
    </div>

    
    <?php
        } else {
    ?>
    <!-- in case the user is an admin -->
    <div class="w3-row menu w3-center">
        <div class="w3-col m3">
            <h1>Available actions</h1>
            <a class="menuitem w3-hover-black" href="searchreferals.php">search referals</a>
            <a class="menuitem w3-hover-black" href="servepatient.php">serve patient</a>
        </div>
        <div class="w3-col m3">
            <h2>View tables</h2>
            <a class="menuitem w3-hover-black" href="viewreferals.php">view referals</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=patientRecords">view patient records</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=users">view users</a>
            <hr>
        </div>
        <div class="w3-col m3">
            <h2>Inventory Management</h2>
            <a class="menuitem w3-hover-black" href="inventoryManagement.php?myaction=add">add item</a>
            <a class="menuitem w3-hover-black" href="inventoryManagement.php?myaction=give">administer item</a>
            <a class="menuitem w3-hover-black" href="inventoryManagement.php?myaction=remove">remove item</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=inventory">view inventory</a>
        </div>
        <div class="w3-col m3">
            <h2>database tables</h2>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=doctors">Doctors Table</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=inventory">Inventory Table</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=itemslog">Items Log Table</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=patientrecords">Patient Records Table</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=referals">Referrals Table</a>
            <a class="menuitem w3-hover-black" href="viewtable.php?thetable=users">Users Table</a>
        </div>
        <div class="w3-col m3">
            <h2>User options</h2>
            <a class="menuitem w3-hover-black" href="../actions/logout.php">logout</a>
        </div>
    </div>

    <?php
        }
    ?>

    <footer class="w3-light-grey">
        <p>Medlabs Laboratory Management Information System</p>
    </footer>
</body>

<script src="../js/utility.js"></script>

<script>
    setbackgroundImage("../");
    // document.body.style.backgroundImage = `url("../images/pexels-chokniti-khongchum-3082452.jpg")`
</script>
</html>