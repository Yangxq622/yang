<?php
    @require_once("config.php");

    $usertel = $_GET["usertel"];

    $sql = "SELECT * FROM userinfo WHERE tel = '$usertel'";
    $result = mysql_query($sql);
    $item = mysql_fetch_array($result);

    $arr = array();
    if ($item) {
        $arr["code"] = 0;
        $arr["msg"] = "该手机号已经注册过";
    }else {
        $arr["code"] = 1;
        $arr["msg"] = "通过";
    }
    echo json_encode($arr);
?>