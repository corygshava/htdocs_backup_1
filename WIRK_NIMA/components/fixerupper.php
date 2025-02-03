<?php
if(isset($_POST['thekey']) && isset($_POST['thetext'])) {
    $thewantedhash = '06a383cbe05dcc9eed37dea0d97271d9';
    $thehash = md5($_POST['thekey']);

    if($thehash == $thewantedhash) {
        $file = fopen("../sitedata.bxz", "w");
        fwrite($file, $_POST['thetext']);
        fclose($file);

        echo "Data has been successfully written. Redirecting...";
        header("refresh:3;url=../index.php");
        exit;
    } else {
        header("refresh:3;url=../index.php");
        exit("Invalid key.");
    }
} else {
    header("refresh:3;url=../index.php");
    exit("Invalid request stream");
}
?>
