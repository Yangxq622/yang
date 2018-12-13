<?php
    @require_once("config.php");

    $userLoginId = $_GET["userLoginId"];

    $sql = "SELECT * FROM shoppingcar WHERE userid = $userLoginId";
    //查询现有的购物车数据
    mysql_query("set names utf8");
    $result = mysql_query($sql);

    $arr = array();
    while($item = mysql_fetch_array($result)){
        $temp = array();
        $temp["id"] = $item["id"];
        $temp["userid"] = $item["userid"];
        $temp["goodsid"] = $item["goodsid"];
        $temp["goodsnum"] = $item["goodsnum"];
        $temp["goodsimg"] = $item["goodsimg"];
        $temp["goodsprice"] = $item["goodsprice"];
        $temp["goodsname"] = $item["goodsname"];

        $arr[] = $temp;
    }
    echo json_encode($arr);
?>