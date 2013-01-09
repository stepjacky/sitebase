/**
 * Created by JetBrains PhpStorm.
 * User: 汉图
 * Date: 12-2-28
 * Time: 下午10:44
 * To change this template use File | Settings | File Templates.
 */
function doPost(url,data){
    $("#mainContent").empty();
    $.post(url,data,function(msg){
       $("#mainContent").html(msg);
    });
}

