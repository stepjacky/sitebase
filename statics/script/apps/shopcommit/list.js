/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){

    $("#list").jqGrid({
        url:'shopcommit/listdata',
        datatype: "json",
        colNames:[
          '内容'
              ,
                    
          '编号'
              ,
                    
          '用户'
              ,
                    
          '所属商家'
              ,
                    
          '日期'
                    
        ],
        colModel:[
              {name:'content',index:'content',width:100}             
          
              ,
              {name:'id',index:'id',width:100}             
          
              ,
              {name:'username',index:'username',width:100}             
          
              ,
              {name:'shop_id',index:'shop_id',width:100}             
          
              ,
              {name:'createDate',index:'createDate',width:100}             
          
            
        ],
        rowNum:10,
        rowList:[10,20,30],
        pager: '#page',
        sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"商家评论表",
        jsonReader : {
            repeatitems : false,
            id : "0"
        }
    });
    $("#list").jqGrid('navGrid','#page',{edit:false,add:false,del:false});
});