<style type="text/css">
    .pagination ul {
        list-style: none;
    }
    .pagination ul li{
        display: inline;
        margin-left: 10px;
    }
</style>
<div class="element shop-commentary">
    <div class="element-header floatleft">
        <span class="floatleft">用户留言</span>

    </div>
<table style="width: 100%" cellspacing="0">
    <thead>
    <tr style="background-color: #c6c6c6; line-height: 30px; font-size:15px">
      <th>用户</th>
      <th>内容</th>
      <th>时间</th>
    </tr>
    </thead>
   <tbody>
   <?php foreach($shopdata as $cmt):?>
    <tr style="line-height: 30px ; margin-top: 5px;">
      <td align="center"  style="width:100px;border:#e0e0e0 1px solid;"><?=$cmt['username'];?></td>
      <td align="center"  style="border:#e0e0e0 1px solid;"><?=$cmt['content'];?></td>
      <td align="center"  style="width:200px;border:#e0e0e0 1px solid;"><?=$cmt['createDate'];?></td>
    </tr>
   <?php endforeach;?>
   </tbody>
   <tfoot>
     <td colspan="3" align="right">
        <?=$pagelink;?>
     </td>
   </tfoot>
</table>


</div>
<div class="element shop-commentary-form no-border">
    <iframe style="display: none" name="formframe"></iframe>
<form action="shop/savecommit" target="formframe" method="post">
    <input name="shop_id" type="hidden" value="<?=$shopself['sid']?>" />
<fieldset style="margin-top:20px; margin-left: 20px;">
   <legend>提交评论</legend>
   <table class="no-border">
    <caption></caption>
    <tbody>
       <tr>
       <td>E-MAIL/用户名</td>
       <td><input name="username" /></td>
    </tr>
    <tr>
        <td></td>
        <td><textarea name="content"></textarea></td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
    <td></td>
        <td>
        <button class="btn btn-primary">提交</button>

    </td>

    </tr>

    </tfoot>
   </table>

</fieldset>
</form>
</div>