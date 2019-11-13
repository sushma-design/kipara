<?php

include 'connection.php';

if(!isset($_SESSION['sess_userid']) || (trim($_SESSION['sess_userid']) == '')) {
    header("location: index.php");
    exit();
}

?>