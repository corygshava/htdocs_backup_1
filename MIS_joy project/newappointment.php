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

    <title>Add new Appointment</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
    ?>

    <div class="halfguy">

    <?php
        if(isset($_GET['patientid'])){
            $theid = $_GET['patientid'];
    ?>

        <div class="container">
            <h1>Add new Appointment</h1>
            <form action="actions/addappointment.php" method="post">
                <input type="hidden" name="theserial" value="nnn">
                <label>Enter the appointment date here</label>
                <input type="date" name="thedate" placeholder="enter your Phone contact here" required>
                <label>Enter the appointment time here</label>
                <input type="time" name="thetime" placeholder="enter your Phone contact here" required>
                <select name="thefacility">
                    <?php include 'components/facilities.php';?>
                </select>
                <input type="hidden" name="theidnumber" placeholder="enter the patient's ID number here" value="<?php echo $theid;?>" required>

                <button type="submit">Submit</button>
            </form>
            <div class="w3-center">
                <a href="index.php" class="w3-text-blue">go back</a>
            </div>
        </div>

    <script>
        var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        function generateRandomWord(n) {
            let res = "";
            for (let x = 0; x < n; x++) {
                let index = Math.floor(Math.random() * (letters.length - 1));
                res += letters[index]
            }

            return res;
        }

        document.forms[0].theserial.value = generateRandomWord(16);
    </script>

    <?php
    } else {
        echo "<div class=\"w3-center\">invalid request format (patient id is required)</div>";
    }
    ?>
    </div>

    <?php
        include 'components/footer.php';
    ?>
</body>
</html>