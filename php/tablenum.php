<?php
     @require_once("config.php");
     $table = $_GET["table"];
     $sql = "select count(*) from  $table";
     $result = mysql_query($sql);
     $item = mysql_fetch_array($result);
     $arr = array();
     $arr["count"] = $item[0];

     echo json_encode($arr);
?>