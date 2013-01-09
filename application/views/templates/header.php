<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$title;?></title>
    <base href="<?=base_url()?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="statics/script/jquery-1.7.1.js"></script>
    <link charset="utf-8" href="statics/script/isotope/css/style.css" rel="stylesheet" media="screen"/>
    <script type="text/javascript" src="statics/script/isotope/jquery.isotope.js"></script>
    <link charset="utf-8" href="statics/css/index.css" rel="stylesheet" media="screen"/>
    <link rel="stylesheet" href="statics/css/mainmenu/navigation.css" media="screen"/>
    <link rel="stylesheet" href="statics/css/bootstrap/css/bootstrap.css" media="screen"/>
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="statics/css/bootstrap/js/html5.js"></script>
    <![endif]-->

    <!--[if IE 6]>
       <link href="statics/css/bootstrap/css/ie/ie6.css" rel="stylesheet">
    <![endif]-->

</head>
<body>
<div class="row-fluid">
    <div class="span12">
        <div class="alert alert-info">
            推荐使用
            <a href="http://www.google.cn/chrome/intl/zh-CN/landing_chrome.html?hl=zh-CN&brand=CHMI">
                Chrome
            </a>
            ,
            <a href="http://firefox.com.cn/">
                Firefox
            </a>
            IE浏览器推荐安装
            <a href="http://www.google.com/chromeframe" target="_blank">chromeframe</a>
            浏览此网页,以获得最佳效果
        </div>
    </div>

</div>
<div id="container" class="variable-sizes clearfix">
    <ul class="breadcrumb">
        <li>
          <span style="color:green;">您好,欢迎光临78商家联盟</span>
        </li>
        <li>|</li>
        <li>
            商务电话: <span style="color:red">400787801</span>
        </li>
        <li>|</li>
        <li>商务QQ: <span style="color:red">888888</span></li>
    </ul>

    <div class="element logo no-border">

    </div>


    <div class="element logoside no-border">

    </div>
   <?php
    $menus = array(
        "eat"=>"餐饮",
        "shopping"=>"购物",
        "entertainment"=>"娱乐",
        "home"=>"家居",
        "live"=>"生活",
        "business"=>"商务",
        "walk"=>"出行",
        "body-building"=>"健身",
        "train"=>"培训"
    );
   ?>
    <div class="element mainmenu no-border">
        <div class="red">
            <div id="slatenav">
                <ul>
                    <li class="current"><a href="pages"><span>首页</span></a></li>
                    <?php while($page = key($menus)){?>
                    <li><a href="pages/child/<?=$page?>"><span><?=$menus[$page];?></span></a></li>
                   <?php
                       next($menus);
                     } ?>
                    <li><a href="#"><span>论坛</span></a></li>
                </ul>
            </div>
        </div>
</div>
    <div class="element search-bar no-border margin-top10 margin-bottom10">
      <form class="well form-inline" method="post" action="shop/search" target="_self">

          <label>区域</label>
          <input  name="area" class="input-small" placeholder="区域">
          <label>街道</label>
          <input  name="street" class="input-small" placeholder="街道">
          <label>类型</label>
          <select name="shop_category_id" style="width:120px">
              <option value="no">请选择分类</option>
              <?php foreach($shopcategory as $cate):?>
                <option value="<?=$cate['id'];?>-<?=$cate['name'];?>"><?=$cate['name'];?></option>
              <?php endforeach;?>
          </select>

          <label>关键字</label>
          <input name="word" />
          <label class="checkbox">
              <input name="favourabled" type="checkbox" value="是">优惠卡
          </label>
          <label class="checkbox">
              <input name="parked" type="checkbox" value="是">停车
          </label>
          <label class="checkbox">
              <input name="carded" type="checkbox" value="是">刷卡
          </label>
          <button class="btn btn-inverse" type="submit"><i class="icon-search icon-white"></i>   搜索</button>
      </form>

</div>



    <!-- container 未完   -->