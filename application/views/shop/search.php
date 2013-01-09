<link href="statics/css/search.css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="statics/script/apps/shop/search.js"></script>
<div class="element search-message element-border">
    您搜索条件是 :  <?=$message;?>
</div>
<div class="element search-content element-border">
    <div class="search-box-results">
       <?php foreach($qshops as $shop):?>
        <div class="search-box-result">
           <table width="100%" class="result-table">
              <tr>
               <td align="center" class="image-td">
                  <img src="<?=$shop['pimage'];?>" class="pimage"  />
               </td>
               <td>
                  <ul class="info-detail">
                   <li><span class="title">名称</span><span  class="sinfo"><?=$shop['name'];?></span></li>
                   <li><span class="title">区域</span><span class="sinfo"><?=$shop['area'];?></span></li>
                   <li><span class="title">类型</span><span class="sinfo"><?=$shop['cname'];?></span></li>
                   <li><span class="title">主营</span><span class="sinfo"><?=$shop['mpdt'];?></span></li>
                   <li><span class="title">电话</span><span class="sinfo"><?=$shop['phone'];?></span></li>
                   <li><span class="title">地址</span><span class="sinfo"><?=$shop['address'];?></span></li>
                   <li><span class="title">打折</span><span class="sinfo"><?=$shop['discount'];?></span></li>
                  </ul>
               </td>
               <td valign="bottom" align="center">

                  <a class="btn btn-warning" href="shop/index/<?=$shop['phone'];?>">去看看</a>
               </td>
              </tr>

           </table>
        </div>
       <?php endforeach;?>
        </div>
</div>

<div class="element search-main-side no-border">
  <div class="search-disshop element-border">
      <div class="element-header floatleft">
          <span class="floatleft">优惠卡商家</span>

      </div>
      <ul>
        <?php foreach($disshops as $nshop):?>
        <li>
          <a
              href="shop/index/<?=$nshop['phone'];?>"
              target="_blank"
              >
              <?=$nshop['name'];?>
              </a>

        </li>
        <?php endforeach;?>
      </ul>
  </div>

  <div class="newly-info-list element-border">
      <div class="element-header floatleft">
          <span class="floatleft">最新优惠信息</span>
      </div>
      <ul>
      <?php foreach($trendsartitles as $art):?>
       <li>
          <a
              href="artitle/index/<?=$art['id']?>"
              target="_blank"
              >
              <?=$art['name'];?>

              </a>
       </li>
      <?php endforeach;?>
      </ul>
  </div>
  <div class="contact-info element-border">
      <div class="element-header floatleft">
          <span class="floatleft">联系客服</span>

      </div>

  </div>
  <div class="focus-us element-border">
      <div class="element-header floatleft">
          <span class="floatleft">关注我们</span>

      </div>

  </div>
</div>
<div class="element search-nav element-border">
 <form id="sform" action="shop/search" target="_self" method="post">
      <?php while($key = key($querys)){?>
          <input type="hidden" name="<?=$key?>"  value="<?=$querys[$key];?>" />
      <?php
           next($querys);
          } ?>

      <div class="floatright"><?=$pagelink;?></div>
 </form>
</div>
<div class="element search-main-ad">

</div>
