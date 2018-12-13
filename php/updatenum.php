<?php
     @require_once("config.php");
     
    // $userid = $_GET["userid"];
    // $goodsid = $_GET["goodsid"];
    $id = $_GET["id"];
    $goodsnum = $_GET["goodsnum"];

    $sql = "UPDATE shoppingcar SET goodsnum = $goodsnum WHERE id = $id";
    echo $sql;
    mysql_query($sql);

    $count = mysql_affected_rows();
    $arr = array();
    if($count > 0){
        $arr["code"] = 1;
        $arr["msg"] = "更新成功";
    }else{
        $arr["code"] = 0;
        $arr["msg"] = "更新失败";
    }
    echo json_encode($arr);
?>