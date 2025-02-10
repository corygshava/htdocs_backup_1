<?php
	include 'actions/connect.php';
	include 'functions.php';

	// Fetch data from SystemData table
	$result = $conn->query("SELECT * FROM SystemData");
	$outxt1 = "";
	$outxt2 = "";
	$outxt3 = "";

	if($result->num_rows == 0){
		$output = $defaultOut;

		$outxt1 .= $output;
		$outxt2 .= $output;
		$outxt3 .= $output;
	} else {
		while ($row = $result->fetch_assoc()) {
			$catname = processcat($row['itemname']);
			$prefix = getcat($row['itemname']);
			$class = gettyp($row['itemname']);
			$Id = $row['Id'];
			$date_changed = $row['date_changed'];
			$date_added = $row['date_added'];
			$itemvalue = $row['itemvalue'];
			$cleanval = number_format($itemvalue);
			$itemdata = $row['itemdata'];

			$output = "<tr>
				<td>$Id</td>
				<td>$date_changed</td>
				<td>$date_added</td>
				<td>{$catname}</td>
				<td>$cleanval</td>
				<td>
					<button class=\"w3-grey themehover btn editbtn\" data-myid=\"$Id\" data-myval=\"$catname\" data-myamt=\"$itemvalue\" data-myprefix=\"$prefix\" data-myclass=\"$class\"><i class=\"fa fa-pencil\"></i> edit</button>
					<button class=\"w3-grey themehover btn deleter\" data-myid=\"$Id\" data-myprefix=\"$prefix\" data-myclass=\"$class\"><i class=\"fa fa-trash\"></i> delete</button>
				</td>
			</tr>";

			if (strpos($row['itemname'], 'fac_') === 0) {
				$outxt1 .= $output;
			} elseif (strpos($row['itemname'], 'utype_') === 0) {
				$outxt2 .= $output;
			} else {
				$outxt3 .= $output;
			}
		}
		$extra1 = "<tr class=\"ender\">
						<td colspan=\"6\">
							<a href=\"#\" class=\"btn w3-hover-blue addguy\" data-myclass=\"facility\" data-myprefix=\"fac_\"><i class=\"fa fa-plus\"></i> add new facility</a>
						</td>
					</tr>";
		$extra2 = "<tr class=\"ender\">
						<td colspan=\"6\">
							<a href=\"#\" class=\"btn w3-hover-blue addguy\" data-myclass=\"user type\" data-myprefix=\"utype_\"><i class=\"fa fa-plus\"></i> add new user type</a>
						</td>
					</tr>";
		$extra3 = "<tr class=\"ender\">
						<td colspan=\"6\">
							<a href=\"#\" class=\"btn w3-hover-blue addguy\" data-myclass=\"tour type\" data-myprefix=\"tour_\"><i class=\"fa fa-plus\"></i> add new tour type</a>
						</td>
					</tr>";

		$outxt1 .= $extra1;
		$outxt2 .= $extra2;
		$outxt3 .= $extra3;
	}
?>
