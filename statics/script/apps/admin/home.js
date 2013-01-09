/**
 * Created by JetBrains PhpStorm.
 * User: 汉图
 * Date: 12-2-28
 * Time: 下午10:20
 * To change this template use File | Settings | File Templates.
 */
var setting = {
       view:{
           selectedMulti:false
       },
       async:{
           enable:true,
           url:"admin/data",
           autoParam:["id", "name=n", "level=lv"],
           otherParam:{"otherParam":"zTreeAsyncTest"}
       },
       callback:{
           onClick:treeClick

       }
   };
   var zNodes=[
       {
           "id":"root",
           "name":"后台管理",
           "open":true,
           "isParent":true
       }
   ];

   function treeClick(event,treeId, treeNode) {
       if(treeNode.isParent)return false;
            doPost(treeNode.link);
            return false;
   }

   var zTreeObject = {};
   $(function () {
       zTreeObject = $.fn.zTree.init($("#navTree"), setting,zNodes);
       var nodes = zTreeObject.getNodes();
       zTreeObject.expandNode(nodes[0]);
   });
