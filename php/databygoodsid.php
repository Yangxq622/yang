<?php
     @require_once("config.php");

     $goodsid = $_GET["goodsid"];

     $sql = "SELECT * FROM goodsinfo WHERE goodsid = '$goodsid'";
     mysql_query("set names utf8");
     $result = mysql_query($sql);
     $item = mysql_fetch_array($result);

     $arr = array();
     if ($item) {
         $arr["goodsname"] = $item["goodsname"];
         $arr["goodsbig"] = $item["goodsbig"];
         $arr["goodsprice"] = $item["goodsprice"];
         $arr["goodsnum"] = $item["goodsnum"];
         $arr["goodsintro"] = $item["goodintro"];
         $arr["goodsimg"] = $item["goodsimg"];
     }
     echo json_encode($arr);
?>