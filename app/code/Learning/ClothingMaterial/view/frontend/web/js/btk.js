define([
    'jquery',
    'mage/translate',
    'jquery/ui',
    'mage/mage'
], function ($) {
    // 'use strict';
    return function button(config, element) {
        // alert('Blah blah blah');
        $(".hello").click(function () {
            var thisButton = this;
            // var reviewUrl = config.url;
            var customData = "Hello các con vợ";
            $.ajax({
                // url: reviewUrl,
                // type: 'get',
                // dataType: '',
                // data: customData,
                success: function (response) {
                    alert(customData);
                    $(thisButton).html(config.message);
                },
                error: function (response) {
                    alert('Failed !');
                    $(thisButton).html("Custom Data Show Failed");
                }
            })
        })
    }
})
