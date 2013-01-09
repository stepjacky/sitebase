<h2>编辑/添加商家</h2>

<form id="shopform" target="formframe" action="shop/create" method="post" enctype="multipart/form-data" >
<table class="table table-bordered">
<tbody>
 <tr>
     <td>名称</td>
     <td>
         <input name="name" id="name_id" />
     </td>
   <td>电话</td>
   <td>
     <input name="phone" id="phone_id" />
   </td>
     <td>商家分类</td>
     <td>

         <?= form_dropdown("shop_category_id",$shopcategory)?>
     </td>
 </tr>    

 <tr>
     <td>城市</td>
     <td>
         <input name="city" id="city_id" />
     </td>
   <td>街道</td>
   <td>
     <input name="street" id="street_id" />
   </td>
     <td>地区</td>
     <td>
         <input name="area" id="area_id" />
     </td>
 </tr>
 <tr>
     <td>相关路段</td>
     <td>
         <input name="roads" id="roads_id" />
     </td>
     <td>地址</td>
     <td>
         <input name="address" id="address_id" />
     </td>
     <td>周边环境</td>
     <td>
         <input name="envs" id="envs_id" />
     </td>
 </tr>



 <tr>
     <td>摘要</td>
     <td>
         <input name="synopsis" id="synopsis_id" />
     </td>
   <td>主要经营</td>
   <td>
     <input name="main_product" id="main_product_id" />
   </td>
     <td>折扣率</td>
     <td>
         <input name="discount" id="discount_id" />
     </td>
 </tr>
 <tr>
     <td>营业时间</td>
     <td>
         <input name="worktime" id="worktime_id" />
     </td>
     <td>商务QQ</td>
     <td>
         <input name="qq" id="qq_id" />
     </td>
 </tr>

 <tr>
     <td>优惠卡</td>
     <td>
         <input type="checkbox" name="favourabled" value="1" id="favourabled_id" />
     </td>
     <td>可停车</td>
     <td>
         <input type="checkbox" name="parked" id="parked_id" value="1" />
     </td>
     <td>可打卡</td>
     <td>
         <input type="checkbox" name="carded" id="carded_id" value="1" />
     </td>
 </tr>
 <tr>
     <td>标志图片</td>
     <td>
         <input type="file" name="present_image" id="present_image_id" />
     </td>
     <td>经度</td>
     <td><input name="longitude"></td>
     <td>纬度</td>
     <td><input name="latitude"></td>
 </tr>
 <tr>
   <td>特色介绍</td>
   <td colspan="5">
     <textarea name="characteristic" id="characteristic_id" ></textarea>
   </td>

 </tr>
 <tr>
     <td>优惠活动</td>
     <td colspan="5">
         <textarea name="preferential" id="preferential_id" ></textarea>
     </td>
 </tr>
 <tr>
     <td>招聘活动</td>
     <td colspan="5">
         <textarea name="jobinfo" id="jobinfo_id" ></textarea>
     </td>
 </tr>



</tbody>
<tfoot>
  <tr>
   <td colspan="6">
      <button class="btn btn-success" id="saveBtn" type="submit">保存</button>
      <button class="btn" type="reset">重置</button>      
   </td>

  </tr>
</tfoot>     
</table>
</form>
<script type="text/javascript" src="statics/script/apps/shop/get.js" ></script>