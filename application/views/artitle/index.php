<link href="statics/css/artitle.css" rel="stylesheet" media="screen" />
<div class="element artitle-head">
    <ul class="breadcrumb">
        <li>
            <a href="pages">主页</a> <span class="divider">/</span>
        </li>
        <li>
            文章浏览<span class="divider">/</span>
        </li>
        <li><?=$artitle['name'];?></li>
    </ul>
</div>
<div class="element artitle-content ">
  <div class="artitle-content-head">
 <?=$artitle['name'];?>
  </div>
  <div class="artitle-content-toolbar">
      <?=$artitle['createDate'];?>&nbsp; 来自:<?=$artitle['sourcefrom']?>&nbsp; 人气 :<?=$artitle['clicknum']?>
  </div>

  <div class="artitle-content-summary">
      <?=$artitle['content'];?>

  </div>
</div>

<div class="element artitle-recommend element-border">
  <div class="element artitle-recommend-head">

  </div>
 <div class="element-header floatleft">
        <span class="floatleft">推荐商家</span>

 </div>
 <?php foreach($shops as $shop):?>
  <div class="element artitle-recommend-shop">
    <div class="artitle-recommend-shop-img">
     <img src="<?=$shop['pimage'];?>" style="width:120px;height: 85px; border: #efefef 5px  double" />
    </div>
    <div class="artitle-recommend-shop-info">
      <ul style="list-style: none;">
         <li><a href="shop/index/<?=$shop['phone']?>" target="_blank"><?=$shop['name']?></a></li>
         <li><?=$shop['pdate'];?></li>
      </ul>
    </div>
  </div>
  <?php endforeach;?>

    <div class="artitle-hots ">
        <div class="element-header floatleft">
            <span class="floatleft">最新热点</span>

        </div>
       <table style="margin-left: 10px; width: 98%;height:auto;;">
        <?php foreach($hotartitles as $hartitle):?>
         <tr style="line-height: 20px;">
            <td><a href="artitle/index/<?=$hartitle['id'];?>" target="_blank"><?=$hartitle['name']?></a></td>

         </tr>
         <?php endforeach;?>

       </table>
    </div>
</div>


<div class="element artitle-navigate-bar margin-top10">

</div>
