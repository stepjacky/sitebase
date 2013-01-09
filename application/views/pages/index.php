<link  href="statics/css/pages/index.css" rel="stylesheet" media="screen,print" />
<div class="element skitterpicside no-boder-bottom">
    <div class="skitterpic">
        <SCRIPT language=javascript src="statics/script/flash/home-flash.php?<?=$runimages?>&width=309&height=300" type=text/javascript></SCRIPT>
    </div>
    <div class="skitterpic">
        <?=home_ad($ads,0);?>
    </div>
</div>
<div class="element newsone element-border">
    <div class="element-header floatleft">
        <span class="floatleft">最新打折优惠</span>

    </div>
   <table class="top20shops">
       <?php foreach($top20shops as $shop):?>
    <tr>
       <td class="sname-td">[<?=$shop['cname']?>]</td>
       <td ><a  href="shop/index/<?=$shop['phone']?>" target="_blank"> <?=$shop['sname']?> </a></td>
       <td class="pdate-td" align="right"><?=date("Y-m-d", strtotime($shop['pdate']))?> </td>
    </tr>
       <?php endforeach;?>


   </table>


</div>

<div class="element ad78side no-boder-bottom">
    <div class="ad78">
    <?=home_ad($ads,1);?>
    </div>
    <div class="ad78">
    <?=home_ad($ads,2);?>
    </div>
    <div class="ad78">
    <?=home_ad($ads,3);?>
    </div>

</div>

<div class="element global-ad element-border margin-top10">
<?=home_ad($ads,4);?>

</div>
<div class="element skitterpicside element-border margin-top10 ">
    <div class="skitterpic-150">
    <?=home_ad($ads,5);?>
    </div>
    <div class="skitterpic-150">
    <?=home_ad($ads,6);?>
    </div>
    <div class="skitterpic-150">
    <?=home_ad($ads,7);?>
    </div>
    <div class="skitterpic-150">
    <?=home_ad($ads,8);?>
    </div>
</div>
<div class="element newsone margin-top10 element-border ">
    <div class="element-header floatleft">
        <span class="floatleft">最新开业商家</span>

    </div>
   <table class="top20shops">
        <?php foreach($top20artitles as $artitle):?>
        <tr>
            <td class="sname-td">[<?=$artitle['cname']?>]</td>
            <td ><a  href="artitle/index/<?=$artitle['id']?>" target="_blank"> <?=$artitle['aname']?> </a></td>
            <td class="pdate-td" align="right"><?=date("Y-m-d", strtotime($artitle['cdate']))?> </td>
        </tr>
        <?php endforeach;?>


    </table>
</div>

<div class="element ad78side element-border margin-top10 ">
    <div class="ad78">
    <?=home_ad($ads,9);?>
    </div>
    <div class="ad78">
    <?=home_ad($ads,10);?>
    </div>
    <div class="ad78">
    <?=home_ad($ads,11);?>
    </div>

</div>

<div class="element global-ad margin-top10">
<?=home_ad($ads,12);?>
</div>
<?php
   $shopidx = 0;
?>
<?php foreach($homeshops as $shopcfg):?>
<div class="element eatery-list element-border margin-top10 <?=($shopidx+2)%3==0?"margin-lr10":"" ?>">
    <div class="element-header floatleft">
        <span class="floatleft"><?=$shopcfg['morename'];?></span>
        <span class="floatright">
            <a href="<?=$shopcfg['morelink'];?>" target="_blank">MORE</a>
        </span>
    </div>
    <table style="width: 100%;height: 90%">
       <tbody>
       <tr>
           <td style="text-align: center;width: 40%">
               <img src="<?=$shopcfg['first']['pimage']?>"  style="width:110px;height: 110px;border:#e1e1e8 4px double" />
               <br/>
               <span>
                 <a href="shop/index/<?=$shopcfg['first']['phone']?>" target="_blank">
                   <?=$shopcfg['first']['name'];?>
                 </a>
               </span>
           </td>
           <td rowspan="2" valign="top" align="left" style="padding-top: 10px;padding-left: 10px">
              <?php foreach($shopcfg['shops'] as $oneshop):?>
                <div><a href="shop/index/<?=$oneshop['phone'];?>" target="_blank"><?=$oneshop['name'];?></a></div>
               <?php endforeach;?>
             </td>
       </tr>
       <tr>
           <td style="text-align: center;width: 40%">
               <img src="<?=$shopcfg['second']['pimage'];?>"  style="width:110px;height: 110px;border:#e1e1e8 2px double" />
               <br/>
               <span>
                 <a href="shop/index/<?=$shopcfg['second']['phone']?>" target="_blank">
                     <?=$shopcfg['second']['name'];?>
                 </a>
               </span>
           </td>
       </tr>
       </tbody>

   </table>
</div>
    <?php $shopidx++;?>
<?php endforeach;?>


<div class="element global-ad margin-top10">
<?=home_ad($ads,13);?>
</div>


<?php
  $artidx = 0;
?>
<?php foreach($homeartitles as $hartcfg):?>
<div class="element news-list element-border margin-top10 <?=($artidx+2)%3==0?"margin-lr10":"" ?>">
    <div class="element-header floatleft">
        <span class="floatleft"><?=$hartcfg['cname'];?></span>

    </div>
   <div class="element art-list no-border">
     <table style="width: 100%;height: auto; margin-top: 5px">
      <?php foreach($hartcfg['artitles'] as $art):?>
       <tr>
        <td align="right" style="width: 20px;">
           .
        </td>
        <td align="left" style="width: auto;">
            <a href="artitle/index/<?=$art['id']?>"
               target="_blank">
                <?=$art['name']?>
            </a>


        </td>

       </tr>
      <?php endforeach;?>
     </table>

  </div>
</div>
    <?php $artidx++; ?>
<?php endforeach;?>



