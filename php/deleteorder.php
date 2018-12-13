<?php
     @require_once("config.php");

     $userLoginId = $_GET["userLoginId"];

     $sql = "DELETE FROM shoppingcar WHERE userid = $userLoginId";
     $result = mysql_query($sql);
     $count = mysql_affected_rows();
     
     $arr = array();
     if ($count > 0) {
         $arr["code"] = 1;
         $arr["msg"] = "结算成功";
     }else {
         $arr["code"] = 0;
         $arr["msg"] = "结算失败";
     }

     echo json_encode($arr);
?>