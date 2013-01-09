<form id="shoptrendsform">
<input type="hidden" id="action" value="shoptrends/update" />
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
   <td>所属商家</td>
   <td>
     <input name="shop_id" id="shop_id_id" value="<?=$data['shop_id']?>" />
   </td>
 </tr>    
 <tr>
   <td>标题</td>
   <td>
     <input name="name" id="name_id" value="<?=$data['name']?>" />
   </td>
 </tr>    
 <tr>
   <td>图片</td>
   <td>
     <input name="present_image" id="present_image_id" value="<?=$data['present_image']?>" />
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
<script src="statics/scripts/app/shoptrends/get.js"></script>
<link href="statics/css/app/shoptrends/get.css" rel="styleSheet" media="screen"/>