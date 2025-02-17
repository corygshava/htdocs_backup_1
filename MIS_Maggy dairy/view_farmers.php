<?php
	include 'actions/checksession.php';
	require 'actions/connect.php';
	require 'workers/worker_viewfarmers.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Farmers List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/styles.css">

	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>

	<div class="center-container">
		<div class="container mt-4">
			<h2 class="mb-3 text-center"><?= $greetxt?></h2>
			<table class="table table-bordered">
				<thead class="table-dark">
					<tr>
						<?= $hed?>
					</tr>
				</thead>
				<tbody>
					<?php echo $outxt;?>
					<?php if ($result->num_rows === 0) { ?>
					<tr>
						<td colspan="6" class="text-center nada">No records found in the farmers table.</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<?php
			if($utype == "admin"){
		?>
		<div class="container text-center">
			<a href="new_farmer.php" class="btn btn-primary themebg hoverfx2"><i class="fa fa-plus"></i> add new farmer</a>
			<a href="new_milkintake.php" class="btn btn-primary themebg hoverfx2"><i class="fa fa-plus"></i> add new intake</a>
		</div>
		<?php
			}
		?>
	</div>

	<!-- edit Modal -->
	<div class="modal fade" id="editFarmerModal" tabindex="-1" aria-hidden="true">
	    <div class="modal-dialog modal-dialog-centered">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h5 class="modal-title">Edit Farmer</h5>
	                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	            </div>
	            <div class="modal-body">
	                <form action="actions/edit_farmer.php" method="POST" id="editform">
	                	<input type="hidden" name="theid" value="0">
	                    <div class="mb-3">
	                        <label class="form-label">Name</label>
	                        <input type="text" name="name" class="form-control" required>
	                    </div>
	                    <div class="mb-3">
	                        <label class="form-label">Password</label>
	                        <input type="text" name="upass" class="form-control" required>
	                    </div>
	                    <div class="mb-3">
	                        <label class="form-label">ID No</label>
	                        <input type="text" name="id_no" class="form-control" required>
	                    </div>
	                    <div class="mb-3">
	                        <label class="form-label">Location</label>
	                        <input type="text" name="location" class="form-control" required>
	                    </div>
	                    <div class="mb-3">
	                        <label class="form-label">Contact</label>
	                        <input type="text" name="contact" class="form-control" required>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="submit" class="btn btn-primary">Save</button>
	                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script>
		let editform = document.querySelector('#editform');

		function setupbtns() {
			let btns = document.querySelectorAll('.editbtn');

			btns.forEach(el => {
				el.addEventListener('click',e => {
					editrec(el);
				})
			})
		}

		function editrec(me) {
			let id = me.dataset.myid;
			let fname = me.dataset.fname;
			let pass = me.dataset.pass;
			let idno = me.dataset.idno;
			let loc = me.dataset.loc;
			let contact = me.dataset.contact;

			editform.theid.value = id;
			editform.name.value = fname;
			editform.upass.value = pass;
			editform.id_no.value = idno;
			editform.location.value = loc;
			editform.contact.value = contact;
		}

		window.onload = e => {
			setupbtns();
		}
	</script>
</body>
</html>
