/**
 * Created with JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
$(function(){

    $("#list").jqGrid({
        url:'shopcategory/listdata',
        datatype: "json",
        colNames:['编号','名称', '操作'],
        colModel:[
            {name:'id',index:'id', width:55},
            {name:'name',index:'name', width:200},
            {name:'id',index:'id', width:300}
        ],
        rowNum:10,
        rowList:[10,20,30],
        pager: '#page',
        sortname: 'id',
        viewrecords: true,
        sortorder: "desc",
        caption:"商家分类表",
        jsonReader : {
            repeatitems : false,
            id : "0"
        }
    });
    $("#list").jqGrid('navGrid','#page',{edit:false,add:false,del:false});
});