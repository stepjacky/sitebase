<script type="text/javascript" src="statics/script/apps/list.js"></script>
<script type="text/javascript" src="statics/script/apps/shopcategory/list.js"></script>
<div>
    <table id="list" class="table table-striped table-bordered">
       <thead>
         <tr>
             <th>编号</th>
             <th>名称</th>
             <th>管理</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach($datasource as $item):?>
          <tr>
              <td><?=$item['id'];?></td>
              <td><?=$item['name'];?></td>
              <td>
                  <button class="btn btn-danger sremove" type="button"  sid="<?=$item['id']?>">
                      <i class="icon-trash icon-white"></i>

                  </button>

              </td>
           </tr>

         <?php endforeach; ?>
       </tbody>
       <tfoot>
         <tr>
             <td colspan="2">
                 <?=$pagelink;?>

             </td>

         </tr>

       </tfoot>
    </table>

</div>

<form id="saveFormId" method="post" action="shopcategory/create" class="well form-search" target="formframe">
    <input type="text" name="name" class="span3" placeholder="填写分类名称..." />
    <button  class="btn" type="submit">保存</button>
</form>