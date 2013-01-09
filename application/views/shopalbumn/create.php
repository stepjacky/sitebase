<form id="shopalbumnform">
<input type="hidden" id="action" value="shopalbumn/create" />
<fieldset>
<lengend>编辑</lengend>
<table class="table table-bordered">
<tbody>
 <tr>
   <td>编号</td>
   <td>
     <input name="id" id="id_id" />
   </td>
 </tr>    
 <tr>
   <td>所属商家</td>
   <td>
     <input name="shop_id" id="shop_id_id" />
   </td>
 </tr>    
 <tr>
   <td>名称</td>
   <td>
     <input name="name" id="name_id" />
   </td>
 </tr>    
 <tr>
   <td>图票</td>
   <td>
     <input name="image" id="image_id" />
   </td>
 </tr>    
</tbody>
<tfoot>
  <tr>
   <td>
      <button class="btn btn-success" id="saveBtn" type="button">保存</button>
      <button class="btn" type="reset">重置</button>      
   </td>
   <td></td>
  </tr>
</tfoot>     
</table>
</fieldset>
</form>