<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=7" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <title>商家</title>
    <base href="http://www.78cs.cn/" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script type="text/javascript" src="http://api.map.baidu.com/api?v=1.3"></script>
    <script type="text/javascript" src="statics/script/jquery-1.7.1.js" ></script>

    <link charset="utf-8" href="statics/script/isotope/css/style.css" rel="stylesheet" media="screen"/>
    <link href="statics/css/shop.css" media="screen" rel="stylesheet" />
    <link href="statics/css/shopmenu/menu.css" media="screen" rel="stylesheet" />
    <script type="text/javascript">
        var lon = '<?=$shopself['slon']?>'|| false;
        var lat = '<?=$shopself['slat']?>'|| false;

    </script>
    <script type="text/javascript" src="statics/script/apps/shop/index.js"></script>

    <script type="text/javascript" src="statics/script/simplyscroll/jquery.simplyscroll.js"></script>
    <link rel="stylesheet" href="statics/script/simplyscroll/jquery.simplyscroll.css" media="all"          type="text/css">
    <!--[if lt IE 7]>
        <script type="text/javascript" src="statics/script/unitpngfix.js"></script>
    <![endif]-->
</head>
<body>

<div id="container" class="variable-sizes clearfix">
<div class="element shop-title no-border">
  <h1>长沙图盛网络科技有限公司</h1>
      <br/>
      <?=$shopself['sname'];?>
</div>

<div class="element topmenu no-border">
<?=$topmenu;?>
</div>

<div class="element shop-image-show no-border">

  <script type="text/javascript" src="statics/script/flash/home-flash.php<?=$runimages;?>&width=1026&height=300"></script>
</div>
<div class="element shop-left-side no-border">
    <div class="element shop-details-show element-border">
        <div class="element-header floatleft">
            <span class="floatleft">商家信息</span>

        </div>
        <ul class="simple-intro">
            <li><b>区域</b><?=$shopself['sarea'];?></li>
            <li><b>类型</b><?=$shopself['cname'];?></li>
            <li><b>主营</b><?=$shopself['mproduct'];?></li>
            <li><b>时间</b><?=$shopself['wtime'];?></li>
            <li><b>电话</b><?=$shopself['sphone'];?></li>
            <li><b>Q&nbsp;Q</b><?=$shopself['sqq'];?></li>
            <li><b>优惠</b><?=$shopself['sdiscount'];?></li>
            <li><b>地址</b><?=$shopself['saddress'];?></li>
        </ul>
        <ul>
           <li style="display:inline;color:red;border:#c67605 1px solid"><?=$shopself['sparked']?"可停车☆":"";?></li>
           <li style="display:inline;color:red;border:#c67605 1px solid"><?=$shopself['scarded']?"可刷卡☆":"";?></li>
           <li style="display:inline;color:red;border:#c67605 1px solid"><?=$shopself['sfavour']?"可优惠☆":"";?></li>
        </ul>
        <ul class="simple-intro">
           <li><b>环境</b><?=$shopself['senvs']?></li>
           <li><b>地区</b><?=$shopself['sarea']?></li>
           <li><b>路段</b><?=$shopself['sroads']?></li>
        </ul>
    </div>
    <div class="element shop-map no-border-left no-border-right">
        <div id="baidumap" style="width: 300px;height: 400px"></div>
    </div>
    <div class="element shop-new-trends element-border">
        <div class="element-header floatleft">
            <span class="floatleft">最新咨询</span>

        </div>
        <div class="element no-border margin-top10" style="margin-left:45px">
        <?php foreach($trends as $trend):?>
          <div style="width:200px;height: 190px ; text-align: center">
              <img style="width:200px;height:160px;border:#c2ccd1 2px solid" src="<?=$trend['simage']?>"/>
              <br/>
              <a href="shoptrends/view/<?=$trend['sid']?>" target="_blank"><?=$trend['sname']?></a>
          </div>
        <?php endforeach;?>
        </div>
    </div>

</div>

<div class="element shop-right-side no-border-bottom">
  <?=$shopchild?>
</div>


<div class="element shop-about">
    商家页脚
</div>
</div>

</body>
</html>