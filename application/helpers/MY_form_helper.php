<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-27
 * Time: 下午4:56
 * To change this template use File | Settings | File Templates.
 */
function home_ad($ads,$position){
    $html = "<a href='".$ads[$position]['ad_link']."' target='_blank'><img style='border:none' src='".$ads[$position]['ad_image']."'/></a>" ;
    echo $html;
}
function child_ad($name,$pos){
    $html = "<div style='width:500px;height:200px'>
    <div style='width:300px;height:228px;float:left'>
    <span class='label label-important'>AD-".$pos."</span>
                        <input name='".$name."-".$pos."-ad_link'/>
                        <input type='hidden' id='".$name."-".$pos."_image' name='".$name."-".$pos."-ad_image'/>
                        <br/>
                         <button class='btn btn-info image_selector'
                        valfor='".$name."-".$pos."_image'
                        imgfor='".$name."-".$pos."_image_view'
                        type='button'
                        >图片</button>
                        <button
                         type='button'
                         valfor='".$name."-".$pos."_image'
                         imgfor='".$name."-".$pos."_image_view'
                         class='btn resetfield'>清空</button>
    </div>
     <div style='width:200px;height:228px;float:left'>
        <img style='width:200px;height:200px' id='".$name."-".$pos."_image_view' />
     </div>
     <div style='clear:both'></div>
    </div>"
    ;

    return $html;
}