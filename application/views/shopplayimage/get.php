<form id="shopplayimageform">
<input type="hidden" id="action" value="shopplayimage/update" />
<fieldset>
<lengend>编辑</lengend>
<table class="table table-bordered">
<tbody>
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
   <td>名称</td>
   <td>
     <input name="image" id="image_id" value="<?=$data['image']?>" />
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
<script src="statics/scripts/app/shopplayimage/get.js"></script>
<link href="statics/css/app/shopplayimage/get.css" rel="styleSheet" media="screen"/>