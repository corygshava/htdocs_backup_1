<?php
    include '../actions/connect.php';

    if (!isset($_COOKIE['curuser'])) {
        echo "<script>alert('No active user found. Please log in.');</script>";
        exit;
    }

    $curuser = $_COOKIE['curuser'];

    // Retrieve userid from users table
    $sql = "SELECT userid FROM users WHERE username = '$curuser'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<script>alert('User not found');</script>";
        exit;
    }

    $row = $result->fetch_assoc();
    $theid = $row['userid'];

    // Function to execute a query and return the count
    function getCount($conn, $sql) {
        $res = $conn->query($sql);

        if ($conn->error) {
            $err = $conn->error;
            echo "$err<br>";
        }

        $row = $res->fetch_assoc();
        $count = $row['count'];
        return $count;
    }

    // Function to execute a query and return the sum
    function getSum($conn, $sql) {
        $res = $conn->query($sql);

        if ($conn->error) {
            $err = $conn->error;
            echo "$err<br>";
        }

        $row = $res->fetch_assoc();
        $sum = $row['total'];
        return $sum;
    }

    // Get counts and sums
    $totalDeposits = getCount($conn, "SELECT COUNT(*) as count FROM deposits");
    $pendingDeposits = getCount($conn, "SELECT COUNT(*) as count FROM deposits WHERE status = 'pending'");
    $verifiedDeposits = getCount($conn, "SELECT COUNT(*) as count FROM deposits WHERE status = 'verified'");
    $errorDeposits = getCount($conn, "SELECT COUNT(*) as count FROM deposits WHERE status = 'error'");
    $totalTransactions = getCount($conn, "SELECT COUNT(*) as count FROM transactions");
    $totalRecommendations = getCount($conn, "SELECT COUNT(*) as count FROM recommendations");
    $approvedRecommendations = getCount($conn, "SELECT COUNT(*) as count FROM recommendations WHERE status = 'approved'");
    $totalUsers = getCount($conn, "SELECT COUNT(*) as count FROM users WHERE usertype = 'sponsor'");
    $rejectedRecommendations = getCount($conn, "SELECT COUNT(*) as count FROM recommendations WHERE status = 'rejected'");
    $totalBeneficiaries = getCount($conn, "SELECT COUNT(*) as count FROM beneficiaries");
    $verifiedDepositsSum = getSum($conn, "SELECT SUM(depoamount) as total FROM deposits WHERE status = 'verified'");
    $transactionsSum = getSum($conn, "SELECT SUM(transamount) as total FROM transactions");

    // Store results in variables
    $totalDeposits;
    $pendingDeposits;
    $verifiedDeposits;
    $errorDeposits;
    $totalRecommendations;
    $approvedRecommendations;
    $rejectedRecommendations;
    $totalBeneficiaries;
    $verifiedDepositsSum = ($verifiedDepositsSum == '') ? 0 : $verifiedDepositsSum;
    $transactionsSum = ($transactionsSum == '') ? 0 : $transactionsSum;
    $totalcash = $verifiedDepositsSum - $transactionsSum;

    echo "
    <div class=\"w3-hide\">
        totalDeposits : $totalDeposits<br>
        pendingDeposits : $pendingDeposits<br>
        verifiedDeposits : $verifiedDeposits<br>
        errorDeposits : $errorDeposits<br>
        totalRecommendations : $totalRecommendations<br>
        approvedRecommendations : $approvedRecommendations<br>
        rejectedRecommendations : $rejectedRecommendations<br>
        verifiedDepositsSum : $verifiedDepositsSum<br>
    </div>
    ";
?>

<div class="themebg summary">
    <h3>System summary</h3>
    <div>
        <span id="thecash"><?php echo number_format($totalcash,0,"",",");?></span><br>
        <span>total available funds</span>
    </div>

    <hr>

    <div class="w3-row">
        <div class="w3-col m6">
            <div>
                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">Deposits</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $totalDeposits;?></b></div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">Pending Deposits</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $pendingDeposits;?></b></div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">Approved Deposits</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $verifiedDeposits;?></b></div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">Erronious Deposits</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $errorDeposits;?></b></div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">Transactions</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $totalTransactions;?></b></div>
                </div>
            </div>
        </div>
        <div class="w3-col m6">
            <div>
                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">Sponsors</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $totalUsers;?></b></div>
                </div>
                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">Beneficiaries</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $totalBeneficiaries;?></b></div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">recommendations</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $totalRecommendations;?></b></div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">approved recommendations</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $approvedRecommendations;?></b></div>
                </div>

                <div class="w3-row">
                    <div class="w3-col s6 w3-right-align report">rejected recommendations</div>
                    <div class="w3-col s6 w3-left-align report"><b><?php echo $rejectedRecommendations;?></b></div>
                </div>
            </div>
        </div>
    </div>
</div>