<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-6-3
 * Time: 下午10:08
 * To change this template use File | Settings | File Templates.
 */
class Usermodel extends MY_Model{
    public function __construct(){
        parent::__construct("user");
        $this->set_select_fields(array("sname","createDate"));

    }

}
