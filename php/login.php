<?php
    @require_once("config.php");

    $userpwd = $_GET["userpwd"];
    $usertel = $_GET["usertel"];

    $sql = "SELECT * FROM userinfo WHERE tel = '$usertel'";
    $result = mysql_query($sql);
    $item = mysql_fetch_array($result);

    $arr = array();
    if ($item) {
        //用户存在
        $pwd = $item["userpwd"];
        if ($userpwd == $pwd) {
            $arr["code"] = 1;
            $arr["msg"] = "登录成功";
            $arr["userid"] = $item["id"]; 
            $arr["username"] = $item["username"];
        }else {
            $arr["code"] = 0;
            $arr["msg"] = "用户名与密码不匹配";
        }
    }else{
        $arr["code"] = 2;
        $arr["msg"] = "该用户还未注册";
    }
    echo json_encode($arr);
?>