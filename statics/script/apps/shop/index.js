/**
  * 生成By php.ci generator
  * 
  *
  */
$(function(){
    var map = new BMap.Map("baidumap");            // 创建Map实例
    var point = new BMap.Point(lon?lon:116.404, lat?lat:39.915);    // 创建点坐标
    map.centerAndZoom(point,15);                     // 初始化地图,设置中心点坐标和地图级别。
});