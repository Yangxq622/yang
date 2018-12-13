<?php
    @require_once("config.php");

    $goodsname = $_GET["goodsname"];
    $sql = "SELECT * FROM goodsinfo WHERE goodsname = '$goodsname'";
    mysql_query("set names utf8");
    $result = mysql_query($sql);
    $item = mysql_fetch_array($result);
    $arr = array();
    if ($item) {
        $arr["goodsid"] = $item["goodsid"];
        $arr["goodsbig"] = $item["goodsbig"];
        $arr["goodsprice"] = $item["goodsprice"];
        $arr["goodsnum"] = $item["goodsnum"];
        $arr["goodsname"] = $item["goodsname"];
        $arr["goodsimg"] = $item["goodsimg"];
    }
    echo json_encode($arr);
?>