<!--
    旋風之音 GoneTone
    https://blog.reh.tw/
    範例教學
    <blockquote class="wp-embedded-content" data-secret="nO0XSd4MvA"><a href="https://blog.reh.tw/archives/662">jQuery Ajax 實現不刷新頁面提交資料 (後端使用 PHP 處理回傳 json)</a></blockquote><div class="embed-responsive embed-responsive-16by9 my-3"><iframe class="wp-embedded-content embed-responsive-item lazy" sandbox="allow-scripts" security="restricted" style="position: absolute; clip: rect(1px, 1px, 1px, 1px);" data-secret="nO0XSd4MvA" width="500" height="282" title="「jQuery Ajax 實現不刷新頁面提交資料 (後端使用 PHP 處理回傳 json)」 — 旋風之音 GoneTone" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" data-src="https://blog.reh.tw/archives/662/embed#?secret=nO0XSd4MvA"></iframe></div>
-->
<!DOCTYPE html>
<html>
    <head>
        <title>jQuery Ajax 實現不刷新頁面提交資料 Demo (後端使用 PHP 處理回傳 json)</title>
    </head>
    <body>
        <h1>jQuery Ajax 實現不刷新頁面提交資料 Demo (後端使用 PHP 處理回傳 json)</h1>
        <h2>教學文章：<a href="https://blog.reh.tw/archives/662" target="_blank">https://blog.reh.tw/archives/662</a></h2>
        <hr><br>
        <form id="demo">
            暱稱：<input type="text" id="nickname">
            性別：
            <select id="gender">
                <option value="">請選擇</option>
                <option value="男">男</option>
                <option value="女">女</option>
                <option value="其他">其他</option>
            </select>
            <button type="button" id="submitExample">執行範例</button>
        </form>
        <br><hr>
        <p id="result"></p> <!-- 顯示回傳資料 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- 引入 jQuery -->
        <script type="text/javascript">
            $(document).ready(function() {
                $("#submitExample").click(function() { //ID 為 submitExample 的按鈕被點擊時
                    $.ajax({
                        type: "POST", //傳送方式
                        url: "service.php", //傳送目的地
                        dataType: "json", //資料格式
                        data: { //傳送資料
                            nickname: $("#nickname").val(), //表單欄位 ID nickname
                            gender: $("#gender").val() //表單欄位 ID gender
                        },
                        success: function(data) {
                            $("#result").empty();
                            $.each(data, function(key, value) {
                                if (value.nickname) { //如果後端回傳 json 資料有 nickname
                                    $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
                                    $("#result").append('<font color="#007500">您的暱稱為「<font color="#0000ff">' + value.nickname + '</font>」，性別為「<font color="#0000ff">' + value.gender + '</font>」！</font>');
                                } else { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                                    $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
                                    $("#result").append('<font color="#ff0000">' + data.errorMsg + ' this is error message' + '</font>');
                                }
                            });
                        },
                        error: function(jqXHR) {
                            $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
                            $("#result").html('<font color="#ff0000">發生錯誤：' + jqXHR.status + '</font>');
                        }
                    })
                })
            });
        </script>
    </body>
</html>