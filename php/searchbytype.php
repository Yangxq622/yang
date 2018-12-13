<?php
    @require_once("config.php");
     $table = $_GET["table"];

     $sql = "SELECT * FROM $table";
     $result = mysql_query($sql);

     $arr = array();
     while ($item = mysql_fetch_array($result)) {
         $temp = array();
         $temp["goodsid"] = $item["goodsid"];
         $temp["goodsname"] = $item["goodsname"];
         $temp["goodsbig"] = $item["goodsbig"];
         $temp["goodsprice"] = $item["goodsprice"];
         $temp["goodsimg"] = $item["goodsimg"];

         $arr[] = $temp;
     }
     echo json_encode($arr);
?>