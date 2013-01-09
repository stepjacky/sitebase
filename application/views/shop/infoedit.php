<form method="post" enctype="multipart/form-data" action="shop/saveinfo/<?=$shopId;?>" target="formframe">
    <table class="table table-bordered">
       <thead>

       </thead>
       <tbody>
       <tr>
           <td>标题</td>
           <td><input name="name"></td>
       </tr>
       <tr>
           <td>图片</td>
           <td><input name="present_image" type="file"></td>
       </tr>
       <tr>
           <td>内容</td>
           <td><textarea name="content" id="content"></textarea></td>
       </tr>
       <tr>

           <td colspan="2">
               <button class="btn btn-primary">保存</button>
           </td>
       </tr>

       </tbody>

    </table>

</form>
<script type="text/javascript">
$(function(){
    new baidu.editor.ui.Editor().render("content");
});

</script>