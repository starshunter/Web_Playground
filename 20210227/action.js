$(document).ready(function() {
    $("#submit").click(function() { //ID 為 submitExample 的按鈕被點擊時
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
                        if (value.first_name) { //如果後端回傳 json 資料有 nickname
                            $("#result").append('<button class="query_item" type="submit" name="id" value="' + value.id + '"><div class="btn_text"><p class="ID">' + value.id + '</p><p class="name">' + value.first_name + '</p></div></button><br>');
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
    // $("#result").on('click', 'button', function(event) {
    //     // var title = this.textContent;
    //     var ele = this.getElementsByClassName("ID")[0];
    //     console.log(ele);
    //     var ID = this.getElementsByClassName("ID")[0].textContent;
    //     var name = this.getElementsByClassName("name")[0].textContent;
    //     console.log(ID, name);
    //     var btn = $('<button class="query_item"><div class="btn_text"><p class="ID">' + ID + '</p><p class="name">' + name + '</p></div></button><br>');
    //     $("#result").append(btn);
    // });
});