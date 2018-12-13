<?php
    @require_once("config.php");

    $id = $_GET["id"];
    $sql = "DELETE  FROM shoppingcar WHERE id = $id";
    mysql_query($sql);

    $count = mysql_affected_rows();
    $arr = array();
    if($count >0){
        $arr["code"] = 1;
        $arr["msg"] = "删除成功";
    }else{
        $arr["code"] = 0;
        $arr["msg"] = "删除失败";
    }
    echo json_encode($arr);
?>