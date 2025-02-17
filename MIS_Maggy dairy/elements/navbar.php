<nav class="navbar navbar-dark themebg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand curpage" href="#">Dairy management system</a>
        <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#menuModal"><i class="fa fa-bars"></i></button>
    </div>
</nav>

<!-- Menu Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-hidden="true">
	<?php
		if($utype == "admin"){
	?>
	    <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content hidemodal">
	            <div class="modal-header">
	                <h3 class="w3-text-white w3-center container-fluid">Admin Menu</h5>
	                <button type="button" class="btn-close w3-text-white bg-light" data-bs-dismiss="modal"></button>
	            </div>
	            <div class="modal-body">
					<div class="row g-4">
		                <div class="col-md-4">
							<div class="card">
								<div class="card-header">Reports</div>
								<div class="card-body">
									<a href="view_farmers.php">view farmers</a>
									<a href="view_milkintakes.php">view milk records</a>
									<a href="view_milksales.php">view milk sales</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">Actions</div>
								<div class="card-body">
									<a href="index.php">dashboard</a>
									<a href="new_farmer.php">new farmer</a>
									<a href="new_milkintake.php">new milk intake</a>
									<a href="new_milksale.php">new milk sale</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">Admin</div>
								<div class="card-body">
									<a href="new_user.php">new user</a>
									<a href="view_users.php">view users</a>
									<a href="view_sysdata.php">edit data</a>
									<a href="logout.php">logout</a>
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
	        <div class="modal-content hidemodal">
	            <div class="modal-header">
	                <h3 class="w3-text-white w3-center container-fluid">Farmer Menu</h3>
	                <button type="button" class="btn-close w3-text-white bg-light" data-bs-dismiss="modal"></button>
	            </div>
	            <div class="modal-body">
					<div class="row g-4">
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
							<div class="card shadow">
								<div class="card-header">Your actions</div>
								<div class="card-body">
									<a href="index.php">Dashboard</a>
									<a href="new_milkintake.php?farmerid=<?= $curuserid?>">new milk intake</a>
									<a href="new_milksale.php?farmerid=<?= $curuserid?>">new milk sale</a>
									<hr>
									<a href="view_milkintakes.php?farmerid=<?= $curuserid?>">My milk intakes</a>
									<a href="view_milksales.php?farmerid=<?= $curuserid?>">My milk sales</a>
									<a href="view_farmers.php?farmerid=<?= $curuserid?>">My information</a>
									<a href="logout.php">Log out</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
	?>
</div>
