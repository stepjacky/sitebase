<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-13
 * Time: 下午2:29
 * To change this template use File | Settings | File Templates.
 */
class MY_Controller extends CI_Controller
{
     protected $modelName="";
     protected $modelInst=null;
     protected $data = array();
     public function __construct(){
         parent::__construct();
         if(func_num_args()==1){
             $this->modelName=func_get_arg(0);
             $this->load->model($this->modelName);
             $this->modelInst = new $this->modelName();

         }
         $this->load->library('firephp');
         $this->load->helper('url');
         $this->load->helper('file');
         $this->load->helper('form');
         $this->load->helper('html');
         $this->load->library('pagination');
         $this->load->library('form_validation');
         $this->load->library('upload');
         $this->load->helper('date');
         $this->load->library('session');
         $this->load->helper('cookie');
    }

    public function listview($page=0,$rows=10){

        $result =  $this->modelInst->gets($page,$rows);
        $pagelink = $this->modelInst->page_link();
        $data['datasource'] = $result;
        $data['pagelink']=$pagelink;
        $this->load->view($this->modelInst->getTable()."/list",$data);

    }

    public function pages($page){
        $this->load->view($this->modelInst->getTable()."/".$page);
    }

    public function download($filename){

        header("Content-type: application/octet-stream");//FILE流
        header("Accept-Ranges: bytes");
        header("Accept-Length: 1024");//提示将要接收的文件大小
        header("Content-Disposition: attachment; filename=$filename"); //提示终端浏览器下载操作
    }

    protected  function _xsl_post(){
        return $this->input->post(NULL,TRUE);
    }

    protected  function _no_xsl_post(){
        return $this->input->post();
    }

    protected function _post_exists($key,&$data){
        if(!isset($data[$key]) || !$data[$key]) return FALSE;
        return TRUE;

    }

    protected  function _search_data(&$data){

        $this->db->select("id,name");
        $query = $this->db->get("shopcategory");
        $result = $query->result_array();
        $data['shopcategory'] = $result;
    }

    protected  function _success($msg)
    {
        $vdata['message'] = $msg;
        $this->load->view("common/formsuccess", $vdata);
    }
    protected  function _failure()
    {
        $vdata['message'] = "行动失败";
        $this->load->view("common/formsuccess", $vdata);
    }


    public function firelog($msg=""){
        $this->firephp->log($msg);
    }
}

class ShopController extends MY_Controller{
    public function __construct(){
        if(func_num_args()==1){
            $tname=func_get_arg(0);
            parent::__construct($tname);
        }else{
            parent::__construct();
        }

        $this->load->database();
    }

    protected function _remove_shop($id){
        if(!$id) $this->_failure();
        $tables = array('shopcommit', 'shopplayimage', 'shopproductimage','shoptrends');
        $this->db->where('shop_id', $id);
        $this->db->delete($tables);
        $tables = array("homeshop");
        $this->db->where("first_shop_id",$id);
        $this->db->or_where('second_shop_id', $id);
        $this->db->delete($tables);
        //$this->db->or_where_in("");
        $tables = array("shop");
        $this->db->where("id",$id);
        $this->db->delete($tables);

        //如果删除的商家在homeshop.shop_list中则较麻烦
        $this->db->select("position,shop_list");
        $this->db->where("find_in_set('".$id."',shop_list)>0");
        $query = $this->db->get("homeshop");
        $result = $query->result_array();
        foreach($result as $hsp){
            $shop_list = preg_split("/\,/",$hsp['shop_list']);
            array_splice($shop_list,array_search($id,$shop_list),1);
            $this->db->set("shop_list",join(",",$shop_list));
            $this->db->where("position",$hsp['position']);
            $this->db->update("homeshop");
        }


    }
}

class ArtitleController extends MY_Controller{
    public function __construct(){
        if(func_num_args()==1){
            $tname=func_get_arg(0);
            parent::__construct($tname);
        }else{
            parent::__construct();
        }

        $this->load->database();
    }

    protected function _remove_artitle_by_category($cid){
        if(!$cid)return;
        $this->db->where("artitle_category_id",$cid);
        $this->db->delete("artitle");
    }



}