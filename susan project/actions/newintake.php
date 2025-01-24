<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../intakes.php';

    // Check if POST variables are set
    if (isset($_POST['f_id']) && isset($_POST['in_amt'])) {
        $f_id = mysqli_real_escape_string($conn, $_POST['f_id']);
        $in_amt = mysqli_real_escape_string($conn, $_POST['in_amt']);

        // echo "[$f_id] and [$in_amt]";

        // Check if the farmer exists
        $farmer_query = "SELECT intakes, tea_brought FROM farmers WHERE id = '$f_id'";
        $result_farmer = $conn->query($farmer_query);

        if($result_farmer){
            if ($result_farmer->num_rows > 0) {
                // Get price per kilo
                $price_query = "SELECT itemvalue FROM sysdata WHERE itemname = 'price_per_kilo'";
                $result_price = $conn->query($price_query);
                $theprice = ($result_price && $result_price->num_rows > 0) ? $result_price->fetch_assoc()['itemvalue'] : 0;

                // Get total deposits, sales, and paid amounts
                $deposits_query = "SELECT SUM(depo_amt) AS total FROM deposits";
                $result_deposits = $conn->query($deposits_query);
                $deposits = ($result_deposits && $result_deposits->num_rows > 0) ? $result_deposits->fetch_assoc()['total'] : 0;

                $sales_query = "SELECT SUM(amt_recieved) AS total FROM sales";
                $result_sales = $conn->query($sales_query);
                $tsales = ($result_sales && $result_sales->num_rows > 0) ? $result_sales->fetch_assoc()['total'] : 0;

                $intakes_query = "SELECT SUM(amt_paid) AS total FROM intakes";
                $result_intakes = $conn->query($intakes_query);
                $tpaid = ($result_intakes && $result_intakes->num_rows > 0) ? $result_intakes->fetch_assoc()['total'] : 0;

                // Calculate available balance
                $available_balance = ($deposits + $tsales) - $tpaid;

                // Check if balance is enough
                if ($available_balance >= ($in_amt * $theprice)) {
                    $farmer_data = $result_farmer->fetch_assoc();
                    $fintakes = $farmer_data['intakes'] + 1;
                    $seedsamt = $farmer_data['tea_brought'] + $in_amt;

                    // Update farmers table
                    $update_farmers = "UPDATE farmers SET intakes = '$fintakes', tea_brought = '$seedsamt' WHERE id = '$f_id'";
                    $conn->query($update_farmers);

                    // Add new record to intakes table
                    $in_serial = strtoupper(substr(md5(mt_rand()), 0, 7)); // Generate random 7 letter string
                    $amt_paid = $in_amt * $theprice;
                    $date_added = date('Y-m-d H:i:s');

                    $add_intake = "INSERT INTO intakes (in_serial, farmer_id, amt_brought, amt_paid, date_added) VALUES ('$in_serial', '$f_id', '$in_amt', '$amt_paid', '$date_added')";
                    $conn->query($add_intake);

                    // Update inventory
                    $update_inventory = "UPDATE inventory SET itemamt = itemamt + '$in_amt' WHERE itemname = 'tea leaves'";
                    $conn->query($update_inventory);

                    // Success message
                    $restxt = "Intake added successfully.";
                    $opres = 'true';
                } else {
                    $restxt = "Not enough cash available.";
                }
            } else {
                $restxt = "Farmer records do not exist in the database.";
            }
        } else {
            $restxt = "an error occured {$conn->error}";
        }
    }

    $toredirect = isset($opres) ? '../intakes.php' : '../intake.php';

    include '../elements/loader.php';
?>