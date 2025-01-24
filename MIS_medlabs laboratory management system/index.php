<?php
    if(isset($_COOKIE['username'])){
        $thepage = "dashboard/";
    } else {
        $thepage = "login.html";
    }
?>

<!-- check if there is a user logged in, if there is go to dash, otherwise login page -->
<p>redirecting</p>

<script>
    var redirect = `<?php echo $thepage;?>`;
    <?php sleep(2);?>
    window.location.assign(redirect);
</script>