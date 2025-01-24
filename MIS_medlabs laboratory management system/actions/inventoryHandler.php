<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inventory handler</title>
</head>

<?php
    require "../actions/checksession.php";
?>


<?php
    $task = (isset($_GET["action"])) ? $_GET["action"] : "update";

    echo "working on it, action : <b>$task</b><br>";
    
    $itemname = (isset($_POST["itemname"])) ? $_POST["itemname"] : "";
    $itemamount = (isset($_POST["itemamount"])) ? $_POST["itemamount"] : "";
    $itemcost = (isset($_POST["itemcost"])) ? $_POST["itemcost"] : "";
    $itemdescription = (isset($_POST["itemdescription"])) ? $_POST["itemdescription"] : "";

    $thedate = date("Y-m-d");
    $thetime = date("H:i:s");
    $showinfo = true;
    $logit = false;
    $myaction = "[undefined action]";

    /*
        consider{
            the idea is to switch the value of $task (already declared) through "update","add","remove","new" using switch block
        } write a php code for this
    */
    switch ($task) {
        case "update":

            $myaction = "updated";
            $myop = "SELECT quantity FROM inventory WHERE itemname = '$itemname'";
            include('getdata.php');

            $oldcount = 0;
            while ($row = $result -> fetch_row()){
                $oldcount = $row[0];
            }
            $newcount = $oldcount + $itemamount;

            $myop = "UPDATE inventory SET quantity = '$newcount' WHERE itemname = '$itemname'";
            include('getdata.php');

            $logit = true;
            break;

        case "give":

            $myaction = "administered";
            $myop = "SELECT quantity FROM inventory WHERE itemname = '$itemname'";
            include('getdata.php');

            $oldcount = 0;
            while ($row = $result -> fetch_row()){
                $oldcount = $row[0];
            }
            $newcount = $oldcount - $itemamount;

            if($newcount >= 0){
                $myop = "UPDATE inventory SET quantity = '$newcount' WHERE itemname = '$itemname'";
                include('getdata.php');

                $logit = true;
            } else {
                echo "overuse detected<br>";
                header("Refresh:0.2; url = ../dashboard/inventorymanagement.php?error=You cant administer more than $oldcount $itemname(s)");
            }
            break;

        case "add":
            $myaction = "added";
            // addItem();
            $myop = "SELECT itemname FROM inventory WHERE itemname = '$itemname'";
            include("getdata.php");

            if($result->num_rows == 0){
                # add item and go to dash
                $myop = "INSERT INTO inventory (id, itemname, quantity, description, cost, updatedby, updatedate) VALUES (NULL, '$itemname', '$itemamount', '$itemdescription', '$itemcost', '$curuser', '$thedate') ";
                include("getdata.php");

                echo "doesnt exist, can update";
            } else {
                # dont add item and go to management with an error
                echo "already exists, cant update";
            }
            break;
        
        case "remove":
            $myaction = "removed";
            $myop = "DELETE FROM `inventory` WHERE itemname = '$itemname'";
            include("getdata.php");

            $logit = true;
            break;
        
        case "new":
            $myaction = "added";
            // addItem();
            $myop = "SELECT itemname FROM inventory WHERE itemname = '$itemname'";
            include("getdata.php");

            if($result->num_rows == 0){
                # add item and go to dash
                $myop = "INSERT INTO inventory (id, itemname, quantity, description, cost, updatedby, updatedate) VALUES (NULL, '$itemname', '$itemamount', '$itemdescription', '$itemcost', '$curuser', '$thedate') ";
                include("getdata.php");

                $logit = true;
                echo "doesnt exist, can update<br>";
            } else {
                # dont add item and go to management with an error
                echo "already exists, cant update<br>";
                header("Refresh:0.2; url = ../dashboard/inventorymanagement.php?error=Item already exists");
                exit;
            }
            break;
        
        default:
            echo "invalid data";
            exit;
            break;
    }

    if($logit){
        $summary = "the item [$itemname] was $myaction on $thedate at $thetime by $curuser";
        $myop = "INSERT INTO itemslog (id, logdate, updater, operationtype, itemaffected, summary) VALUES (NULL, '$thedate', '$curuser', '$task', '$itemname', '$summary') ";
        include("getdata.php");

        header("Refresh:1.2; url = ../dashboard/");
    }
?>

<?php
    function addItem(){
        /*
            check if the item exists in a table called inventory
            if it doesnt add the record
            if it does redirect to ../dashboard/inventorymanagement.php?error=Item already exists
        */
        return;
        $myop = "SELECT itemname FROM inventory WHERE itemname = '$itemname";
        include("getdata.php");

        if($result->num_rows == 0){
            # add item and go to dash
            $myop = "INSERT INTO inventory (id, itemname, quantity, description, cost, updatedby, updatedate) VALUES (NULL, '$itemname', '$itemamount', '$itemdescription', '$itemcost', '$curuser', '$thedate') ";
            include("getdata.php");

            echo "doesnt exist, can update";
        } else {
            # dont add item and go to management with an error
            echo "already exists, cant update";
        }
    }
?>