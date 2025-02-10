<?php
	include 'actions/checksession.php';
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

	<script src="js/SuperScript.js"></script>
	<script src="js/toappend.js"></script>
	<script src="js/app.js"></script>

	<style>
		table {
			margin: 20px auto;
			text-align: left;
			width: 80%;
			overflow: hidden;
			border-radius: var(--roundness);
		}
		thead {
			background-color: var(--themecolor);
			color: white;
		}
		table th{
			padding: 16px  12px!important;
		}
		table .ender td{
			padding: 17px;
			opacity: 0.7;
			text-align: center;
		}
		table tr.ender:hover{
			background-color: #fff !important;
		}
		.tableguy{
			padding: 40px 50px;
			display: flex;
			flex-direction: column;
		}
	</style>
</head>
<body>

	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="tableguy">
			<h2 class="w3-text-theme">Data Table</h2>
			<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>John Doe</td>
						<td>john@example.com</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Jane Smith</td>
						<td>jane@example.com</td>
					</tr>
					<tr class="ender">
						<td colspan="3">
							<button class="btn w3-hover-blue"><i class="fa fa-plus"></i> add new</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	
	<?php
		include 'elements/footer.php';
	?>
</body>
</html>