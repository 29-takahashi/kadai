$(function() {
    //1.ミルクココアインスタンスを作成
    var milkcocoa = new MilkCocoa("appleifc51thg.mlkcca.com");

    //2."message"データストアを作成
    var ds = milkcocoa.dataStore("message");

    //3."message"データストアからメッセージを取ってくる
    ds.stream().sort("dsc").size(8).next(function(err, datas) {
        // console.log('asc');
        // console.table(datas);←超便利
        datas.forEach(function(data) {
            renderMessage(data);
        });
    });

    //4."message"データストアのプッシュイベントを監視
    ds.on("push", function(e) {
        renderMessage(e);
    });

    var last_message = "dummy";

    function renderMessage(message) {
        var message_html = '<p>' + escapeHTML(message.value.content) + '</p><div class="clear_balloon"></div>';
        var date_html = '';
        if(message.value.date) {
            date_html = '<p class="post-date"><small>' + escapeHTML(message.value.name) + ' ' + escapeHTML( new Date(message.value.date).toLocaleTimeString()) + '</small></p>';
        }
        $("#"+last_message).before('<div id="'+message.id+'" class="post">'+message_html + date_html +'</div>');
        last_message = message.id;
        }

    function post() {
        //5."message"データストアにメッセージをプッシュする
        var content = escapeHTML($("#content").val());
        var name = escapeHTML($("#name").val());

        if (content && content !== "" && name !== "") {
            ds.push({
                name: name,
                content: content,
                date: new Date().getTime()
            }, function (e) {});
        }
        $("#content").val("");
        $("#name").val("");
    }

    $('#send').on("click", function () {
        post();
    });

    $('#content').keydown(function (e) {
        if (e.which == 13){
            post();
            return false;
        }
    });
    //削除処理
    $("#delete").on("click", function(){
        ds.stream().next(function(err, datas) {
            datas.forEach(function(data) {
                ds.remove(data.id);
            });
        });
    });

});
//インジェクション対策
function escapeHTML(val) {
    return $('<div>').text(val).html();
};