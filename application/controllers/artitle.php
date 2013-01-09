<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午5:55
 * To change this template use File | Settings | File Templates.
 */
class Artitle extends ArtitleController
{
    function __construct(){
        parent::__construct("Artitlemodel");
    }

    public function create(){
        $data = $this->_no_xsl_post();
        if ($this->upload->do_upload("present_image")){
            unset($data['present_image_value']);
            $uploaddata = $this->upload->data();
            $uploaddata['web_path']='statics/image/upload/';
            $this->db->insert('picture', $uploaddata);
            $data['present_image'] = $uploaddata['web_path'].$uploaddata['file_name'];
            $this->firelog($data);
        }else{
            $pimage = $data['present_image_value'];
            $data['present_image'] = $pimage;
            unset($data['present_image_value']);
        }

        $this->modelInst->create($data);
        $message['message']="添加/修改文章";
        $this->load->view("common/formsuccess",$message);

    
    }
    
    public function remove($id){
        $this->_remove($id);
        $this->_success("删除文章");
    }
    
    public function view($id=-1){
          if($id==-1) {
              show_error("artitle not found ","Error");
              return;
          }
          $this->db->select('id, content,present_image,name,createDate,sourcefrom');
          $query = $this->db->get_where($this->modelInst->getTable(), array('id' => $id));
          $result = $query->first_row('array');

          $this->load->view("artitle/view",$result);
    
    }
    public function index($id){
        if($id==-1) {
            show_error("artitle not found ","Error");
            return;
        }
        $this->db->select('id, content,present_image,name,createDate,sourcefrom,clicknum');
        $query = $this->db->get_where($this->modelInst->getTable(), array('id' => $id));
        $aresult = $query->first_row('array');
        $data['artitle'] = $aresult;
        $data['title'] = $aresult['name'];
        $this->firelog($data);
        $sql = "select id as id,phone as phone,present_image as pimage,name as name,preferential_date as pdate
          from shop order by preferential_date desc limit 7
        ";

        $query = $this->db->query($sql);
        $shops = $query->result_array();
        $data['shops'] = $shops;

        $sql="select id ,name from artitle order by createDate desc limit 20";
        $query =  $this->db->query($sql);
        $result = $query->result_array();
        $data['hotartitles'] = $result;
        $this->_search_data($data);
        $this->load->view('templates/header',$data);
        $this->load->view('artitle/index',$data);
        $this->load->view('templates/footer',$data);
    }
    public function editnew($id=-1){
        $query = $this->db->get("artitlecategory");
        $results = $query->result_array();
        $category = array();
        foreach ($results as $rst) {
            $category[$rst['id']]=$rst['name'];
        }
        $data['category'] = $category;
         if($id!=-1){
            //更新文章...
             $this->db->where("id",$id);
             $query = $this->db->get("artitle");
             $data['item'] =  $query->first_row('array');
         }else{
             //添加文章
             $data['item'] = $this->modelInst->emptyObject();

         }
         $this->load->view("artitle/edit",$data);
    }

    protected function _remove($id){
        $this->db->where("id",$id);
        $this->db->delete("artitle");

    }

    public function gets($start=0,$rows=10){
       
    
    }
        
}