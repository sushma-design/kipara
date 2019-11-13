<?php
include 'connection.php';

$itemSelect= $_POST['itemSelect'];

for ($i = 0; $i < $itemSelect; $i++) {

    $itemcat = $_POST['itemcat'][$i];

    if ($itemcat != '') {

        $insertQuery = "INSERT INTO specification_head(infohead)VALUES('$itemcat')";

        $result = mysql_query($insertQuery);
    }

}
if (isset($result)) {
    echo '<script type="text/javascript">alert("Your Data Has Been Saved");
      window.location = "addspechead.php";
      </script>';

    exit;
}
else
{
    echo '<script type="text/javascript">alert("Insertion Failed");
      window.location = "addspechead.php";
      </script>';

    exit;
}




?>