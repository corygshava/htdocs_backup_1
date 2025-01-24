    <nav class="w3-bar">
        <a href="index.php" class="active w3-bar-item">Menu</a>
        <a href="index.php" class="w3-bar-item themetxt-hover">HOME</a>

        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">Patients <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="newpatient.php">New Patient</a>
                <a class="w3-bar-item themebg-hover" href="listpatients.php">List Patients</a>
                <a class="w3-bar-item themebg-hover" href="searchpatient.php">Search for a Patient</a>
            </div>
        </div>

        <a class="w3-bar-item themetxt-hover" href="listvisits.php">List Visits</a>

        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">Appointments <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="listappointments.php">List Appointments</a>
                <a class="w3-bar-item themebg-hover" href="listappointments.php?filter=today">Today's Appointment</a>
                <a class="w3-bar-item themebg-hover" href="listappointments.php?filter=Expired">Expired Appointments</a>
                <a class="w3-bar-item themebg-hover" href="listappointments.php?filter=Kept">Kept Appointments</a>
                <a class="w3-bar-item themebg-hover" href="listappointments.php?filter=pending">pending Appointments</a>
                <a class="w3-bar-item themebg-hover" href="searchappointments.php">Search Appointments</a>
            </div>
        </div>

        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">Inventory <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="listinventory.php">View Inventory</a>
                <a class="w3-bar-item themebg-hover" href="newitem.php">Add Item</a>
                <a class="w3-bar-item themebg-hover" href="searchinventory.php">search Inventory</a>
            </div>
        </div>

        <div class="w3-dropdown-container w3-dropdown-hover">
            <a href="#" class="w3-bar-item themetxt-hover" data-role="drop">users <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item themebg-hover" href="listusers.php">List Users</a>
                <a class="w3-bar-item themebg-hover" href="newuser.php">Add User</a>
            </div>
        </div>
    </nav>