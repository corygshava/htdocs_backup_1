<?php
	include 'actions/checksession.php';
?>

<?php
	include 'actions/connect.php';

    // Query to select all records from the intakes table
    $query = "SELECT * FROM intakes";
    $result = $conn->query($query);

    $res = '';

	$res.='
	        <tr>
	            <th>Intake Serial</th>
	            <th>Farmer ID</th>
	            <th>Farmer name</th>
	            <th>Amount Brought</th>
	            <th>Amount Paid</th>
	            <th>Date Added</th>
	        </tr>';

    // Check if there are records and start the table
	if($result){
	    if ($result->num_rows > 0) {

	        // Output data of each row
	        while ($row = $result->fetch_assoc()) {
	        	// number_format(number,decimal places,decimals dot,thousands separator)
	        	$nq = "SELECT Name FROM farmers WHERE id = '{$row['Farmer_id']}'";
	        	$reslt = $conn->query($nq);
	        	$fname = $reslt->fetch_assoc()['Name'];
	            $res.='<tr>
	                    <td>' . htmlspecialchars($row['in_serial']) . '</td>
	                    <td>' . htmlspecialchars($row['Farmer_id']) . '</td>
	                    <td>'.$fname.'</td>
	                    <td>' . htmlspecialchars(number_format($row['Amt_brought'],0,'.',',')) . ' KG</td>
	                    <td>' . htmlspecialchars(number_format($row['Amt_paid'],2,'.',',')) . '</td>
	                    <td>' . htmlspecialchars($row['Date_added']) . '</td>
	                </tr>';
	        }

	    } else {
	        $res.='<tr>
		        <td colspan="10" style="text-align:center;">no records found</td>
		      </tr>';
	    }
	} else {
		$res.='<tr>
			<td colspan="10" style="text-align:center;">error: '.$conn->error.'</td>
			</tr>';
	}

	// Add the final row
	$res.='<tr>
	        <td colspan="10" style="text-align:center;">-- thats all --</td>
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
	<title>Intakes</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>

	<div class="contents">
		<div class="tableholder">
			<div class="title">
				<h2>Intakes</h2>
			</div>
			<table class="w3-table matable">
				<?php echo $res?>
			</table>

			<div class="container">
				<a href="intake.php" class="themebtn">add new</a>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script src="js/superscript.js"></script>
</body>
</html>