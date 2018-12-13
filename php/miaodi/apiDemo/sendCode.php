<?php
/**
 * 验证码通知短信接口
 */
require_once("include/config.php");
require_once("include/httpUtil.php");
require_once("../../config.php");

/**
 * url中{function}/{operation}?部分
 */
$funAndOperate = "industrySMS/sendSMS";

// 参数详述请参考http://miaodiyun.com/https-xinxichaxun.html

// 生成body

$userTel = $_GET["userTel"];
$rand = rand(1000,9999);

$body = createBasicAuthData();
// 在基本认证参数的基础上添加短信内容和发送目标号码的参数
$body['smsContent'] = "【可可里科技】登录验证码：{$rand}，如非本人操作，请忽略此短信。";
$body['to'] = $userTel;

// 提交请求
$result = post($funAndOperate, $body);

$sql = "SELECT * FROM userinfo WHERE tel = '$userTel'";
$result = mysql_query($sql);
$item = mysql_fetch_array($result);

$arr = array();
$sql1 = "";
if($item){
    $sql1 = "UPDATE userinfo SET telcode = $rand WHERE tel = $userTel";
}else{
    $sql1 = "INSERT INTO userinfo(tel,telcode) VALUES ('$userTel','$rand')";
}

mysql_query($sql1);
$count = mysql_affected_rows();
if($count >0){
    $arr["code"] = 1;
    $arr["msg"] = "发送成功";
}else{
    $arr["code"] = 0;
    $arr["msg"] = "发送失败";
}

echo json_encode($arr);
//echo("<br/>result:<br/><br/>");
//var_dump($result);