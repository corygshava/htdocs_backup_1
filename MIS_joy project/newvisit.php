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

    <title>New visit</title>
</head>
<body>
    <?php
        include 'components/navbar.php';

        $patientid = '';
        $patientname = '';

        if(isset($_GET['thepatient'])){
            include 'actions/connect.php';

            $patientid = $_GET['thepatient'];
            $thequery = "SELECT patientname FROM patients WHERE idnumber = '$patientid'";
            $theresult = mysqli_query($conn,$thequery);

            if($theresult){
                $myrow = mysqli_fetch_assoc($theresult);
                $patientname = $myrow['patientname'];
            } else {
                echo "it didnt work";
            }

            $inputtype = "hidden";
    ?>

    <div class="halfguy">
        <div class="container">
            <h1>Add new Visit</h1>
            <form action="actions/addvisit.php" method="post">
                <input type="hidden" name="thevisitserial" value="nnn">
                <input type="text" name="thename" placeholder="enter your name here" value="<?php echo $patientname;?>" required>
                <input type="hidden" name="thepatientidnumber" placeholder="enter your ID number here" value="<?php echo $patientid;?>" required>
                <select name="thefacilityused">
                    <?php include 'components/facilities.php';?>
                </select>

                <button type="submit">Submit</button>
            </form>
            <div class="w3-center">
                <a href="index.php" class="w3-text-blue">go back</a>
            </div>
        </div>
    </div>

    <script>
        var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        function generateRandomWord(n) {
            let res = "";
            for (let x = 0; x < n; x++) {
                let index = Math.floor(Math.random() * (letters.length - 1));
                res += letters[index]
            }

            return res;
        }

        document.forms[0].thevisitserial.value = generateRandomWord(16);
    </script>

<?php
    } else {
        ?>
        <script>alert("invalid request format");</script>
        <?php
        $thepage = 'listpatients.php';
        include 'actions/smartredirect.php';
    }
?>

    <?php
        include 'components/footer.php';
    ?>
</body>
</html>