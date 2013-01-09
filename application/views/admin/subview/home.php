<script src="statics/script/apps/admin/homemgr.js" type="text/javascript"></script>
<h2>主页内容配置</h2>


<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#1" data-toggle="tab">广告设置</a></li>
        <li><a href="#2" data-toggle="tab">店家设置</a></li>
        <li><a href="#3" data-toggle="tab">文章设置</a></li>
        <li><a href="#4" data-toggle="tab">其他设置</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="1">
                <table class="table table-bordered">
                    <caption>主页广告设置</caption>
                    <tbody>
                    <?php for($r=0;$r<14;$r++){?>
                         <?php if($r%4==0){?><tr> <?php }?>
                           <td>
                               <span class="label label-info">AD <?=$r?></span>

                               <input name='<?=$r?>-ad_link' id='ad_link_<?=$r?>' />
                               <button type='button' class='btn btn-info img_selector' imgfor='ad_image_<?=$r?>' imgview='ad_image_view_<?=$r?>'>图片</button>
                               <button type='button' class='btn btn-warning saveadone' p='<?=$r?>'>保存</button>
                               <input class='ad_image' type='hidden' name='<?=$r?>-ad_image' id='ad_image_<?=$r?>' />
                            </td>
                               <td style="width: 50px;height: 50px">
                                   <img id='ad_image_view_<?=$r?>' style='width:50px;height:50px'  />
                               </td>
                         <?php if(($r+1)%4==0){?></tr><?php } ?>

                    <?php } ?>


                    <tr>
                        <td colspan="4">
                            <button class="btn btn-warning" id="saveAdAll">
                                <i class="icon-edit"></i>
                                保存全部
                            </button>
                        </td>

                    </tr>

                    </tbody>
                </table>

        </div>
        <div class="tab-pane" id="2">

            <form>
                <table class="table table-bordered">
                    <caption>主页商家设置</caption>
                    <tbody>

                  <?php for($c=0;$c<9;$c++){?>
                   <?php if($c%3==0){?>
                      <tr>
                   <?php }?>
                      <td style="width: 404px;height: 206px;">

                          <span class="label label-info">MORE:</span>
                          <input id="shopmore<?=$c?>" />
                          <br/>
                          <span class="label label-info">NAME:</span>
                          <input id="shopmore<?=$c?>_name" />
                       <div style="width:404px;height: 150px">
                           <div style="190px;height: 150px;float: left;">
                               <select id="shopSelect_<?=$c?>"  size="10" style="width: 150px;height: 150px">


                               </select>
                           </div>
                           <div style="width: 20px;height: 150px;float: left; vertical-align:middle; ">

                                <button type="button" fromid="shopSelect_<?=$c?>" toid="topshop_<?=$c?>" class="btn btn-info moveshop">&gt;</button>
                                <button type="button" fromid="topshop_<?=$c?>" toid="shopSelect_<?=$c?>" class="btn btn-info moveshop">&lt;</button>
                           </div>
                           <div style="width: 190px;height: 150px;float: right;">
                               <select id="topshop_<?=$c?>"  size="10" style="width: 150px;height: 150px">

                               </select>
                           </div>
                       </div>
                          <div style="width: 404px;height: 30px;text-align: center;background-color: #90CDFF;">
                              <button class="btn btn-info nineshopbtn" p="<?=$c?>" forid="shopSelect_<?=$c?>"  type="button">选择</button>
                              <button class="btn btn-warning saveone" p="<?=$c?>" type="button">保存</button>
                          </div>

                      </td>

                   <?php if(($c+1)%3==0){?>
                      </tr>
                   <?php }?>


                  <?php }?>
                    </tbody>

                    <tfoot>
                    <tr>

                        <td colspan="3">
                            <button id="saveBtn" class="btn btn-warning" type="button">
                                <i class="icon-edit"></i>
                                保存全部</button>

                        </td>
                    </tr>

                    </tfoot>

                </table>
            </form>
        </div>
        <div class="tab-pane" id="3">
         <form action="manager/saveart" target="formframe" method="post">
            <table  class="table table-bordered">
             <?php for($r=0;$r<6;$r++) {?>
              <?php if($r%3==0){?> <tr> <?php }?>
              <td><?=form_dropdown("position_".$r,$artitlecategory)?></td>
              <?php if(($r+1)%3==0){?> </tr> <?php }?>

            <?php }?>
            <tfoot>
              <tr>
                <td colspan="3">
                    <button class="btn btn-primary" id="saveArt">保存</button>

                </td>

              </tr>

            </tfoot>
          </table>
         </form>
        </div>
        <div class="tab-pane" id="4">
          <form action="manager/saverunimg" target="formframe" method="post">
             <table class="table table-bordered">
              <?php for($c=0;$c<5;$c++){?>
                 <tr>
                 <td style="width:20%">
                   <button type="button" class="btn btn-success imagerun" imgfor="img_var_<?=$c;?>" imgview="img_<?=$c?>_view" >选择图片</button>
                   <input name="image_path[]" type="hidden" id="img_var_<?=$c?>"/>

                 </td>
                 <td>
                   <img style="width:100px;height: 100px; border:none" id="img_<?=$c?>_view" />
                 </td>
               </tr>
             <?php }?>
                 <tr>
                    <td colspan="2">
                        <button class="btn btn-primary">保存</button>
                        <span class="label label-warning">以前设置会被清空!</span>
                    </td>
                 </tr>
             </table>
          </form>
        </div>
    </div>
</div>


<iframe name="formframe" frameborder="0" style="display: none"></iframe>