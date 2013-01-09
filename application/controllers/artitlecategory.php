<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午5:55
 * To change this template use File | Settings | File Templates.
 */
class Artitlecategory extends ArtitleController
{
    function __construct(){
        parent::__construct("Artitlecategorymodel");
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
        $this->_remove($id);
        $this->_success("删除文章分类");
    }

    protected function _remove($id){
        $this->db->where("artitle_category_id",$id);
        $this->db->delete("homeartitle");
        $this->_remove_artitle_by_category($id);
        $this->db->where("id",$id);
        $this->db->delete($this->modelInst->getTable());
    }
    public function update(){

    }

    public function get($id=0){

    }

    public function gets($start=0,$rows=10){


    }
        
}