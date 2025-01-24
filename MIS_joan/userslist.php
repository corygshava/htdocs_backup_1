<?php
	include 'actions/checksession.php';
?>

<?php 
    include 'actions/connect.php';

    // Query to fetch all records from the sales table
    $query_sales = "SELECT * FROM users";
    $result_sales = mysqli_query($conn, $query_sales);

    $res = "";

    $res .= "
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>password</th>
                <th>Date added</th>
            </tr>";

    if ($result_sales) {

        // Fetch and display each row of the sales table
        while ($row = mysqli_fetch_assoc($result_sales)) {
            $res .= "<tr>
			<td>{$row['Id']}</td>
			<td>{$row['Username']}</td>
			<td><b onclick=\"alert('{$row['Password']}')\" class=\"optbtn\">show password</b></td>
			<td>{$row['Date_added']}</td>
			</tr>";
        }
    } else {
        $res .= "<tr><td colspan='8' style='text-align:center;'>error retreiving users' records</td></tr>";
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
	<title>system users</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>
	<div class="contenter">
		<div class="tableholder">
			<div class="title">
				<h2 class="w3-center">All users</h2>
			</div>
			<table class="w3-table matable">
				<?php echo $res;?>
			</table>

			<div class="container">
				<a href="newuser.html" class="themebtn">add new</a>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script src="js/superscript.js"></script>
</body>
</html>