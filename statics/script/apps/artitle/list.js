/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){
  $("button.artitle-view").bind("click",function(){
       var url = "artitle/view/"+$(this).attr('aid');
       window.showModalDialog(url,window,'dialogwidth:900px;dialogheight:800px;help:0;center:yes;resizable:0;status:0;location:0;scroll:yes');
  });

  $("button.artitle-edit").bind("click",function(){
      var aid = $(this).attr("aid");
      doPost("artitle/editnew/"+aid);


  });
    $("button.sremove").bind("click",function(){
        if(!confirm("确认删除?")) return;
        var shopId = $(this).attr('sid');
        var tr = $(this).parent().parent();
        $.post("artitle/remove/"+shopId,'',function(){
            tr.remove();
        });
    });
});