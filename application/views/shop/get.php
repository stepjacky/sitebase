<form id="shopform">
<input type="hidden" id="action" value="shop/update" />
<fieldset>
<lengend>编辑</lengend>
<table class="table table-bordered">
<tbody>
 <tr>
   <td>电话</td>
   <td>
     <input name="phone" id="phone_id" value="<?=$data['phone']?>" />
   </td>
 </tr>    
 <tr>
   <td>商家分类</td>
   <td>
     <input name="shop_category_id" id="shop_category_id_id" value="<?=$data['shop_category_id']?>" />
   </td>
 </tr>    
 <tr>
   <td>街道</td>
   <td>
     <input name="street" id="street_id" value="<?=$data['street']?>" />
   </td>
 </tr>    
 <tr>
   <td>优惠</td>
   <td>
     <input name="preferential" id="preferential_id" value="<?=$data['preferential']?>" />
   </td>
 </tr>    
 <tr>
   <td>标志图片</td>
   <td>
     <input name="present_image" id="present_image_id" value="<?=$data['present_image']?>" />
   </td>
 </tr>    
 <tr>
   <td>可停车</td>
   <td>
     <input name="parked" id="parked_id" value="<?=$data['parked']?>" />
   </td>
 </tr>    
 <tr>
   <td>周边环境</td>
   <td>
     <input name="envs" id="envs_id" value="<?=$data['envs']?>" />
   </td>
 </tr>    
 <tr>
   <td>城市</td>
   <td>
     <input name="city" id="city_id" value="<?=$data['city']?>" />
   </td>
 </tr>    
 <tr>
   <td>折扣</td>
   <td>
     <input name="discount" id="discount_id" value="<?=$data['discount']?>" />
   </td>
 </tr>    
 <tr>
   <td>招聘信息</td>
   <td>
     <input name="jobinfo" id="jobinfo_id" value="<?=$data['jobinfo']?>" />
   </td>
 </tr>    
 <tr>
   <td>编号</td>
   <td>
     <input name="id" id="id_id" value="<?=$data['id']?>" />
   </td>
 </tr>    
 <tr>
   <td>地区</td>
   <td>
     <input name="area" id="area_id" value="<?=$data['area']?>" />
   </td>
 </tr>    
 <tr>
   <td>地址</td>
   <td>
     <input name="address" id="address_id" value="<?=$data['address']?>" />
   </td>
 </tr>    
 <tr>
   <td>名称</td>
   <td>
     <input name="name" id="name_id" value="<?=$data['name']?>" />
   </td>
 </tr>    
 <tr>
   <td>优惠卡</td>
   <td>
     <input name="favourabled" id="favourabled_id" value="<?=$data['favourabled']?>" />
   </td>
 </tr>    
 <tr>
   <td>主要经营</td>
   <td>
     <input name="main_product" id="main_product_id" value="<?=$data['main_product']?>" />
   </td>
 </tr>    
 <tr>
   <td>摘要</td>
   <td>
     <input name="synopsis" id="synopsis_id" value="<?=$data['synopsis']?>" />
   </td>
 </tr>    
 <tr>
   <td>特色介绍</td>
   <td>
     <input name="characteristic" id="characteristic_id" value="<?=$data['characteristic']?>" />
   </td>
 </tr>    
 <tr>
   <td>可打卡</td>
   <td>
     <input name="carded" id="carded_id" value="<?=$data['carded']?>" />
   </td>
 </tr>    
 <tr>
   <td>营业时间</td>
   <td>
     <input name="worktime" id="worktime_id" value="<?=$data['worktime']?>" />
   </td>
 </tr>    
 <tr>
   <td>相关路段</td>
   <td>
     <input name="roads" id="roads_id" value="<?=$data['roads']?>" />
   </td>
 </tr>    
 <tr>
   <td>商务QQ</td>
   <td>
     <input name="qq" id="qq_id" value="<?=$data['qq']?>" />
   </td>
 </tr>    
</tbody>
<tfoot>
  <tr>
   <td>
      <button class="btn btn-success" type="button">保存</button>
      <button class="btn" type="reset">重置</button>      
   </td>
   <td></td>
  </tr>
</tfoot>     
</table>
</fieldset>
</form>
<script src="statics/scripts/app/shop/get.js"></script>
<link href="statics/css/app/shop/get.css" rel="styleSheet" media="screen"/>