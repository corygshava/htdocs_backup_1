<?php
	include 'actions/checksession.php';
?>

<?php
	include 'actions/connect.php';

	// Query to select all records from the deposits table
	$query = "SELECT * FROM deposits";
	$result = $conn->query($query);

	$res = '';
	// Check if there are records and start the table
	if ($result && $result->num_rows > 0) {
	    $res .= '
	            <tr>
	                <th>Transaction Code</th>
	                <th>Deposit Amount</th>
	                <th>Date Done</th>
	            </tr>';

	    // Output data of each row
	    while ($row = $result->fetch_assoc()) {
	        $res .= '<tr>
	                <td>' . $row['Transaction_code'] . '</td>
	                <td>' . htmlspecialchars(number_format($row['Depo_amt'],2,'.',',')) . '</td>
	                <td>' . htmlspecialchars($row['date_done']) . '</td>
	            </tr>';
	    }

	} else {
	    $res .= '<tr>
            <td colspan="3" style="text-align:center;">none found</td>
          </tr>';
	}

    // Add the final row
    $res .= '<tr>
            <td colspan="3" style="text-align:center;">-- thats all --</td>
          </tr>';
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
	<title>Deposits</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>

	<div class="contents">
		<div class="tableholder">
			<div class="title">
				<h2>Deposits</h2>
			</div>
			<table class="w3-table matable">
				<?php echo $res;?>
			</table>

			<div class="container">
				<a href="deposit_funds.php" class="themebtn">add new</a>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script src="js/superscript.js"></script>
</body>
</html>