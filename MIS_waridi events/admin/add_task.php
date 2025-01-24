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

    <title>New task</title>
</head>
<body>
    <div class="content">

        <?php
            if (isset($_GET['vname'])) {
                $thevendor = $_GET['vname'];
            } else {
                $thevendor = "--";
            }

            include '../actions/connect.php';
        ?>

        <div class="formholder">
            <div class="heading w3-center">
                <h2>Add new task</h2>
                <p>Enter details to register a new task</p>

                <?php
                    $getdate = "SELECT eventdate FROM events WHERE eventid = '$curevent'";
                    $result = $conn->query($getdate);
                    $row = $result->fetch_assoc();
                    $partydate = $row['eventdate'];
                ?>


                <hr>
            </div>
            <form class="theform" action="worker_addtask.php" method="post">
                <div class="w3-panel w3-center">
                    keep in mind the event is on <b><?php echo $partydate;?></b>
                </div>
                <div class="w3-row">
                    <div class="w3-col m6">
                        <div>
                            <label for="vname">assigned vendor</label><br>
                            <select name="vname">
                                <option>--choose a vendor--</option>
                                <?php
                                    $getvendors = "SELECT vname FROM vendors WHERE eventid = '$curevent'";
                                    $result = $conn->query($getvendors);
                                    $outxt = "";

                                    while ($row = $result->fetch_assoc()) {
                                        $outxt .= "<option value=\"{$row['vname']}\">{$row['vname']}</option>";
                                    }

                                    echo "$outxt";
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="duedate">due date</label><br>
                            <input type="date" name="duedate" placeholder="due date" required>
                        </div>
                    </div>
                    <div class="w3-col m6">
                        <div>
                            <label for="description">description</label><br>
                            <textarea name="description" rows="5" placeholder="enter a short description" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="buttons w3-center">
                    <button class="themebtn" type="submit">add task</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        // document.forms[0].vname.value = '<?php echo "$thevendor";?>';
        // alert(`${document.forms[0].vname.value} : <?php echo "$thevendor";?>`);
    </script>
</body>
</html>