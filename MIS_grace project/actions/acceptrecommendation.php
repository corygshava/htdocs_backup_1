<?php
	include 'connect.php';

	$timeout = 2.3;

	if(isset($_COOKIE['curusertype']) && $_COOKIE['curusertype'] == "admin"){
		if (isset($_GET['recid'])) {
			$recid = $_GET['recid'];
			$updatequery = "UPDATE recommendations SET status = 'approved' WHERE id=$recid";
			if($conn->query($updatequery)){
				$restext = "recommendation approved successfully<br>";

				$getinfoquery = "SELECT * FROM recommendations WHERE id=$recid";
				$result = $conn->query($getinfoquery);
				$row = $result->fetch_assoc();

				$bname = $row['bname'];
				$age = $row['age'];
				$gender = $row['gender'];
				$BCnumber = $row['BCnumber'];
				$Description = $row['Description'];
				$medicalstatus = $row['medicalstatus'];
				$amountrequired = $row['amountrequired'];
				$residence = $row['residence'];

				$startdate = date('Y-m-d');
        		$enddate = date('Y-m-d', strtotime('+4 years'));

				$addstuffquery = "INSERT INTO beneficiaries (bname,age,gender,BCnumber,Description,medicalstatus,amountrequired,startdate,enddate,residence) VALUES ('$bname','$age','$gender','$BCnumber', '$Description', '$medicalstatus', '$amountrequired', '$startdate', '$enddate','$residence')";

				if($conn->query($addstuffquery)){
					$restext = "<br>Beneficiary has been added";
				} else {
					$restext = "<br>Error adding Beneficiary : {$conn->error}";
				}
			} else {
				$restext = "error approving recommendation : <b>{$conn->error}</b>";
			}
		} else {
			$restext = "invalid request";
		}
	} else {
		$restext = "you are not allowed to access this page";
		$timeout = 1.1;
	}

	$theloc = '../admin/view_recommends.php';
	$processtxt = 'approving recommendation';

	include '../components/loader.php';
?>