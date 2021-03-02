<!DOCTYPE html>
<html>
    <head>
        <title>jQuery Ajax PHP MySQL</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- 引入 jQuery -->
        <script type="text/javascript" src="./action.js"></script>
        <link rel="stylesheet" type="text/css" href="./styles.css">
    </head>
    <body>
        <div class="main_content">
            <div class="form">
                <form id="demo">
                    <input type="text" id="name"    >
                    <button type="button" id="submit">Search</button>
                </form>
            </div>
            <div id="result_header">
                <div class="header"><p>Orders</p></div>
                <div class="columns">
                    <p>ID</p>
                    <p>Customer</p>
                </div>
            </div>
            <div class="respond">
                <form action="./second.php" method="POST">
                    <p id="result"></p>
                </form>
            </div>
        </div>
    </body>
</html>