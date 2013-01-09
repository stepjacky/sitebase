/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $("button.sremove").bind("click",function(){
        if(!confirm("确认删除该分类?,该分类文章将被全部删除?")) return;
        var shopId = $(this).attr('sid');
        var tr = $(this).parent().parent();
        $.post("artitlecategory/remove/"+shopId,'',function(){
            tr.remove();
        });
    });
});