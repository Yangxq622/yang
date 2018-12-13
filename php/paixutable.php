<?php
    @require_once("config.php");
    $table = $_GET["table"];
    $method = $_GET["method"];
    $order = $_GET["order"];


    $sql = "select * from  $table ORDER BY $method $order";
    mysql_query("set names utf8");
    $result = mysql_query($sql);
    $arr = array();
    while($item = mysql_fetch_array($result)){
        $temp = array();
        $temp["goodsid"] = $item["goodsid"];
        $temp["goodsname"] = $item["goodsname"];
        $temp["goodsbig"] = $item["goodsbig"];
        $temp["goodsprice"]= $item["goodsprice"];
        $temp["goodsnum"] = $item["goodsnum"];
        $temp["goodintro"] = $item["goodintro"];
        $temp["goodsimg"] = $item["goodsimg"];
        $arr[] = $temp;
    }
    echo json_encode($arr);
?>