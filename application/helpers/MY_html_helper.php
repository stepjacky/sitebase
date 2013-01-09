<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-31
 * Time: 下午9:05
 * To change this template use File | Settings | File Templates.
 */
function a_img_blank($pos,&$ads){
    $img_props = array(
        "src"=>$ads[$pos]['ad_image'],
        "class"=>"no-border"

    );
    $html = "<a href='".$ads[$pos]['ad_link']."' target='_blank'> "
    .img($img_props)
    ."</a>"
    ;
    return $html;
}