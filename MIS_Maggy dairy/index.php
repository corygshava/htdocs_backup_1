<?php
	include 'actions/checksession.php';
	require 'actions/connect.php';
	require 'workers/summary.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/styles.css">

	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<header class="w3-text-whites text-center topitem">
		<span>Welcome, <b><?php echo $uname;?></b></span>
		<p class="w3-text-whites">Heres your <b><?php echo $utype;?></b> dashboard</p>
		<hr>
	</header>

	<?php
		if($utype == "admin"){
	?>
		<div class="container">
			<div class="row g-4">
				<div class="col-md-4">
					<div class="card shadow">
						<div class="card-header">Reports</div>
						<div class="card-body">
							<a href="view_farmers.php">view farmers</a>
							<a href="view_milkintakes.php">view milk records</a>
							<a href="view_milksales.php">view milk sales</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card shadow">
						<div class="card-header">Actions</div>
						<div class="card-body">
							<a href="new_farmer.php">new farmer</a>
							<a href="new_milkintake.php">new milk intake</a>
							<a href="new_milksale.php">new milk sale</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card shadow">
						<div class="card-header">Admin</div>
						<div class="card-body">
							<a href="new_user.php">new user</a>
							<a href="view_users.php">view users</a>
							<a href="view_sysdata.php">edit data</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container text-center">
			<a class="btn btn-primary themebg hoverfx2" href="logout.php">logout</a>
			<button class="btn btn-primary themebg hoverfx2" data-bs-toggle="modal" data-bs-target="#summaryModal">View summary</button>
		</div>
	<?php
		} else {
	?>
		<div class="container">
			<div class="row g-4">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<div class="card shadow">
						<div class="card-header">Your actions</div>
						<div class="card-body">
							<a href="new_milkintake.php?farmerid=<?= $curuserid?>">new milk intake</a>
							<a href="new_milksale.php?farmerid=<?= $curuserid?>">new milk sale</a>
							<hr>
							<a href="view_milkintakes.php?farmerid=<?= $curuserid?>">My milk intakes</a>
							<a href="view_milksales.php?farmerid=<?= $curuserid?>">My milk sales</a>
							<a href="view_farmers.php?farmerid=<?= $curuserid?>">My information</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>

		<div class="container text-center">
			<a class="btn btn-primary themebg hoverfx2" href="logout.php">logout</a>
		</div>
	<?php
		}
	?>

		<div style="margin: 20px 0;">--</div>
	<?php
		include 'elements/footer.php';
	?>

	<div class="modal fade" id="summaryModal" tabindex="-1" aria-hidden="true">
		<?php
			if($utype == "admin"){
		?>
		    <div class="modal-dialog modal-dialog-centered">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title">Admin summary</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		            </div>
		            <div class="modal-body">
						<div class="row g-4">
			                <div class="col-md-4">
								<div class="carder">
									<div class="card-body summ">
										<a><b class=""><?= $farmercount?></b> registered farmers</a>
										<a><b class=""><?= $intakescount?></b> milk intakes</a>
										<a><b class=""><?= $salescount?></b> milk sales</a>
										<a><b class=""><?= $usercount?></b> registered Users</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="carder">
									<div class="card-body summ">
										<a><b class=""><?= $veri_sales?></b> verified sales</a>
										<a><b class=""><?= $pending_sales?></b> pending sales</a>
										<a><b class=""><?= $rejected_sales?></b> rejected sales</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="carder">
									<div class="card-body summ">
										<a><b class=" gash"><?= $milk_brought." litres"?></b> milk brought in</a>
										<a><b class=" gash"><?= $milk_sold." litres"?></b> milk sold</a>
										<a><b class=" gash"><?= $allsales." Ksh"?></b> total sales</a>
									</div>
								</div>
							</div>
						</div>
		            </div>
		        </div>
		    </div>
		<?php
			} else {
		?>
			<div class="modal-dialog modal-dialog-centered">
		        <div class="modal-content">
		            <div class="modal-header">
		                <h5 class="modal-title">Admin summary</h5>
		                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		            </div>
		            <div class="modal-body">
						<div class="row g-4">
			                <div class="col-md-4">
								<div class="carder">
									<div class="card-body summ">
										<a><b class=""><?= $farmercount?></b> registered farmers</a>
										<a><b class=""><?= $intakescount?></b> milk intakes</a>
										<a><b class=""><?= $salescount?></b> milk sales</a>
										<a><b class=""><?= $usercount?></b> registered Users</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="carder">
									<div class="card-body summ">
										<a><b class=""><?= $veri_sales?></b> verified sales</a>
										<a><b class=""><?= $pending_sales?></b> pending sales</a>
										<a><b class=""><?= $rejected_sales?></b> rejected sales</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="carder">
									<div class="card-body summ">
										<a><b class=" gash"><?= $milk_brought." litres"?></b> milk brought in</a>
										<a><b class=" gash"><?= $milk_sold." litres"?></b> milk sold</a>
										<a><b class=" gash"><?= $allsales." Ksh"?></b> total sales</a>
									</div>
								</div>
							</div>
						</div>
		            </div>
		        </div>
		    </div>
		<?php
			}
		?>
	</div>
</body>
</html>
