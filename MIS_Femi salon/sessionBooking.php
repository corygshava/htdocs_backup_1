<?php
$openit = false;
$subtext = "";
$storedUserId = null;

if(isset($_COOKIE['username'])) {
    $subtext = "Here you can book for a session and we will be sure to remind you when it arrives";
    $openit = true;
} else {
    header("refresh:5;url=login.php");
    $subtext = "Redirecting to login page in 5 seconds...";
    exit;
}

if($openit){include('userdata.php');}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/styles.css">

    <style>
        .inputs2 select{border: none;
            padding: 12px;
            width: 80%;
            margin: 12px 5%;
            border-bottom: 2px solid;
            border-radius: 12px;
        }
    </style>
    <title>Book session</title>
</head>
<body>
    <div class="w3-bar w3-black w3-top nav w3-card-4">
        <a href="#" class="w3-bar-item"><img src="images/Femi logo.png" alt="femi logo"></a>
        <a href="index.php" class="w3-bar-item w3-button w3-hover-text-blue">home</a>
        <a href="sessionBooking.php" class="w3-bar-item w3-button w3-hover-text-blue active w3-text-blue">book a session</a>
        <a href="contacts.php" class="w3-bar-item w3-button w3-hover-text-blue">contact us</a>
    </div>

    <header class="w3-dark-grey w3-display-container banner">
        <img src="images/hero (3).jpg" alt="banner image" style="width:100%;" class="w3-animate-opacity">
        <div class="w3-display-middle overlay">
            .
        </div>
        <div class="w3-display-middle">
            <span class="huge fancy">book a session</span>
        </div>
    </header>

    <div class="w3-container">
        <div class="w3-center w3-padding-64">
            <h1>Session booking</h1>
            <p><?php echo $subtext;?></p>
            <?php
                // in case there was an error processing the request
                if(isset($_GET['errtext'])){
                    $theerror = $_GET['errtext'];
                    echo "<span class=\"w3-tag w3-red\">$theerror</span>"; 
                }
            ?>
        </div>


        <form class="inputs2 w3-card-4 w3-center" action="savesessions.php" method="post">

            <!-- session table parameters (sessionid, userid, user_contact, session_date, session_state, session_price) -->
            <div>

                <span>desired date</span><br>
                <input required type="date" name="thedate" id="npt_thedate" placeholder="enter the desired date here">
            </div>
            <div>

                <input type="hidden" name="thestate" value="pending">
                <input type="hidden" name="theprice" value="500">
                <input type="hidden" name="theuserid" value="<?php $desiredUsername = $_COOKIE['username'];include('userdata.php'); echo $storedUserId;?>">
            </div>

            <div>

                <span>Phone number</span><br>
                <input required type="number" name="thecontact" id="npt_tel_number" placeholder="how to reach you">
            </div>

            <div>

                <span>desired service</span><br>
                <!-- <input required type="date" name="thedate" id="npt_thedate" placeholder="enter the desired date here" onupdate="verifydate()"> -->
                <select name="theservice" id="npt_service">
                    <option value="blowdry" selected>blowdry</option>
                    <option value="braiding">braiding</option>
                    <option value="manicure">manicure</option>
                    <option value="pedicure">pedicure</option>
                    <option value="facial">facial</option>
                </select>
            </div>

            <input type="submit" value="book session" class="w3-button w3-black w3-hover-blue w3-round">
        </form>
    </div>

    <footer class="w3-padding-16 w3-black">
        <div class="w3-container">
            Femi.com
        </div>
    </footer>
</body>

<script>

    // Get the form element
    const form = document.querySelector(".inputs2");

    // Get the date input element
    const dateInput = document.getElementById("npt_thedate");

    // Add event listener for form submission
    form.addEventListener("submit", function(event) {
        // Get the entered date value
        const enteredDate = new Date(dateInput.value);

        // Get the current system date
        const currentDate = new Date();

        // Compare the entered date with the current date
        if (enteredDate < currentDate) {
            // Prevent form submission if the entered date is not after the current date
            event.preventDefault();
            alert("Please select a date after yesterday.");
        }
    });

</script>
</html>