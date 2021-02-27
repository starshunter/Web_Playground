$(document).ready(function() {
    $("#submitExample").click(function() { //ID 為 submitExample 的按鈕被點擊時
        $.ajax({
            type: "POST", //傳送方式
            url: "service.php", //傳送目的地
            dataType: "json", //資料格式
            data: { //傳送資料
                name: $("#name").val()//表單欄位 ID nickname
            },
            success: function(data) {
                $("#result").empty();
                $("#demo")[0].reset();
                if(data.length == 0) {
                    $("#result").append('<font color="#007500">無相關資料</font><br>');
                } else {
                    $.each(data, function(key, value) {
                        if (value.full_name) { //如果後端回傳 json 資料有 nickname
                            $("#result").append('<button class="query_item"><p class="btn_text">ID為「' + value.id + '」' + '暱稱為「' + value.full_name + '」</p></button><br>');
                        } else { //否則讀取後端回傳 json 資料 errorMsg 顯示錯誤訊息
                            $("#result").append('<font color="#ff0000">' + data.errorMsg + ' this is error message' + '</font>');
                        }
                    });
                }
            },
            error: function(jqXHR) {
                $("#demo")[0].reset(); //重設 ID 為 demo 的 form (表單)
                $("#result").html('<font color="#ff0000">發生錯誤：' + jqXHR.status + '</font>');
            }
        })
    })
    $("#result").on('click', 'button', function(event) {
        var title = this.textContent;
        var btn = $('<button class="query_item"><p class="btn_text">' + title +'</p></button><br>');
        $("#result").append(btn);
    });
});