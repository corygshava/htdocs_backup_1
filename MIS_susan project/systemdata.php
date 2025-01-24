<?php
	include 'actions/checksession.php';
?>

<?php
include 'actions/connect.php';

// SQL query to fetch all records from the sysdata table
$sql = "SELECT * FROM sysdata";
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $res .='
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Value</th>
                <th>actions</th>
            </tr>';
    
    // Output data of each row
    $myround = -1;

    while ($row = $result->fetch_assoc()) {
        $myround += 1;
        $res .= '<tr>
                <td>' . htmlspecialchars($row['id']) . '</td>
                <td>' . htmlspecialchars($row['itemname']) . '</td>
                <td>' . htmlspecialchars($row['itemvalue']) . '</td>
                <td>
                    <button class="themebtn" onclick="editrec('.$myround.')"><i class="fa fa-pencil"></i> edit</button>
                </td>
              </tr>';
    }
} else {
    $res .= '<tr>
            <td colspan="8" style="text-align:center;">no records found</td>
          </tr>';
}

$res .= '<tr>
    <td colspan="8" style="text-align:center;">-- thats all --</td>
  </tr>';

// Close the database connection
$conn->close();
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
				<h2>System data</h2>
			</div>
			<table class="w3-table matable">
				<?php echo "$res";?>
			</table>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<div class="w3-modal themodal" data-shown="0" style="padding: 0;">
		<div class="modalform">
			<div class="theform w3-animate-zoom">
				<form action="actions/editsysdata.php" method="post" id="maform">
					<div>
						<button class="w3-right w3-btn" type="reset" onclick="toggleShow('.themodal')"><i class="fa fa-close"></i></button>
					</div>
					<h3>edit <b id="changing">price_per_kilo</b></h3>
					<div class="flexresponsive row">
						<div class="mobi">
							<div class="npt">
								<label for="newval">new value</label>
								<input type="number" name="newval" placeholder="enter your Username here">
								<input type="hidden" name="tochange" value="nada">
							</div>
						</div>
					</div>
					<div class="w3-center">
						<button class="themebtn">update <i class="fa fa-send"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="js/superscript.js"></script>

	<script>
		// edits the value of theid in the modal form
		function editrec(n) {
			// open modal
			toggleShow('.themodal');
			// find the row to use
			let tbl = document.querySelector('table');
			let trow = tbl.querySelectorAll('tr')[n + 1];
			let tcells = trow.querySelectorAll('td');

			// find the data from the row
			let toedit = tcells[1].innerHTML;
			let curval = tcells[2].innerHTML;

			// update the items in the modal
			let daform = document.querySelector('.themodal').querySelector('#maform');
			let title = daform.querySelector('#changing');
			let valnpt = daform.newval;
			let whatnpt = daform.tochange;

			valnpt.value = curval;
			whatnpt.value = toedit;
			title.innerHTML = toedit;
		}
	</script>
</body>
</html>