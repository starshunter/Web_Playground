<?php
/*
 * 旋風之音 GoneTone
 * https://blog.reh.tw/
 *
 * 範例教學
 * https://blog.reh.tw/archives/662/
 */
header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8
if ($_SERVER['REQUEST_METHOD'] == "POST") { //如果是 POST 請求
    if(isset($_POST["nickname"]) && isset($_POST["gender"])) {
        @$nickname = $_POST["nickname"]; //取得 nickname POST 值
        @$gender = $_POST["gender"]; //取得 gender POST 值
        if ($nickname != null && $gender != null) { //如果 nickname 和 gender 都有填寫
            //回傳 nickname 和 gender json 資料
            $users = [];
            array_push($users, array('nickname' => '哈哈', 'gender' => '中性'));
            array_push($users, array('nickname' => $nickname, 'gender' => $gender));
            echo json_encode(
                    $users
            );
        } else {
            //回傳 errorMsg json 資料
            echo json_encode(array(
                'errorMsg' => '資料未輸入完全！'
            ));
        }
    }
} else {
    //回傳 errorMsg json 資料
    echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
}
?>