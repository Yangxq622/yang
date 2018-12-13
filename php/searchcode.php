<?php
     @require_once("config.php");

     $userLoginId = $_GET["userLoginId"];

     $sql = "SELECT CODE FROM userinfo WHERE id = $userLoginId";
     $result = mysql_query($sql);
     $item = mysql_fetch_array($result);

     
     $arr =array();
     if ($item) {
         $arr["code"] = 1;
         $arr["msg"] = $item[0];
     }else {
         $arr["code"] = 0;
         $arr["msg"] = "查询更新失败";
     }
     echo json_encode($arr);
?>