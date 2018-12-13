<?php
    @require_once("config.php");
    $userLoginId = $_GET["userLoginId"];

    $sql = "SELECT sum(goodsnum) FROM shoppingcar WHERE userid = $userLoginId";
    $result = mysql_query($sql);

    $item = mysql_fetch_array($result);

    $arr = array();
    if ($item) {
        $arr["num"] = $item[0];
    }else if ($item[0] == "") {
        $arr["num"] = 0;
    }

    echo json_encode($arr);
?>