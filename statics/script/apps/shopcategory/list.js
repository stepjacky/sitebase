$(function(){
    $("button.sremove").bind("click",function(){
        if(!confirm("确认删除该商家分类,该分类下的所有商家极其涉及到的信息将被全部删除?")) return;
        var shopId = $(this).attr('sid');
        var tr = $(this).parent().parent();
        $.post("shopcategory/remove/"+shopId,'',function(){
            tr.remove();
        });
    });
});