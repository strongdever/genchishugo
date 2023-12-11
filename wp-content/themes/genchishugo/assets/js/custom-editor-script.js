!(function ($) {
    "use strict";
    $(document).ready(function () {
        var activity_style = $('#acf-field_656f23b42f65f');  //記事形式

        var image_item = $('#acf-group_656f27288f6f2'); //動画
        var video_item = $('#acf-group_6576b43f999fe'); //プロフィール

        Intit();

        //add a change event handler to the 記事形式 field
        activity_style.on('change', function () {
            var selectedVaule = $(this).val();  //the value of the current selected item of 記事形式
            console.log(selectedVaule);
            //show and hide the ACF fields based on the selected value of 記事形式
            if (selectedVaule === '画像を埋め込んだインタビュー形式') {
                image_item.show();
                video_item.hide();
            } else if (selectedVaule === '動画セミナー一覧を埋め込んだパターン') {
                image_item.hide();
                video_item.show();
            } else if (selectedVaule === '勉強会（セミナー）の開催告知パターン') {

            } else if (selectedVaule === '（会員登録したら見れる）パターン') {

            }
        })

        $('input').on('change', function(event) {
            Intit();
        });
        $('select').on('change', function() {
            Intit();
        });

        //initializing for showing and hideing
        function Intit() {
            var selectedVaule = $(activity_style).val();  //the value of the current selected item of 記事形式
            console.log(selectedVaule);
            //show and hide the ACF fields based on the selected value of 記事形式
            if (selectedVaule === '画像を埋め込んだインタビュー形式') {
                image_item.show();
                video_item.hide();
            } else if (selectedVaule === '動画セミナー一覧を埋め込んだパターン') {
                image_item.hide();
                video_item.show();
            } else if (selectedVaule === '勉強会（セミナー）の開催告知パターン') {

            } else if (selectedVaule === '（会員登録したら見れる）パターン') {

            }
        }
    });

})(jQuery);