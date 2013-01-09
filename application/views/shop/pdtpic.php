<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>添加产品滚动图片</title>
    <base href="http://localhost/sitebase/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="statics/script/jquery-1.7.1.js"></script>

    <link rel="stylesheet" href="statics/css/bootstrap/css/bootstrap.css" media="screen"/>

</head>


<body>
<form class="form-horizontal" action="shop/savepdtpic/<?=$shopId;?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>更新产品滚动图片</legend>
        <div class="control-group">
            <ul>
                <li><input type="file" name="topimage_0" /></li>
                <li><input type="file" name="topimage_1" /></li>
                <li>  <input type="file" name="topimage_2" /></li>
                <li> <input type="file" name="topimage_3" /></li>
                <li><input type="file" name="topimage_4" /></li>
                <li><input type="file" name="topimage_5" /></li>
                <li><input type="file" name="topimage_6" /></li>
                <li><input type="file" name="topimage_7" /></li>
                <li><input type="file" name="topimage_8" /></li>


            </ul>


        </div>
        <button class="btn btn-primary">保存</button>
    </fieldset>
</form>
</body>
</html>