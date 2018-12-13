<?php
//检验手机号对应的验证码
    @require_once("config.php");

    $userTel = $_GET["userTel"];
    $telCode = $_GET["telCode"];

    $sql = "SELECT * FROM userinfo WHERE tel = '$userTel'";
    $result = mysql_query($sql);
    $item = mysql_fetch_array($result);

    $arr = array();
    $existCode = $result["telcode"];

    if($telCode == $existCode){
        $arr["code"] = 1;
        $arr["msg"] = "成功";     
    }else{
        $arr["code"] = 0;
        $arr["msg"] = "失败";
    }
    echo json_encode($arr);
?>