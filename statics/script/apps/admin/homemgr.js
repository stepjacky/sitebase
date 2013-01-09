/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-19
 * Time: 下午8:16
 * To change this template use File | Settings | File Templates.
 */
$(function () {
    $("button.img_selector").bind("click", function () {
        var imgfor = $(this).attr("imgfor");
        var viewId = $(this).attr("imgview");
        imageSelector(imgfor,viewId);

    });


    $("button.nineshopbtn").bind("click", function () {
        var selectShop = window.showModalDialog("shop/dialog");
        if (selectShop) {
            var pos = $(this).attr("p");
            var forid = $(this).attr("forid");
            var tul = $("#"+forid);
            tul.empty();
            $.each(selectShop,function(idx,item){
                var idname = item.split('_',2);
                var opt  = $("<option value='"+idname[0]+"'>"+idname[1]+"</option>");
                tul.append(opt);
            });
        }
    });

    $("button.moveshop").bind("click",function(){
          var from = $("#"+$(this).attr("fromid"));
          var to  =  $("#"+$(this).attr("toid"));
          var optfrom = $("option:selected",from);
          if(optfrom)to.append(optfrom);
    });

    $("#saveBtn").bind("click",function(){
          var params='';
          for(var i=0;i<9;i++){
              params+=collectShops(i);
          }
        $.post("manager/savehomeshop",params,function(){
            alert("保存商家信息完成!");
        });

    });

    $("button.saveone").bind("click",function(){
        var p = $(this).attr("p");
        var params = collectShops(p);
        $.post("manager/savehomeshop",params,function(){
            alert("保存商家信息完成!");
        });
    });
    $("button.imagerun").bind("click",function(){
        var imgfor = $(this).attr("imgfor");
        var viewId = $(this).attr("imgview");
        imageSelector(imgfor,viewId);
    });


    $("#saveAdAll").bind("click",function(){
         var params = "";
        for(var i=0;i<14;i++){
            params+=collectAd(i);
        }
        $.post("manager/savead",params,function(){
            alert("保存广告完成!");
        });
    });
    $("button.saveadone").bind("click",function(){
        var p = $(this).attr("p");
        var params = collectAd(p);
        $.post("manager/savead",params,function(){
            alert("保存广告完成!");
        });
    });


});

function imageSelector(imgfor,viewImgId){
    var obj = new Object();
    obj.name = "img_dialog";
    var selectImg = window.showModalDialog("picture/dialog");

    $("#" + imgfor).val(selectImg);
    $("#" + viewImgId).attr("src", selectImg);
}
function collectAd(i){
    var params = "";
    var ad_link = $("#ad_link_"+i).val();
    var ad_image = $("#ad_image_"+i).val();
    params+='&'+i+"-ad_link="+ad_link;
    params+='&'+i+"-ad_image="+ad_image;
    return params;
}
function collectShops(i){
    var params="";
    var list = $("#shopSelect_"+i);
    var top  = $("#topshop_"+i);
    var toptwo = $("option",top);
    if(toptwo && toptwo.length && toptwo.length==2){
        params+='&'+i+"-first_shop_id="+toptwo[0].value;
        params+='&'+i+"-second_shop_id="+toptwo[1].value;
    }
    var listshop = $("option",list);
    var liststr=[];
    $.each(listshop,function(idx,item){
        liststr.push(item.value);
    });
    var more  = $("#shopmore"+i).val();
    var mname = $("#shopmore"+i+"_name").val();
    params+="&"+i+"-more_link="+more;
    params+="&"+i+"-more_name="+mname;

    params+="&"+i+"-shop_list="+liststr.join(",");
    return params;
}