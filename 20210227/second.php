<!DOCTYPE html>
<html>
    <head>
        <title>Order Detail</title>
    </head>
    <body>
        <?php
            if(isset($_POST["id"])) {
                $id = $_POST["id"];
                $host = 'localhost';
                $user = 'root';
                $password = 'Arkreact3';
                $database = 'sakila';
                $connect = new mysqli($host, $user, $password, $database);
        
                if($connect->connect_error) {
                    die("連線失敗" .$connect->connect_error);
                }
                $connect->query("SET NAMES 'utf8'");
                $querySql = "SELECT actor_id, first_name, last_name FROM sakila.actor WHERE actor_id='{$id}'";
                $response = $connect->query($querySql);
                if($response->num_rows > 0) {
                    while($row = $response->fetch_assoc()) {
                        $actor_id = $row["actor_id"];
                        $first_name = $row["first_name"];
                        $last_name = $row["last_name"];
                        $full_name = $first_name . ' ' . $last_name;
                        echo "<div><p>{$actor_id}</p><p>{$full_name}</p></div>";
                    }
                }
            }
        ?>
    </body>
</html>