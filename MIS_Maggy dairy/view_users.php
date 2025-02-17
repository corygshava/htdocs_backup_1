<?php
    $redirectto = "index.php";
    $restricted = "true";
    include 'actions/checksession.php';
    require 'actions/connect.php';
    require 'workers/worker_viewusers.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>All users</title>
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
            <h2 class="mb-3 text-center themetxt">all users</h2>
            <table class="table table-bordered">
                <thead class="table-dark themetxt">
                    <tr>
                        <?= $hed?>
                    </tr>
                </thead>
                <tbody>
                    <?= $outxt?>
                    <?php if ($reccount == 0) { ?>
                    <tr>
                        <td colspan="4" class="text-center nada">No records found in the milk table.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="container text-center">
            <a href="new_user.php" class="btn btn-primary themebg hoverfx2"><i class="fa fa-plus"></i> add new user</a>
        </div>
    </div>


    <!-- edit Modal -->
    <div class="modal fade" id="editFarmerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="actions/edit_user.php" method="POST" id="editform">
                        <input type="hidden" name="theid" value="0">
                        <div class="mb-3">
                            <label class="form-label">UserName</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" name="upass" class="form-control" required>
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

            editform.theid.value = id;
            editform.name.value = fname;
            editform.upass.value = pass;
        }

        window.onload = e => {
            setupbtns();
        }
    </script>
</body>
</html>
