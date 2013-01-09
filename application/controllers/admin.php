<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 汉图
 * Date: 12-1-18
 * Time: 下午11:08
 * To change this template use File | Settings | File Templates.
 */
class Admin extends MY_Controller
{
    public function __construct(){
       parent::__construct();
        $this->load->database();


    }
    public function data()
    {
      $json = read_file('./statics/script/apps/admin/navtree.js');
      header("Content-Type: application/json; charset=UTF-8");
      echo $json;
        //echo json_encode($nodes);
    }

    public function backnd(){
        $this->load->view('admin/backnd');
    }

    public function signin(){
       $data =   $this->_xsl_post();
       $this->db->where("sname",$data['sname']);
       $this->db->where("spass",$data['spass']);
       $num = $this->db->count_all_results("suser");
       if($num==0){
           $this->login();
       }else{
           $this->db->where("sname",$data['sname']);
           $this->db->where("spass",$data['spass']);
           $query =  $this->db->get("suser");
           $result =  $query->first_row("array");
           $this->session->set_userdata($result);
           $this->index();
       }
    }

    public function logout(){
        $items = array('sname' => '', 'spass' => '','createDate'=>'');
        $this->session->unset_userdata($items);
        $this->session->sess_destroy();
        delete_cookie("ci_session");
        $this->login();
    }

    public function kickall(){
        $usersess = $this->session->all_userdata();
        $this->db->truncate("user_sess_store");
    }

    public function login(){
        $this->load->view('templates/admin/header');
        $this->load->view('admin/login');
        $this->load->view('templates/admin/footer');
    }

    public function index()
    {
        if (!file_exists('application/views/admin/index.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $loginuser = $this->session->userdata('sname');
        if(!$loginuser){
            $this->login();
            return;
        }
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
        $data = array();
        $data['loginuser']  = $loginuser;
        $this->load->view('templates/admin/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/admin/footer',$data);

    }

    public  function subview($page='home'){
        if (!file_exists('application/views/admin/subview/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $data=array();
        $this->querySubviewData($page,$data);
        $this->load->view('admin/subview/' . $page, $data);

    }

    private function querySubviewData($page="home",&$data){


       if($page=="home"){
           $this->db->select('id, name');
           $query = $this->db->get("artitlecategory");
           $result= $query->result_array();
           foreach ($result as $rst) {
               $art_cate[$rst['id']] = $rst['name'];
           }

           $data['artitlecategory'] = $art_cate;
       }
       if($page=="child"){
           $this->db->select("id,name");
           $query =$this->db->get("shopcategory");
           $result = $query->result_array();
           $shopcategory = array();
           foreach ($result as $sc) {
               $shopcategory[$sc['id']] = $sc['name'];
           }
           $data['shopcategory'] = $shopcategory;

       }
    }

}
