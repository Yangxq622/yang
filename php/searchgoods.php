<?php
   @require_once("config.php");

   $key = $_GET["key"];

   $sql = "SELECT * FROM goodsinfo WHERE goodsname LIKE '%$key%'";
   mysql_query("set names utf8");
   $result = mysql_query($sql);

   $arr = array();
   while ( $item = mysql_fetch_array($result)) {
    $temp = array();
    $temp["goodsid"] = $item["goodsid"];
    $temp["goodsname"] = $item["goodsname"];
    $temp["goodsimg"] = $item["goodsimg"];
    $temp["goodsbig"] = $item["goodsbig"];
    $temp["goodsprice"] = $item["goodsprice"];
    $arr[] = $temp;
   }
    echo json_encode($arr);
?>