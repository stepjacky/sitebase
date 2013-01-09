<script src="statics/script/apps/admin/child.js" type="text/javascript"></script>
<?php
   $labels = array(
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
<h2>子页内容配置</h2>
<div class="tabbable">
    <ul class="nav nav-tabs">
       <?php while($key = key($labels)){?>
         <li

             ><a
             href="#<?=$key?>" data-toggle="tab"><?=$labels[$key]?>板块</a></li>
       <?php
          next($labels);
        } ?>

    </ul>
    <div class="tab-content">
        <?php
           reset($labels);
        while($key = key($labels)){?>
        <div class="tab-pane" id="<?=$key?>">
           <form target="formframe" method="post" action="manager/savechild/<?=$key?>">
            <table class="table table-bordered">
               <caption><?=$labels[$key]?>设置</caption>
                <tbody>
                  <tr>
                    <td>
                        <?=child_ad($key,"first")?>
                    </td>
                    <td>
                        <?=child_ad($key,"second")?>
                    </td>

                  </tr>
                  <tr>
                      <td> <?=child_ad($key,"third")?></td>
                      <td> <?=child_ad($key,"fourth")?></td>
                  </tr>
                  <tr>
                    <td> <?=child_ad($key,"fifth")?></td>
                  </tr>
                <tr>
                   <td>
                       商家分类
                       <?=form_dropdown($key."-shop_category_id",$shopcategory)?>
                   </td>
                   <td></td>
                </tr>
                </tbody>
                <tfoot>
                 <tr>
                   <td colspan="2">
                      <button class="btn btn-warning" type="submit">
                          <i class="icon-edit icon-white"></i>
                          保存</button>
                       <span class="label label-important">不想更改的项请不要选择</span>
                   </td>
                 </tr>
                </tfoot>
            </table>
           </form>
        </div>
        <?php
            next($labels);
         } ?>
    </div>