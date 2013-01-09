<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-20
 * Time: 下午4:34
 * To change this template use File | Settings | File Templates.
 */
class Picturemodel extends MY_Model
{
    public function __construct(){
        parent::__construct("picture");
        $this->row_per_page=5;
    }

}
