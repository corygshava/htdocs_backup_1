<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['thekey'])){
        echo "access key required";
        exit();
    } else {
        $filekey = file_get_contents('dslkfhhgdrgkshreguerhiguh_sitekey.txt');

        if($_POST['thekey'] != $filekey){
            echo "incorrect access key, try again";
            exit();
        }
    }

    if (isset($_FILES['file'])) {
        $targetDir = "uploads/";
        $randkey = bin2hex(random_bytes(2));
        $targetFile = "$targetDir{$randkey}_". basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            echo "upload successful";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "file not accessible";
    }
} else {
    echo "invalid request";
}
