<form id="artitlecategoryform">
<input type="hidden" id="action" value="artitlecategory/update" />
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
   <td>名称</td>
   <td>
     <input name="name" id="name_id" value="<?=$data['name']?>" />
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
<script src="statics/scripts/app/artitlecategory/get.js"></script>
<link href="statics/css/app/artitlecategory/get.css" rel="styleSheet" media="screen"/>