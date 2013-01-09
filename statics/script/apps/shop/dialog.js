/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-27
 * Time: 下午11:48
 * To change this template use File | Settings | File Templates.
 */


$(function(){
    var currentUrl = "shop/dialog";
    $("div.pagination ul li a").bind("click",function(){
        var link = $(this).attr("link");
        $("form").attr("action",link);
        if(!link)return;
        currentUrl = link;
        $("form").get(0).submit();
    });

    $(":checkbox").bind("click",function(){
         var chk = $(this).attr("checked");
         var vl = $(this).val();
         if(chk==undefined){
            var sval =   $("input[type=hidden][value="+vl+"]");
            if(sval){
               sval.remove();
            }
         }
    });

    $("#okBtn").bind("click",function(){
       $("form").attr("action",currentUrl).get(0).submit();

    });

    $("#saveBtn").bind("click",function(){
        var ins =  $("div.shops input:hidden");
        var vals = [];
        $.each( ins, function(i, item){
           vals.push(item.value);
        });
        window.returnValue = vals;
        window.close();
    });
});