<?php

session_start();

include 'connection.php';


if(isset($_POST['login'])) {
    $userid = $_POST['username'];
    $password = $_POST['password'];
    $sel_user = "SELECT * FROM login WHERE username='$userid' AND password='$password'";
    $run_user = mysql_query($sel_user);

    $check_user = mysql_num_rows($run_user);

    if ($check_user > 0) {

        $row = mysql_fetch_array($run_user);
        session_regenerate_id();

        $_SESSION['sess_userid'] = $row['username'];
        $_SESSION['sess_userrole'] = $row['role'];




        if ($_SESSION['sess_userrole'] == "admin") {
            header('Location: addproduct.php');
        }
        else {
            echo "<script type='text/javascript'>alert('Wrong Username Or Password');
            window.location = 'index.php';
            </script>";
        }

    } else {
        $message = "User Name Or Password Is Invalid";
        echo "<script type='text/javascript'>alert('$message');
      window.location = 'index.php';
    </script>";


    }

}





?>