<?php
    $prefix = "../";
    include '../actions/checksession.php';
    include '../actions/connect.php';
?>

<?php
	if(isset($_GET['eventid'])){
		// eventid 	userid 	contact 	cname 	ticketcode 	checkedin 
		$sql = "SELECT userid,usercontact,username FROM users WHERE username = '$curuser'";
		$res = $conn->query($sql);
		$row = $res->fetch_assoc();

		$ecode = $_GET['eventid'];
		$theid = $row['userid'];
		$contact = $row['usercontact'];
		$cname = $row['username'];
		$tcode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 4);

		$finalcode = "INSERT INTO bookings (eventid,userid,contact,cname,ticketcode,checkedin) 
			VALUES ('$ecode','$theid','$contact','$cname','$tcode','no')";
		$res = $conn->query($finalcode);

		if($res){
			$alt = "booking successful!";
		} else {
			$alt = "booking failed";
		}
	} else {
		$alt = "event code is required to begin booking";
	}

	header("refresh: 1.2; client_my_events.php");
?>

<script type="text/javascript">
	alert(<?php echo $alt;?>);
</script>