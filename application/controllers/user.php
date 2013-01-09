<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-6-3
 * Time: 下午9:57
 * To change this template use File | Settings | File Templates.
 */
class User extends MY_Controller{
    public function __construct(){
        parent::__construct("Usermodel");
    }

    public function listview($page=0,$rows=10){

        $total_rows = $this->db->count_all_results('suser');
        $config['base_url'] = 'user/listview/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $rows;
        $this->pagination->initialize($config);
        $pagelink = $this->pagination->create_links();

        $start = $rows * $page - $rows; //
        if ($start < 0) $start = 0;
        $this->db->select("sname,createDate");
        $this->db->limit($rows,$start);
        $query  = $this->db->get("suser");
        $result = $query->result_array();
        $data['datasource'] = $result;
        $data['pagelink']=$pagelink;
        $this->load->view("user/list",$data);

    }


    public function save(){
        $data = $this->_xsl_post();

        $this->db->where("sname",$data['sname']);
        $this->db->from('user');
        $num =  $this->db->count_all_results();
        if($num==0){
            $this->db->insert("user",$data);
        }else{
            $this->db->where("sname",$data['sname']);
            $this->db->update("user",$data);
        }
        $this->_success("添加/编辑用户");
    }

    public function remove($sname){
        if(!$sname) return;
        $this->db->where("sname",$sname);
        $this->db->delete("suser");
        $this->_success("删除用户");
    }
}
