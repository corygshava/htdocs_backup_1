<nav class="w3-top norm">
	<a>
		<b class="pritxt pagename">manage farmers</b>
	</a>
    <div>
        <a href="index.php" class="opter"><i class="fa fa-dashboard"></i> dashboard</a>
		<div class="w3-dropdown-hover">
		    <a href="#" class="opter"><i class="fa fa-file-text-o"></i> farmer options <i class="fa fa-chevron-down"></i></a>
		    <div class="w3-dropdown-content w3-card w3-animate-opacity">
		        <a href="registerfarmer.php" class="navlink">new farmer</a>
		        <a href="managefarmers.php" class="navlink">manage farmers</a>
		    </div>
		</div>
        <div class="w3-dropdown-hover">
            <a href="#" class="opter"><i class="fa fa-coffee"></i> coffee options <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-card w3-animate-opacity">
                <a href="intake.php" class="navlink">new intake</a>
                <a href="intakes.php" class="navlink">intakes</a>
                <a href="send_to_processing.php" class="navlink">send to processing</a>
                <a href="in_processing.php" class="navlink">processing queue</a>
                <a href="inventory.php" class="navlink">inventory</a>
            </div>
        </div>
        <div class="w3-dropdown-hover">
            <a href="#" class="opter"><i class="fa fa-credit-card"></i> Finances options <i class="fa fa-chevron-down"></i></a>
            <div class="w3-dropdown-content w3-card w3-animate-opacity">
                <a href="deposit_funds.php" class="navlink">new deposit</a>
                <a href="deposits.php" class="navlink">deposits</a>
                <a href="sell_coffee.php" class="navlink">sell coffee</a>
				<a href="sales_coffee.php" class="navlink">coffee sales</a>
            </div>
        </div>
        <div class="w3-dropdown-hover" class="w3-right">
            <a href="#" class="opter"><i class="fa fa-user"></i> User options</a>
            <div class="w3-dropdown-content w3-card">
                <a href="newuser.php" class="navlink">register user</a>
                <a href="userslist.php" class="navlink">view users</a>
                <a href="actions/logout.php" class="navlink">logout</a>
            </div>
        </div>
    </div>
</nav>

<script>
    let pname = document.querySelector('.pagename');
    pname.innerHTML = document.title;
</script>