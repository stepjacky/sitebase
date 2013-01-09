<link href="statics/css/children.css" media="screen" rel="stylesheet" />
<div class="element search-shop-left">
<?=a_img_blank("first",$ads);?>
</div>
<div class="element children-head-news element-border margin-lr10">
    <div class="element-header floatleft">
        <span class="floatleft">最新优惠</span>

    </div>
 <table style="width:100%;border:none;">
  <?php foreach($top12news as $news):?>
   <tr>
     <td style="color:#e13300;width:80px;">[<?=$news['cname']?>]</td>
     <td align="left">
        <a href="artitle/index/<?=$news['id']?>"
           target="_blank">
         <?=$news['name']?>
         </a>
     </td>
     <td style="width: 100px;font-size:12px;text-align: right">
         <?=date("Y-m-d",strtotime($news['createDate']))?></td>
   </tr>
  <?php endforeach;?>
 </table>
</div>
<div class="element ad-right ">
<?=a_img_blank("second",$ads);?>
</div>
<div class="element ad-right ">
<?=a_img_blank("third",$ads);?>
</div>
<div class="element global-ad margin-top10">
<?=a_img_blank("fourth",$ads);?>

</div>

<!-- 商家详细开始 -->
<?php foreach($datasource as $shop):?>
<div class="element sigle-shop-detail margin-top10">
  <div class="shop-detail-image">
        <?=$shop['present_image']?>
  </div>
  <div class="shop-detail-other">

    <ul>
        <li>名称:<?=$shop["name"]?></li>
        <li>城市:<?=$shop["city"]?> 区域:<?=$shop["area"]?></li>
        <li>街道:<?=$shop["street"]?></li>
        <li>电话:<?=$shop["phone"]?>
        <a href="shop/index/<?=$shop["phone"]?>/preferential/3">
           查看促销
        </a>
        </li>
        <li>地址:<?=$shop["address"]?> </li>
        <li>折扣:<?=$shop["discount"]?></li>

    </ul>

  </div>
</div>
<?php endforeach;?>
<div class="element shop-nav-toolbar margin-top10">
    <?=$pagelink;?>
</div>
<div class="element global-ad margin-top10">
   <?=a_img_blank("fifth",$ads);?>
</div>
<!-- 商家详细结束 -->