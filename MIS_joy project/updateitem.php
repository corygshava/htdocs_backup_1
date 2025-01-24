
<?php
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <title>Update item</title>
</head>
<body>
    <nav class="w3-bar">
        <a href="#" class="active w3-bar-item">Menu</a>
        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">Patients <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="newpatient.html?req=new%20patient">New Patient</a>
                <a class="w3-bar-item themebg-hover" href="listpatients.html">List Patients</a>
                <a class="w3-bar-item themebg-hover" href="searchpatient.html">Search for a Patient</a>
            </div>
        </div>

        <a class="w3-bar-item themetxt-hover" href="visits.php">List Visits</a>

        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">Appointments <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="appointments.php?req=new%20appointment">New Appointment</a>
                <a class="w3-bar-item themebg-hover" href="appointments.php?req=today%27s%20appointment">Today's Appointment</a>
                <a class="w3-bar-item themebg-hover" href="appointments.php?req=list%20appointments">List Appointments</a>
                <a class="w3-bar-item themebg-hover" href="appointments.php?req=expired%20appointments">Expired Appointments</a>
                <a class="w3-bar-item themebg-hover" href="appointments.php?req=kept%20appointments">Kept Appointments</a>
                <a class="w3-bar-item themebg-hover" href="appointments.php?req=kept%20appointments">pending Appointments</a>
                <a class="w3-bar-item themebg-hover" href="appointments.php?req=search%20appointments">Search Appointments</a>
            </div>
        </div>

        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">Inventory <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="inventory.php?req=view%20inventory">View Inventory</a>
                <a class="w3-bar-item themebg-hover" href="inventory.php?req=add%20item">Add Item</a>
                <a class="w3-bar-item themebg-hover" href="inventory.php?req=administer%20item">Administer Item</a>
            </div>
        </div>

        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">users <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="users.php?req=list%20users">List Users</a>
                <a class="w3-bar-item themebg-hover" href="users.php?req=add%20user">Add User</a>
            </div>
        </div>
    </nav>

    <div class="halfguy">
        <div class="container">
            <h1>Update item</h1>
            <form action="actions/searchpatient.php" method="post">
                <select name="itemname"> <!-- auto generated via database call-->
                    <option>choose an item</option>
                    <option value="IBOPROFEIN">IBOPROFEIN</option>
                    <option value="NORMALIN">NORMALIN</option>
                </select>
                <input type="number" name="theamt" placeholder="how many" required>
                <button type="submit">Submit</button>
            </form>
            <div class="w3-center">
                <a href="index.php" class="w3-text-blue">go back</a>
            </div>
        </div>
    </div>

    <?php
        include 'components/footer.php';
    ?>
</body>
</html>