<?php
	if($utype == "admin"){
		// admin summary
		$myop = $conn->query("SELECT count(*) as myres FROM farmers");
		$theres = $myop == true;
		$farmercount = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT count(*) as myres FROM milk");
		$theres = $myop == true;
		$intakescount = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT count(*) as myres FROM sales");
		$theres = $myop == true;
		$salescount = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT count(*) as myres FROM users");
		$theres = $myop == true;
		$usercount = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT count(*) as myres FROM sales where status = 'verified'");
		$theres = $myop == true;
		$veri_sales = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT count(*) as myres FROM sales where status = 'pending'");
		$theres = $myop == true;
		$pending_sales = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT count(*) as myres FROM sales where status = 'rejected'");
		$theres = $myop == true;
		$rejected_sales = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT SUM(quantity) as myres FROM milk");
		$theres = $myop == true;
		$milk_brought = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT SUM(quantity) as myres FROM sales where status='verified'");
		$theres = $myop == true;
		$milk_sold = $theres ? $myop->fetch_assoc()['myres'] : '0';

		$myop = $conn->query("SELECT SUM(amount_paid) as myres FROM sales where status='verified'");
		$theres = $myop == true;
		$allsales = $theres ? number_format($myop->fetch_assoc()['myres']) : '0';
	} else {
		// farmer summary
	}
?>