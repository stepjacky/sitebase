/**
  * 生成By php.ci generator
  * 
  *
  */
$(function(){
    //绑定点击保存按钮控件
    $("#saveBtn").bind("click",function(){
          var result = $("#shopcategoryform").serialize();
          var url="shopcategory/create";
          $.post(url,result,createSuccess);    
    });
});

/**
  * 发送成功户调用
  */
function createSuccess(data){

}