<?php
	include 'actions/checksession.php';
?>

<?php 
    include 'actions/connect.php';

    // Query to fetch all records from in_processing table
    $query = "SELECT * FROM inprocessing";
    $result = mysqli_query($conn, $query);

    $res = "";

    if ($result) {
		$res .= "
		        <tr>
		            <th>Date Added</th>
		            <th>Amount</th>
		            <th>Status</th>
		            <th>date cleared</th>
		            <th>actions</th>
		        </tr>";
    	if($result->num_rows > 0){
	        // Start of the HTML table

	        // Fetch and display each record
	        while ($row = mysqli_fetch_assoc($result)) {
	        	$clearedDate = $row['Date_cleared'] == '' ? '--' : $row['Date_cleared'];
	        	$sect = $row['Status'] == "pending" ? "<a href=\"actions/verifyprocessing.php?p_id={$row['Id']}&newstate=complete\" class=\"optbtn\"><i class=\"fa fa-check\"></i> complete</a>
							<a href=\"actions/verifyprocessing.php?p_id={$row['Id']}&newstate=lost\" class=\"optbtn\"><i class=\"fa fa-close\"></i> lost</a>" : "--";
	            $res .= "<tr>
	                    <td>{$row['Date_added']}</td>
	                    <td>{$row['Amount']} KG</td>
	                    <td>{$row['Status']}</td>
	                    <td>$clearedDate</td>
	                    <td>
	                    	$sect
	                    </td>
	                  </tr>";
	        }
	    } else {
	    	$res .= "<tr>
                <td colspan='13' style='text-align: center;'>no records found</td>
              </tr>";
	    }
        // Add the final row
        $res .= "<tr>
                <td colspan='13' style='text-align: center;'>-- that's all --</td>
              </tr>";
    } else {
        echo "Error fetching data: " . mysqli_error($conn);
    }
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
	<title>Processing queue</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>

	<div class="contents">
		<div class="tableholder">
			<div class="title">
				<h2>Processing queue</h2>
			</div>
			<table class="w3-table matable">
				<?php echo $res;?>
			</table>

			<div class="container">
				<a href="send_to_processing.php" class="themebtn">add new</a>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script src="js/superscript.js"></script>
</body>
</html>