/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-6-3
 * Time: 下午10:13
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $("button.sremove").bind("click",function(){
        if(!confirm("删除该用户?"))return;
        var sname = $(this).attr("sid");
        var p = $(this).parent().parent();
        $.post("user/remove/"+sname,"",function(){
            p.remove();
        });
    });
})