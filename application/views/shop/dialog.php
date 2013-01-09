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
<script type="text/javascript" src="statics/script/apps/shop/dialog.js"></script>
<form method="post" target="_self">
   <div class="shops">
   <?php for($c=0;$c<count($shops);$c++){?>
    <input type="hidden" name="shops[]" value="<?=$shops[$c];?>" />
   <?php } ?>
   </div>
       <div>

    <table id="list" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>分类</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($datasource as $item):?>
           <tr>
            <td><input type="checkbox" name="shops[]" value="<?=$item['id']."_".$item['name'];?>"
                <?php

                  if(in_array($item['id']."_".$item['name'],$shops)){
                      echo "checked ='checked'";
                  }

                ?>
                />
                <?=$item['id'];?>
            </td>
            <td><?=$item['name'];?></td>
            <td><?=$item['cname']?></td>
           </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3">
                <?=$pagelink;?>

            </td>

        </tr>
        <tr>
           <td colspan="3">
               <button class="btn btn-inverse" type="button" id="okBtn">确认所选</button>
               <button class="btn btn-info" type="button" id="saveBtn">完成</button>

           </td>

        </tr>
        </tfoot>
    </table>

</div>
</form>
</body>
</html>
