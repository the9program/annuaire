$(document).ready(function () {
    $('body').on('click','#lang-switcher a',function () {
        var locale = $(this).attr('data-lang');
        var _token = $("meta[name=csrf-token]").attr('content');

        $.ajax({
            url: "/language",
            type: 'POST',
            data:{local:locale,_token:_token},
            datatype: 'json',
            success: function (data) {
                console.log(data)
            },
            error:function (data) {
                console.log(data)
            },
            beforeSend:function (data) {

            },
            complete:function (data) {
                window.location.reload(true);
                console.log(data);
            }
        })
    });
})