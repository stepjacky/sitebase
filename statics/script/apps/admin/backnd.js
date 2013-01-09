/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-6-4
 * Time: 下午1:43
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $("button#kickall").bind("click",function(){
        alert("kick all");
        $.post("admin/kickall",function(){
            alert("操作完成");
        })
    });
})