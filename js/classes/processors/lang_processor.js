Global.language = {

    change: function (elem) {
        var data = {
            lang: elem.value
        };

        $.ajax({
            url: 'http://127.0.0.1/gcards.com/lang_controller/changeLang/',
            type: 'post',
            data: data,
            complete: function () {
            },
            success: function (resultJSON) {
                var resultData = JSON.parse(resultJSON);

                if (resultData['success'] == true) {
                    location.reload();
                }
            },
            error: function () {
            }
        });
    }
}