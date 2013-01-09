<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午5:55
 * To change this template use File | Settings | File Templates.
 */
class Shoptrends extends MY_Controller
{
    function __construct(){
        parent::__construct("Shoptrendsmodel");
    }

    public function listbyshop($sid,$page=0,$rows=10){
        $start = $rows*$page - $rows; //
        if ($start<0) $start = 0;
        $sql = "select t.id as id,t.name as name ,t.createDate as createDate,
                s.id as sid,s.phone as phone,s.name as sname from shoptrends as t join shop as s
                on s.id = ".$sid." where t.shop_id=".$sid."  limit ".$start.",".$rows;
        $query = $this->db->query($sql);

        $this->db->where('shop_id', $sid);
        $this->db->from("shoptrends");
        $total_rows =  $this->db->count_all_results();

        $config['uri_segment'] = 4;
        $config['base_url'] = 'shoptrends/listbyshop/'.$sid."/";
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $rows;

        $this->pagination->initialize($config);
        $pagelink =  $this->pagination->create_links();
        $data['datasource'] = $query->result_array();
        $data['pagelink']=$pagelink;
        $this->load->view("shoptrends/list",$data);
    }

    public function view($id){
        if(!$id) return;
        $this->db->select("name,present_image,content,createDate");
        $this->db->where("id",$id);
        $query = $this->db->get("shoptrends");
        $data = $query->first_row("array");
        $this->load->view("shoptrends/view",$data);
    }

    public function remove($id){
        if(!$id)return;
        $this->db->where("id",$id);
        $this->db->delete("shoptrends");
        $this->_success("删除商家咨询");
    }
        
}