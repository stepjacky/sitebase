<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">网站后台管理系统</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="#">主页</a></li>
                    <li><a href="#about">关于</a></li>
                    <li><a href="#contact">联系我们</a></li>
                </ul>
                <p class="navbar-text pull-right">欢迎你 , <?=$loginuser?>
                    <a href="admin/logout">注销</a>
                </p>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container-fluid">
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

    <div class="row-fluid">

        <div class="span3">
            <div class="well sidebar-nav">
                <ul class="ztree" id="navTree"></ul>
            </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            <div class="hero-unit mainContent  height500" id="mainContent">
               欢迎来到后台管理系统
            </div>
        </div><!--/span-->
    </div><!--/row-->

    <hr>

    <footer>
        <p>&copy; 西安汉图网络公司 2012</p>
    </footer>

</div><!--/.fluid-container-->