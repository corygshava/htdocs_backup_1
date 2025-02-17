
<nav class="w3-card">
	<div class="navitem logopart">
		<b class="themetxt curpage">Page title</b>
	</div>
	<div class="navitem menupart">
		<button class="w3-btn" onclick="toggleShow('.sidemenu')"><i class="fa fa-bars"></i></button>
	</div>
</nav>

<div class="sidemenu" data-shown="0">
	<div class="navitem w3-right">
		<button class="w3-btn w3-white btn" onclick="toggleShow('.sidemenu')"><i class="fa fa-times"></i></button>
	</div>
	<div class="w3-bar-block menuguy w3-animate-left">
		<h2>Menu</h2>
		<hr>
		<a href="index.php" class="w3-bar-item">dashboard</a>

		<h3 class="themetxt">Visitor options</h3>
		<a href="new_visitor.php" class="w3-bar-item">new visitor</a>
		<a href="list_visitors.php" class="w3-bar-item">list visitors</a>
		<a href="search_visitors.php" class="w3-bar-item">search visitors</a>

		<h3 class="themetxt">Visit options</h3>
		<a href="new_visit.php" class="w3-bar-item">new visit</a>
		<a href="list_visits.php" class="w3-bar-item">view visits</a>

		<h3 class="themetxt">reservation options</h3>
		<a href="new_reservation.php" class="w3-bar-item">new reservation</a>
		<a href="list_reservations.php?req=events" class="w3-bar-item">event reservations</a>

		<h3 class="themetxt">admin options</h3>
		<a href="list_feedback.php" class="w3-bar-item	">view reviews and feedback</a>
		<a href="list_payments.php" class="w3-bar-item">view payments</a>
		<a href="system_data.php" class="w3-bar-item" title="facilities and prices">edit system data</a>

		<h3 class="themetxt">user options</h3>
		<a href="index.php#summ" class="w3-bar-item">view summary</a>
		<a href="new_user.php" class="w3-bar-item">add new user</a>
		<a href="list_users.php" class="w3-bar-item">view users</a>
		<a href="logout.php" class="w3-bar-item">logout</a>
	</div>
</div>