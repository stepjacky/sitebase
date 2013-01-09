/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-30
 * Time: 下午8:40
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $("button.sremove").bind("click",function(){
        if(!confirm("确认删除该图片,所有链接到该图片的链接将失效?")) return;
        var shopId = $(this).attr('sid');
        var tr = $(this).parent().parent();
        $.post("picture/remove/"+shopId,'',function(){
            tr.remove();
        });
    });
})