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
    <title>All referals</title>

    <style>
        .display{position:relative;overflow:hidden;}
    </style>
</head>
<body>


    <!-- 
        so this code checks whether there is a get member called query
        if there isnt nothing happens otherwise a query is run to show all records whose referal number is the same as the query
    -->

    <?php
        $tosearch = "";
        $outxt = '
        <tr>
            <td class="w3-center w3-border" colspan="7">None found</td>
        </tr>';

        if(isset($_GET["query"])){
            $tosearch = $_GET["query"];
            $myop = "SELECT referalID,DoctorSerial,DoctorName,PatientName,service,description,state FROM referals WHERE referalID = '$tosearch' AND state = 'pending'";
            include("../actions/getdata.php");

            if(mysqli_num_rows($result) == 0){
                $outxt = '
                    <tr>
                        <td class="w3-center w3-border" colspan="7">'."no pending referal with the id of <b>$tosearch</b> found".'</td>
                    </tr>';
            } else {
                $outxt = "<tr class=\"w3-hover-grey\" onclick=\"servePatient(this)\">";
                while ($row = $result -> fetch_row()) {
                    for ($n=0; $n < 7; $n++) { 
                        if($n < 6){
                            $outxt = $outxt.'<td style="padding:10px !important;">'.$row[$n].'</td>'."\n";
                        } else {
                            $mycol = $row[$n] == "pending" ? "orange" : "green";
                            $outxt = $outxt.'<td style="padding:10px !important;">'."<button class=\"w3-tag w3-$mycol\" style=\"border:none;\">".$row[$n].'</button></td>'."\n";
                        }
                    }
                }
            }
        }
    ?>

    <nav class="w3-bar w3-white">
        <a href="javascript:history.back()" class="w3-bar-item pagetitle"><i class="icon icon-chevron-left"></i></a>
        <a href="#" class="w3-bar-item pagetitle">All referals</a>
    </nav>

    <div class="display" style="height:250px">
        <img src="" alt="" class="display-myimg random-image-ls">
        <div class="w3-animate-zoom w3-text-white">
            <!-- <span class="subtxt">My referals</span> -->
            <h3>search for a referal</h3>

            <form action="#" method="get" class="search-form">
                <i class="icon icon-search"></i>
                <input type="text" name="query" placeholder="enter your referal ID here" required>
                <button type="submit" class="w3-btn w3-grey w3-hover-blue w3-round">search</button>
            </form>
        </div>
    </div>

    <div class="w3-container">
        <div class="w3-center">
            <?php if($tosearch != ""){echo "<h3>Showing results for <b>$tosearch</b></h3>";}?>
        </div>
        <table class="w3-table w3-border mytable">
            <tr class="w3-border w3-black">
                <th>referalID</th>
                <th>DoctorSerial</th>
                <th>DoctorName</th>
                <th>PatientName</th>
                <th>service</th>
                <th>description</th>
                <th>state</th>
            </tr>

            <?php echo $outxt;?>

            <!-- <tr class="w3-hover-grey" onclick="servePatient(this)">
                <td>23123</td>
                <td>Danson Miari</td>
                <td>David G simons</td>
                <td>23111</td>
                <td>CT scan</td>
                <td>pending</td>
                <td>none included</td>
            </tr> -->
        </table>
        <p class="w3-center">click on a record to serve the patient</p>
    </div>

    <footer class="w3-light-grey">
        <p>Medlabs Laboratory Management Information System</p>
    </footer>
</body>

<script src="../js/utility.js">
</script>

<script>
    generateRandomImages("../");
    // document.body.style.backgroundImage = `url("../images/pexels-chokniti-khongchum-3082452.jpg")`

    function servePatient(element) {
        let items = element.children;
        let payload = "";
        payload += `referalID=${items[0].innerText}&`;
        payload += `DoctorSerial=${items[1].innerText}&`;
        payload += `DoctorName=${items[2].innerText}&`;
        payload += `PatientName=${items[3].innerText}&`;
        payload += `service=${items[4].innerText}&`;
        payload += `description=${items[5].innerText}&`;
        payload += `state=${items[6].innerText}`;

        location.assign(`servepatient.php?fromrefer=yes&${payload}`);
    }
</script>
</html>