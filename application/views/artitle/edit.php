<form id="artitleform"
      action="artitle/create" target="formframe" enctype="multipart/form-data" method="post">
<input type="hidden" name="id" value="<?=$item['id'];?>"/>
    <table class="table table-bordered">
<tbody>
<tr>
    <td width="100">标题</td>
    <td>
        <input name="name" id="name_id" value="<?=$item['name'];?>"  />
    </td>
</tr>
<tr>
    <td>文章类别</td>
    <td>
       <?= form_dropdown("artitle_category_id",$category,$item['artitle_category_id'])?>

    </td>
</tr>
<tr>
    <td>来源</td>
    <td>
        <input name="sourcefrom" id="from_id" value="<?=$item['sourcefrom'];?>"  />
    </td>
</tr>

<tr>
    <td>点击数</td>
    <td>
        <input name="clicknum" id="clicknum_id" value="<?=$item['clicknum'];?>" />
    </td>
</tr>
<tr>
    <td>标志图片</td>
    <td>
        <input name="present_image" type="file" id="present_image_id" />
        <input name="present_image_value" type="hidden" value="<?=$item['present_image'];?>">
        <img src="<?=$item['present_image'];?>" width="100" height="100"  />

    </td>
</tr>
<tr>
    <td>消费动态</td>
    <td><input type="checkbox" name="consumetrends" value="1"
          <?=$item['consumetrends']=="1"?"checked=true":"";?>
        /> </td>

</tr>
<tr>
   <td>内容</td>
   <td>
     <textarea name="content" id="content_id"><?=$item['content'];?> </textarea>
   </td>
 </tr>

</tbody>
<tfoot>
  <tr>
   <td colspan="2">

      <button class="btn btn-success" type="submit">保存</button>
      <button class="btn" type="reset">重置</button>
   </td>
   <td></td>
  </tr>
</tfoot>     
</table>
</form>
<script src="statics/script/apps/artitle/get.js"></script>
<link href="statics/css/apps/artitle/get.css" rel="styleSheet" media="screen"/>