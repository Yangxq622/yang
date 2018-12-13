<?php
    @require_once("config.php");

    $userLoginId = $_GET["userLoginId"];
    $goodsid = $_GET["goodsid"];
    $goodsname = $_GET["goodsname"];
    $goodsprice = $_GET["goodsprice"];
    $goodsimg = $_GET["goodsimg"];
    $goodsnum = $_GET["goodsnum"];

    //查询数据 有就更新 否则新增数据
    $sql = "SELECT * FROM shoppingcar WHERE userid = $userLoginId AND goodsid = $goodsid";
    mysql_query("set names utf8");
    $result = mysql_query($sql);
    $item = mysql_fetch_array($result);

    $sql1 = "";
    if ($item) {
        //已经有数据 执行更新
        $sql1 = "UPDATE  shoppingcar SET goodsnum = goodsnum + 1 where userid = $userLoginId and goodsid = $goodsid";        
    }else {
        //插入新数据
        $sql1 = "INSERT INTO shoppingcar(userid,goodsid,goodsnum,goodsname,goodsprice,goodsimg) 
                    VALUES($userLoginId,$goodsid,'$goodsnum','$goodsname','$goodsprice','$goodsimg')";
    }
    mysql_query($sql1);
    $count = mysql_affected_rows();
    
    $arr = array();
    if ($count > 0) {
        $arr["code"] = 1;
        $arr["msg"] = "加入成功";
    }else{
        $arr["code"] = 0;
        $arr["msg"] = "加入失败";
    }

    echo json_encode($arr);
?>