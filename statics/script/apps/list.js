/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */

$(function(){
    $("div.pagination ul li a").bind("click",function(){
        var link = $(this).attr("link");

        if(!link)return;
        doPost(link);
    });
});