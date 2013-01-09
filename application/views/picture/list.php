<script type="text/javascript" src="statics/script/apps/list.js"></script>
<script type="text/javascript" src="statics/script/apps/picture/list.js"></script>
<div>
    <table id="list" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>文件名</th>
            <th>大小</th>
            <th>上下文路径</th>
            <th>预览</th>
            <th>管理</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $r=0;
        ?>
        <?php foreach($datasource as $item):?>
         <tr>
            <td><?=$item['id'];?></td>
            <td><?=$item['file_name'];?></td>
            <td><?=$item['image_width'].'*'.$item['image_height'];?></td>
            <td><?=$item['web_path'].$item['file_name'];?></td>
            <td><img src="<?=$item['web_path'].$item['file_name']?>" width="100" height="100"></td>
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
            <td colspan="6">
                <?=$pagelink;?>

            </td>

        </tr>

        </tfoot>
    </table>

</div>
<script type="text/javascript">
    entityName="picture";
</script>
<iframe name="picframe" frameborder="0"  style="display: none"></iframe>
<form action="picture/create" enctype="multipart/form-data" method="post" target="picframe" class="well form-inline">
 <input type="file" name="userfile" />
 <button type="submit" class="btn">上传图片</button>
</form>
