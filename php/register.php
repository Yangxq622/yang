<?php
    @require_once("config.php");

    $register_email = $_GET["email"];
    $userpwd = $_GET["userpwd"];
    $code = $_GET["code"];
    $usertel = $_GET["usertel"];
    $username = $_GET["username"];
    //通过条件  用户名和手机号不重复 邮箱不重复
    $sql1 = "SELECT * FROM userinfo WHERE username = '$username'";
    $sql3 = "SELECT * FROM userinfo WHERE email = '$register_email'";

    $result1 = mysql_query($sql1);
    $result3 = mysql_query($sql3);
    $item1 = mysql_fetch_array($result1);
    $item3 = mysql_fetch_array($result3);

    $arr = array();
    if ($item1[0] || $item3[0]) {
        //有一个存在 不能注册
        $arr["code"] = 0;
        $arr["msg"] = "已经被使用啦，换一个试试吧";
    }
    if (!$item1 && !$item3) {
        //都不存在 才能注册
        $sql4 = "UPDATE userinfo SET 
                username = '$username',userpwd = '$userpwd',telcode = '$code',email = '$register_email' 
                WHERE tel = '$usertel'";
        mysql_query($sql4);
        $count =  mysql_affected_rows();
        if ($count > 0) {
            $arr["code"] = 1;
            $arr["msg"] = "新增成功";
        }else{
            $arr["code"] = 2;
            $arr["msg"] = "新增失败";
        }
    }
    echo json_encode($arr);
?>