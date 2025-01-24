<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Book session</title>
</head>
<body>
    <div class="w3-bar w3-black w3-top nav w3-card-4">
        <a href="#" class="w3-bar-item"><img src="images/Femi logo.png" alt="femi logo"></a>
        <a href="index.php" class="w3-bar-item w3-button w3-hover-text-blue">home</a>
        <a href="sessionBooking.php" class="w3-bar-item w3-button w3-hover-text-blue">book a session</a>
        <a href="contacts.php" class="w3-bar-item w3-button w3-hover-text-blue active w3-text-blue">contact us</a>
    </div>

    <header class="w3-dark-grey w3-display-container banner">
        <img src="images/hero (3).jpg" alt="banner image" style="width:100%;" class="w3-animate-opacity">
        <div class="w3-display-middle overlay">
            .
        </div>
        <div class="w3-display-middle">
            <span class="huge fancy">send feedback</span>
        </div>
    </header>

    <div class="w3-container">
        <div class="w3-center w3-padding-64">
            <h1>feedback hub</h1>
            <p>Here you can express your thoughts towards our services and/or operations.</p>
        </div>

        <form class="inputs2 w3-card-4 w3-center" action="feedbackhandler.php" method="post">
            <div>
                <span>Phone number</span><br>
                <input required type="number" name="telephone" id="npt_tel_number" placeholder="enter phone number here">
            </div>

            <?php
                $res = "";
                $req = "";
                $note = "";
                if(isset($_GET['req'])){
                    $req = $_GET['req'];
                } else {
                    $req = "feedback";
                }

                if(isset($_GET['word'])){
                    $what = $_GET['word'];
                    $note = "RE: $what (enter your username here)";
                }

                $res = '<input type="hidden" name="requesttype" id="npt_tel_number" placeholder="enter phone number here" value="'.$req.'">';
                echo $res;
            ?>

            <div>
                <span>feedback</span><br>
                <textarea name="themessage" id="npt_themessage" cols="30" rows="10" placeholder="enter your message here"><?php echo $note;?></textarea>
            </div>

            <input type="reset" value="clear form" class="w3-button w3-black w3-hover-blue w3-round">
            <input type="submit" value="send feedback" class="w3-button w3-black w3-hover-blue w3-round">
        </form>
    </div>

    <footer class="w3-padding-16 w3-black">
        <div class="w3-container">
            Femi.com
        </div>
    </footer>
</body>
</html>