<div class="element shop-details-more element-border">
    <div class="element-header floatleft">
        <span class="floatleft">商家介绍</span>

    </div>
    <?=$shopdata['synopsis']?>
</div>
<div class="element shop-prefer-action element-border">
    <div class="element-header floatleft">
        <span class="floatleft">优惠信息</span>

    </div>
    <?=$shopdata['preferential']?>
</div>
<div class="element shop-charactics element-border">
    <div class="element-header floatleft">
        <span class="floatleft">特色介绍</span>

    </div>
    <?=$shopdata['characteristic']?>
</div>

<div class="element element-header floatleft">
    <span class="floatleft">产品展示</span>

</div>
<div class="element shop-product-run">
    <ul id="scroller">
       <?php foreach ( $pdtimages as $pdtimg):?>
        <li><a href="<?=$pdtimg['simage'];?>" target="_blank">
            <img src="<?=$pdtimg['simage'];?>" style="margin-left:5px;margin-right:5px;border:#e0e0e0 10px double;width: 130px;height: 130px;"></a></li>
       <?php endforeach;?>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        $("#scroller").simplyScroll();
    });
</script>