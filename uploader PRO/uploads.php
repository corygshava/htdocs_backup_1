<?php
// Define the directory path
$directory = 'uploads/';
$res = "";

// Check if the directory exists
if (is_dir($directory)) {
    // Open the directory
    if ($handle = opendir($directory)) {
        // Loop through each file in the directory
        while (($file = readdir($handle))) {
            // Exclude . and .. from the listing
            $hastag = strpos($file, 'ide_');
            $tagn = $hastag ? 'true' : 'false';
            // echo "[$tagn] $file<br>";
            if ($file != "." && $file != ".." && !$hastag) {
                // Display the file name
                $file = escape_chars($file);
                $res .= "'$file',";
            }
        }
        // Close the directory handle
        closedir($handle);
        $res .= "'thats all'";
    } else {
    	$res .= "cant open uploads";
    }
} else {
    $res .= "directory not found";
}

function escape_chars($what){
	$tofind = ["'","\"","`"];
	$replacewith = ["\'",'\"',"\`"];
	$res = str_replace($tofind, $replacewith, $what);

	return $res;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>Uploaded files</title>
</head>
<body>
	<div class="content">
		<div class="holder">
			<div class="heading">
				<h1>your files</h1>
				<span>click on a file to download it</span>
			</div>

			<div class="searcher w3-center">
				<div class="searchbox">
					<input class="themeround" type="text" id="searchme" placeholder="search for a file" oninput="searchstuff()">
				</div>
				<button class="w3-hide w3-button w3-text-black w3-hover-white"><i class="fa fa-search"></i></button>
				<button class="w3-hide w3-btn w3-hover-blue themeround"><i class="fa fa-close"></i></button>
			</div>

			<div class="items">
			</div>
		</div>

		<?php
			include "elements/nav.php";
		?>
	</div>

	<script>
		var items = document.querySelector('.items');
		var searchnpt = document.querySelector('input#searchme');
		var thefiles = <?php echo "[$res]";?>;
		var mafiles = thefiles;

		setupstuff();

		function setupstuff() {
			let output = "";
			mafiles.forEach((element,index) => {
				let tmptxt = "";
				element = element.length > 70 ? element.substr(0,50) + "..." + element.substr(element.length - 12,element.length) : element;

				if(index != (thefiles.length - 1)){
					tmptxt = `<a class="list-item" href="uploads/${element}" download>${element}
						<span class="tuttxt w3-right">click to download</span></a>`;
				} else {
					tmptxt = `<i class="list-item w3-center w3-hover-text-red last">${element}</i>`;
				}
				output += tmptxt;
			});

			items.innerHTML = output;
		}

		function searchstuff(){
			let val = searchnpt.value;
			let found = 0;

			if(val == ""){
				mafiles = thefiles;
			} else {
				mafiles = new Array();
				thefiles.forEach(element => {
					if(element.toUpperCase().indexOf(val.toUpperCase()) >= 0){
						mafiles.push(element);

						found += 1;
					}
				});

				if(found == 0){
					mafiles.push('nothing found');
				}
			}

			setupstuff();
		}
	</script>
</body>
</html>