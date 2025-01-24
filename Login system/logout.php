<?php
    if(isset($_COOKIE['username'])){
        // deletes a cookie (data storage packet) by setting the expiry time to 1 second
        setcookie('username', "over", time() + 1);
        echo "deleted<br>";
        echo $_COOKIE['username'];
    }
?>

<script>
    window.location.assign("../login.php");
</script>