/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){

    $("#list").jqGrid({
        url:'shopalbumn/listdata',
        datatype: "json",
        colNames:[
          '编号'
              ,
                    
          '所属商家'
              ,
                    
          '名称'
              ,
                    
          '图票'
                    
        ],
        colModel:[
              {name:'id',index:'id',width:100}             
          
              ,
              {name:'shop_id',index:'shop_id',width:100}             
          
              ,
              {name:'name',index:'name',width:100}             
          
              ,
              {name:'image',index:'image',width:100}             
          
            
        ],
        rowNum:10,
        rowList:[10,20,30],
        pager: '#page',
        sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"商家相册表",
        jsonReader : {
            repeatitems : false,
            id : "0"
        }
    });
    $("#list").jqGrid('navGrid','#page',{edit:false,add:false,del:false});
});