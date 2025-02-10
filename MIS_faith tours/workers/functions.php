<?php
    function processcat($v=''){
        $m = explode("_", $v);
        $m[0] = "";
        $itemname = implode("_", $m);
        $_cat = substr($itemname, 1);

        return $_cat;
    }

    function getcat($v=''){
        $m = explode("_", $v);

        return $m[0]."_";
    }

    function gettyp($v=''){
        if(strpos($v, "fac_") === 0){
            $res = "facility";
        } elseif (strpos($v, "utype_") === 0) {
            $res = "user type";
        } else {
            $res = "tour type";
        }

        return $res;
    }
?>