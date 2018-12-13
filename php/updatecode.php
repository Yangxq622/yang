<?php
    @require_once("config.php");
    $userLoginId = $_GET["userLoginId"];
    $code = $_GET["code"];

    $sql = "SELECT * FROM userinfo where id = $userLoginId";
    $result = mysql_query($sql);
    $item = mysql_fetch_array($result);
    $exitcode = $item["code"];
    //查找已经有的积分 有就累计 否则更新
    $sql1  ="";
    if ($exitcode) {
        //已经有积分
        $sql1 = "UPDATE userinfo SET code = $exitcode + $code WHERE id = $userLoginId";
    }else {
        $sql1 = "UPDATE userinfo SET code = $code WHERE id = $userLoginId";
    }
    $result1 = mysql_query($sql1);
    $count = mysql_affected_rows();
    $arr = array();
    if ($count > 0) {
        $arr["code"] = 1;
        $arr["msg"] = "积分更新成功";
    }else{
        $arr["code"] = 0;
        $arr["msg"] = "积分更新失败";
    }
    echo json_encode($arr);
?>