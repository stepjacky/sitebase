<script type="text/javascript" src="statics/script/apps/list.js"></script>
<script type="text/javascript" src="statics/script/apps/shop/list.js"></script>
<div>
    <table id="list" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>分类</th>
            <th>操作</th>
            <th>管理</th>
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
            <td>
                <div class="btn-group">
                    <button  sid="<?=$item['id']?>" type="button" class="btn btn-info trends">
                        <i class="icon-user icon-white"></i>添加咨询</button>
                    <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle">
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="trendslist"     href="javascript:;" sid="<?=$item['id']?>"><i class="icon-pencil"></i> 咨询列表</a></li>
                        <li><a class="preferential" href="javascript:;" sid="<?=$item['id']?>"><i class="icon-pencil"></i> 优惠更新</a></li>
                        <li><a class="toppic"       href="javascript:;" sid="<?=$item['id']?>"><i class="icon-pencil"></i> 顶部图片</a></li>
                        <li><a class="pdtpic"       href="javascript:;" sid="<?=$item['id']?>"><i class="icon-pencil"></i> 产品图片</a></li>

                    </ul>
                </div>
            </td>
            <td>
                <button class="btn btn-danger sremove" type="button"  sid="<?=$item['id']?>">
                    <i class="icon-trash icon-white"></i>

                </button>
                <a class="btn btn-success" href="shop/index/<?=$item['phone']?>" target="_blank">
                    <i class="icon-share icon-white"></i>

                </a>
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

