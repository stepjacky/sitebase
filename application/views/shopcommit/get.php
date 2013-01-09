<form id="shopcommitform">
<input type="hidden" id="action" value="shopcommit/update" />
<fieldset>
<lengend>编辑</lengend>
<table class="table table-bordered">
<tbody>
 <tr>
   <td>内容</td>
   <td>
     <input name="content" id="content_id" value="<?=$data['content']?>" />
   </td>
 </tr>    
 <tr>
   <td>编号</td>
   <td>
     <input name="id" id="id_id" value="<?=$data['id']?>" />
   </td>
 </tr>    
 <tr>
   <td>用户</td>
   <td>
     <input name="username" id="username_id" value="<?=$data['username']?>" />
   </td>
 </tr>    
 <tr>
   <td>所属商家</td>
   <td>
     <input name="shop_id" id="shop_id_id" value="<?=$data['shop_id']?>" />
   </td>
 </tr>    
 <tr>
   <td>日期</td>
   <td>
     <input name="createDate" id="createDate_id" value="<?=$data['createDate']?>" />
   </td>
 </tr>    
</tbody>
<tfoot>
  <tr>
   <td>
      <button class="btn btn-success" type="button">保存</button>
      <button class="btn" type="reset">重置</button>      
   </td>
   <td></td>
  </tr>
</tfoot>     
</table>
</fieldset>
</form>
<script src="statics/scripts/app/shopcommit/get.js"></script>
<link href="statics/css/app/shopcommit/get.css" rel="styleSheet" media="screen"/>