<?php
if(isset($_COOKIE['username'])){
    $res = 'user has logged in';
} else {
    $res = "no current user";
}
?>