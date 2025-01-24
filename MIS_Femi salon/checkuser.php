<?php
if(isset($_COOKIE['userdata'])){
    $res = 'user has logged in';
} else {
    $res = "no current user";
}
?>