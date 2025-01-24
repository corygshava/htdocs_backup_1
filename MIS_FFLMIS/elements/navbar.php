<?php
    $mypage="";
    $linkprefix = "";

    if(isset($curpage)){
        $mypage = $curpage;
    } else {
        $mypage = "Dashboard";
    }

    if(isset($myprefix)){
        $linkprefix = $myprefix;
    }
?>

<nav class="w3-bar" style="font-size:25px">
    <li class="w3-bar-item"><a href="javascript:history.back()"><i class="icon icon-chevron-left"></i></a></li>
    <li class="w3-bar-item"><?php echo $mypage;?></li>
    <!-- <a href="login.php" class="w3-bar-item w3-right w3-btn"><i class="icon icon-user"></i></a> -->
    <li class="w3-bar-item w3-right"><a href="<?php echo $linkprefix;?>dashboard.php"><i class="icon icon-home"></i></a></li>
</nav>