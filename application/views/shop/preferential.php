<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <link href="../../statics/css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen,print"/>
    <link href="../../statics/css/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../../statics/css/bootstrap/js/html5.js"></script>
    <![endif]-->

    <script type="text/javascript" src="../../statics/script/ueditor/editor_config.js"></script>
    <script type="text/javascript" src="../../statics/script/ueditor/editor_all.js"></script>
    <link rel="stylesheet" href="../../statics/script/ueditor/themes/default/ueditor.css"/>
</head>
<body>
<form action="../../shop/savepreferantial/<?=$shopId?>" method="post">
   <textarea name="preferential"  id="preferantial"><?=$preferential?></textarea>
   <button class="btn">保存</button>
</form>
<script type="text/javascript">
    window.onload=function(){
        new baidu.editor.ui.Editor({minFrameHeight:500}).render("preferantial");
    }

</script>
</body>
</html>