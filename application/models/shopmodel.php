<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午6:42
 * To change this template use File | Settings | File Templates.
 */
class Shopmodel extends MY_Model
{


    function __construct()
    {
        // Call the Model constructor
        parent::__construct("shop");
        $this->set_select_fields(array("id","name","shop_category_id"));
    }

}