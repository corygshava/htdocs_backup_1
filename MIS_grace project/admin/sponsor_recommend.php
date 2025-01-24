<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/login.css">
    
    <title>CFS : Make Deposit</title>
</head>
<body>
    
    <?php
        include '../components/sponsor_navbar.php';

        include '../actions/connect.php';

        $sql = "SELECT userid FROM users WHERE username = '$curuser'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            echo "<script>alert('User not found');</script>";
        }

        $row = $result->fetch_assoc();
        $theid = $row['userid'];
    ?>

    <div class="content">
        <div class="dataform">
            <div class="w3-center">
                <h2>recommend beneficiary</h2>
                <hr>
                <p class="w3-center">Enter the details below</p>
            </div>
            <form action="../actions/processrecommend.php" method="post">
                <div class="w3-row">
                    <div class="w3-col m4 nptpanel">
                        <input type="hidden" name="theuserid" value="<?php echo $theid;?>">
                        <input type="text" name="thename" placeholder="Enter beneficiary's name" required>
                        <input type="number" name="theage" placeholder="enter beneficiary's age" required>
                        <input type="number" name="BCnumber" placeholder="enter Birth certificate number" required>
                    </div>
                    <div class="w3-col m4 nptpanel">
                        <input type="text" name="medicalstatus" placeholder="describe his/her medical status" required>
                        <input type="number" name="theamt" placeholder="enter amount required here" required>
                        <input type="text" name="theresidence" placeholder="Enter area of residence" required>
                    </div>
                    <div class="w3-col m4 nptpanel">
                        <select name="thegender">
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                        <textarea name="description" cols="30" rows="5" placeholder="enter a short description of the beneficiary"></textarea>
                        <button type="submit">recommend beneficiary <i class="fa fa-send"></i></button>
                    </div>
                </div>
                <a href="index.php" class="w3-btn themebg w3-text-white">back</a>
            </form>
        </div>
    </div>
</body>
</html>
