<?php

setcookie("curuser", "", time() - 3600, "/");
setcookie("curusertype", "", time() - 3600, "/");
// setcookie("curuserid", "", time() - 3600, "/");

header("refresh:3;url=index.html");
exit;
?>
