<script type="text/javascript" src="statics/script/apps/list.js"></script>
<script type="text/javascript" src="statics/script/apps/shoptrends/list.js"></script>
<div>
    <table id="list" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>所属商家</th>
            <th>管理</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($datasource as $item):?>
        <tr>
            <td><?=$item['id'];?></td>
            <td><?=$item['name'];?></td>
            <td>

                <a class="category-list" href="shop/index/<?=$item['phone']?>" target="_blank" >
                    <?=$item['sname'];?>
                </a>



            </td>
            <td>
                <button class="btn btn-info views" sid="<?=$item['id']?>" type="button">预览</button>
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

