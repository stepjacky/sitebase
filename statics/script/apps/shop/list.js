/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){
   $("a.preferential").bind("click",function(){
         var shopId = $(this).attr("sid");
         window.showModalDialog("shop/preferential/"+shopId,"");
   });

    $("a.toppic").bind("click",function(){
        var shopId = $(this).attr("sid");
        var obj = new Object();
        obj.name="51js";
        window.showModalDialog("shop/toppic/"+shopId,obj,"dialogWidth=400px;dialogHeight=400px;center:yes");
    });

    $("button.trends").bind("click",function(){
        var shopId = $(this).attr("sid");
        doPost("shop/info/"+shopId);

    });

    $("a.pdtpic").bind("click",function(){
        var shopId = $(this).attr("sid");
        var obj = new Object();
        obj.name="51js";
        window.showModalDialog("shop/pdtpic/"+shopId,obj,"dialogWidth=400px;dialogHeight=500px;center:yes");
    });

    $("a.trendslist").bind("click",function(){
        var sid = $(this).attr("sid");
        doPost("shoptrends/listbyshop/"+sid);
    })


    $("button.sremove").bind("click",function(){
        if(!confirm("确认删除该商家,该商家所涉及到的信息将被全部删除?")) return;
        var shopId = $(this).attr('sid');
        var tr = $(this).parent().parent();
        $.post("shop/remove/"+shopId,'',function(){
            tr.remove();
        });
    });

});