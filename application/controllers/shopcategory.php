<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午5:55
 * To change this template use File | Settings | File Templates.
 */
class Shopcategory extends ShopController
{
    function __construct(){
        parent::__construct("Shopcategorymodel");
    }

    public function create(){
        $this->form_validation->set_rules('name', '分类名称', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('common/formfailed');
        }
        else
        {

            $data = $this->input->post(NULL,TRUE);

            $this->modelInst->create($data);

        }

    
    }
    
    public function remove($id){
        $this->db->select("id");
        $this->db->where("shop_category_id",$id);
        $query = $this->db->get("shop");
        $result = $query->result_array();
        foreach($result as $shop){
            $sid = $shop['id'];
            $this->_remove_shop($sid);
        }
        $this->_success("删除商家分类成功!");
    }
    
    public function update(){
    
    }
    
    public function get($id=0){
    
    }

        
}