/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-31
 * Time: 上午11:41
 * To change this template use File | Settings | File Templates.
 */
$(function () {
    $("button.image_selector").bind("click", function () {
        alert(this);
        var imgfor = $(this).attr("imgfor");
        var valfor = $(this).attr("valfor");

        var image = window.showModalDialog("picture/dialog");

        if (image) {
            $("#" + valfor).val(image);
            $("#" + imgfor).attr("src", image);
        }
    });

    $("button.resetfield").bind("click",function(){
        var imgfor = $(this).attr("imgfor");
        var valfor = $(this).attr("valfor");
        $("#" + valfor).val("");
        $("#" + imgfor).attr("src", "");
    })
});