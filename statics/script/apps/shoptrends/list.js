/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){
    $("button.sremove").bind("click",function(){
        if(!confirm("确认删除该商家咨询?")) return;
        var shopId = $(this).attr('sid');
        var tr = $(this).parent().parent();
        $.post("shoptrends/remove/"+shopId,'',function(){
            tr.remove();
        });
    });

    $("button.views").bind("click",function(){
        var url = "shoptrends/view/"+$(this).attr('sid');
        window.showModalDialog(url,window,'dialogwidth:900px;dialogheight:800px;help:0;center:yes;resizable:0;status:0;location:0;scroll:yes');
    });
});