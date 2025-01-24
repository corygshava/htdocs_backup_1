<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="../css/forms.css">
	<link rel="stylesheet" href="../css/shava.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/w3.css">

	<title>CTMS admin Login</title>

</head>
<body>
	<div class="container midcard">
		<h1 class="specialTxt"><i class="fa fa-user"></i> <br>Admin Login</h1>
		<form action="handleLogin.php" method="post">
			<input type="email" name="email" placeholder="enter your email here">
			<input type="password" name="password" placeholder="enter your password here">
			<button type="submit">go</button>
		</form>
	</div>
</body>
</html>