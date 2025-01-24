<?php
    function addCookie($cookieName, $cookieValue) {
        $expiration = time() + (24 * 60 * 60); // 24 hours
        
        setcookie($cookieName, $cookieValue, $expiration,"/");

        // echo "Cookie '$cookieName' has been set with value '$cookieValue'.";
    }

    function deleteCookie($cookieName) {
        // Set the cookie expiration time to a past date to immediately expire the cookie
        $expiration = time() - 3600; // 1 hour ago
        
        // Delete the cookie by setting its expiration time to a past date
        setcookie($cookieName, "invalid", time() - (86400 * 30), "/"); 
        
        // Optional: Display a message indicating that the cookie has been deleted
        // echo "Cookie '$cookieName' has been deleted.";
    }

    function handlelogin($what){
        // add a cookie for the username
        addCookie("username",$what);
    }

    function handlelogout(){
        // delete cookie for the username
        deleteCookie("username");
    }
?>