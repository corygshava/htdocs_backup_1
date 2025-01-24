<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/eventer.css">
    <link rel="stylesheet" href="../css/forms.css">

    <title>New vendor</title>
</head>
<body>
    <div class="content">
        <div class="formholder">
            <div class="heading w3-center">
                <h2>Add new vendor</h2>
                <p>Enter details to register a new vendor</p>
                <hr>
            </div>
            <form class="theform" action="worker_addvendor.php" method="post">
                <div class="w3-row">
                    <div class="w3-col m6">
                        <input type="hidden" name="eventid" value="<?php echo $curevent;?>">
                        <div>
                            <label for="vname">name</label><br>
                            <input type="text" name="vname" placeholder="enter vendor name" required>
                        </div>
                        <div>
                            <label for="role">role</label><br>
                            <input type="text" name="role" placeholder="What will the vendor do" required>
                        </div>
                    </div>
                    <div class="w3-col m6">
                        <div>
                            <label for="contact">contact</label><br>
                            <input type="text" name="contact" placeholder="enter email or phone number" required>
                        </div>
                        <div>
                            <label for="description">description</label><br>
                            <textarea name="description" rows="3" placeholder="enter a short description" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="buttons w3-center">
                    <button class="themebtn" type="submit">add vendor</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>