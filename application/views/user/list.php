<script type="text/javascript" src="statics/script/apps/list.js"></script>
<script type="text/javascript" src="statics/script/apps/user/list.js"></script>
<div>
    <table id="list" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>用户名</th>
            <th>更新日起</th>
            <th>管理</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($datasource as $item):?>
        <tr>
            <td><?=$item['sname'];?></td>
            <td><?=$item['createDate'];?></td>
            <td>
                <button class="btn btn-danger sremove" type="button"  sid="<?=$item['sname']?>">
                    <i class="icon-trash icon-white"></i>
                </button>
            </td>

        </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">
                <?=$pagelink;?>

            </td>

        </tr>

        </tfoot>
    </table>

</div>

<form action="user/save" class="well" method="post" target="formframe">
    <label>用户名</label>
    <input name="sname"/>
    <label>密码</label>
    <input name="spass" type="password" />
    <br/>
    <button class="btn btn-primary">保存</button>
</form>