<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <title>图片选择器</title>
    <base href="http://localhost/sitebase/" />
    <script src="statics/script/apps/util.js" type="text/javascript"></script>
    <script src="statics/script/jquery-1.7.1.js" type="text/javascript"></script>
    <link href="statics/css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen,print"/>
    <link href="statics/css/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="statics/css/bootstrap/js/html5.js"></script>
    <![endif]-->

<script type="text/javascript" src="statics/script/apps/picture/dialog.js"></script>
</head>
<body>
<form>
 <div>
    <table id="list" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>文件名</th>
            <th>大小</th>
            <th>上下文路径</th>
            <th>预览</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $r=0;
        ?>
        <?php foreach($datasource as $item):?>
        <tr>
            <td>
              <button imagepath="<?=$item['web_path'].$item['file_name'];?>" class="btn btn-inverse image-selector">选择</button>

            </td>
            <td><?=$item['file_name'];?></td>
            <td><?=$item['image_width']."*".$item['image_height'];?></td>
            <td><?=$item['web_path'].$item['file_name'];?></td>
            <td><img src="<?=$item['web_path'].$item['file_name']?>" width="100" height="100"></td>
        </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4">
                <?=$pagelink;?>

            </td>

        </tr>

        </tfoot>
    </table>

</div>
</form>
</body>
</html>