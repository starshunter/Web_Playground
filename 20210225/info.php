<!DOCTYPE html>
<html>
    <head>
        <title>Playground</title>
        <link rel="stylesheet" type="text/css" href="./styles.css">
    </head>
    <body>
        <div class="main_content">
            <h1>Enter What You Want to Search</h1>
            <div class="form">
                <form action="info.php" method="POST">
                    Search <input type="text" name="name">
                    <input type="submit" value="Send">
                </form>
            </div>
            </br></br>
            <table>
                <thead>
                    <tr>
                        <th>First column</th>
                        <th>Second column</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST["name"])) {
                            $name = $_POST["name"];
                            // echo $name;
                            $host = 'localhost';
                            $user = 'root';
                            $password = 'Arkreact3';
                            $database = 'sakila';
                            $connect = new mysqli($host, $user, $password, $database);
                            if($connect->connect_error) {
                                die("連線失敗" .$connect->connect_error);
                            }
                            $connect->query("SET NAMES 'utf8'");
                            $querySql = "SELECT actor_id, first_name, last_name FROM sakila.actor WHERE first_name='{$name}' OR last_name='{$name}'";
                            $response = $connect->query($querySql);
                            if($response->num_rows > 0) {
                                while($row = $response->fetch_assoc()) {
                                    $actor_id = $row["actor_id"];
                                    $first_name = $row["first_name"];
                                    $last_name = $row["last_name"];
                                    $full_name = $first_name . ' ' . $last_name;
                                    echo "<tr><td>{$actor_id}</td> <td><a href='https://google.com'>{$full_name}</a></td></tr>";
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>