<script type="text/javascript" src="statics/script/apps/list.js"></script>
<script type="text/javascript" src="statics/script/apps/artitle/list.js"></script>

<div>
    <table id="list" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>分类</th>
            <th>日期</th>
            <th>操作</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($datasource as $item):?>
        <tr>
            <td><?=$item['id'];?></td>
            <td><?=$item['name'];?></td>
            <td>
              <a class="category-list" href="javascript:;" cid ="<?=$item['cid']?>">
                <?=$item['cname'];?>
              </a>

            </td>
            <td><?=$item['createDate'];?></td>
            <td>
                <button class="btn btn-info artitle-view" aid="<?=$item['id'];?>">
                    <i class="icon-eye-open icon-white"></i>

                </button>
                <button class="btn btn-danger artitle-edit" aid="<?=$item['id'];?>">
                    <i class="icon-edit icon-white"></i>

                </button>
                <button class="btn btn-danger sremove" type="button"  sid="<?=$item['id']?>">
                    <i class="icon-trash icon-white"></i>

                </button>
            </td>
        </tr>

            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="5">
                <?=$pagelink;?>

            </td>

        </tr>

        </tfoot>
    </table>

</div>