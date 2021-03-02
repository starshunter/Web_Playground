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
    if(isset($_POST["name"])) {
        @$name = $_POST["name"]; //取得 nickname POST 值

        if($name != null) {
            $host = 'localhost';
            $user = 'root';
            $password = 'Arkreact3';
            $database = 'sakila';
            $connect = new mysqli($host, $user, $password, $database);
    
            if($connect->connect_error) {
                die("連線失敗" .$connect->connect_error);
            }
            $connect->query("SET NAMES 'utf8'");
            $querySql = "SELECT actor_id, first_name, last_name FROM sakila.actor WHERE first_name='{$name}'";
            $response = $connect->query($querySql);

            $users = [];

            if($response->num_rows > 0) {
                while($row = $response->fetch_assoc()) {
                    $actor_id = $row["actor_id"];
                    $first_name = $row["first_name"];
                    $last_name = $row["last_name"];
                    $full_name = $first_name . ' ' . $last_name;
                    array_push($users, array('first_name' => $first_name, 'id' => $actor_id));
                }
            }

            echo json_encode(
                $users
            );
        } else {
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