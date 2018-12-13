<?php
    @require_once("config.php");
     $key = $_GET["key"];

     $sql = "select count(*) from  goodsinfo where goodsname LIKE '%$key%'";
     $result = mysql_query($sql);
     $item = mysql_fetch_array($result);
     $arr = array();
     $arr["count"] = $item[0];

     echo json_encode($arr);
?>