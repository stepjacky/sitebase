/**
  * 生成By php.ci generator
  * 
  *
  */
$(function(){
    //绑定点击保存按钮控件
    $("#saveBtn").bind("click",function(){
          var result = $("#shoptrendsform").serialize();
          var url="shoptrends/update";
          $.post(url,result,createSuccess);    
    });
});

/**
  * 发送成功户调用
  */
function createSuccess(data){

}