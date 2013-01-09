<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午6:42
 * To change this template use File | Settings | File Templates.
 */
class Artitlemodel extends MY_Model
{


    function __construct()
    {
        // Call the Model constructor
        parent::__construct("artitle");

    }

    public function gets($page = 0, $rows = 10) {
        $start = $rows*$page - $rows; //
        if ($start<0) $start = 0;
        $sql = "select a.id as id ,a.name as name ,a.createDate as createDate,ac.name as cname,ac.id as cid
          from artitle as a join artitlecategory as ac on ac.id = a.artitle_category_id
          order by a.createDate desc ,a.artitle_category_id limit ".$start.",".$rows;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

}