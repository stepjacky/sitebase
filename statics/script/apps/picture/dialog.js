/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-27
 * Time: 下午5:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){
   $("button.image-selector").bind("click",function(){
       var imagepath = $(this).attr("imagepath");
       window.returnValue = imagepath;
       window.close();

   });

    $("div.pagination ul li a").bind("click",function(){
        var link = $(this).attr("link");
        $("form").attr("action",link);
        if(!link)return;
        $("form").get(0).submit();
    });
});