<?php
	include 'actions/checksession.php';
?>

<?php 
    include 'actions/connect.php';

    // Query to fetch all records from the sales table
    $query_sales = "SELECT * FROM sales";
    $result_sales = mysqli_query($conn, $query_sales);

    $res = "";

    $res .= "
            <tr>
                <th>Transaction Code</th>
                <th>Amount Sold</th>
                <th>Amount Received</th>
                <th>Date Done</th>
            </tr>";

    if ($result_sales) {
    	if($result_sales->num_rows > 0){
	        // Fetch and display each row of the sales table
	        while ($row = mysqli_fetch_assoc($result_sales)) {
	            $res .= "<tr>
	                    <td>" . $row['Transaction_code'] . "</td>
	                    <td>" . $row['Amt_sold'] . " KG</td>
	                    <td>" . number_format($row['Amt_recieved'],2,'.',',') . "</td>
	                    <td>" . $row['Date_done'] . "</td>
	                  </tr>";
	        }
	    } else {
        	$res .= "<tr><td colspan='8' style='text-align:center;'>no records found</td></tr>";
	    }
    } else {
        $res .= "<tr><td colspan='8' style='text-align:center;'>error retreiving sales records</td></tr>";
    }

    // Add the final row with '-- thats all --'
    $res .= "<tr><td colspan='8' style='text-align:center;'>-- thats all --</td></tr>";
?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="shortcut icon" href="favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/font-Awesome.min.css">
	<title>tea Sales</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>

	<div class="contents">
		<div class="tableholder">
			<div class="title">
				<h2 class="w3-center">tea sales</h2>
			</div>
			<table class="w3-table matable">
				<?php echo $res;?>
			</table>

			<div class="container">
				<a href="sell_coffee.html" class="themebtn">add new</a>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script src="js/superscript.js"></script>
</body>
</html>