<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-20
 * Time: 下午4:36
 * To change this template use File | Settings | File Templates.
 */
class Picture extends MY_Controller
{

    public function __construct(){
        parent::__construct("Picturemodel");
    }

    public function listview($page=0,$rows=5){

        $data = $this->_list_data($page,$rows, base_url().'/picture/listview/');
        $this->load->view("picture/list",$data);
    }

    public function dialog($page=0,$rows=5){

        $data = $this->_list_data($page,$rows,base_url().'/picture/dialog/');
        $this->load->view("picture/dialog",$data);

    }

    function _list_data($page,$rows,$pageurl){
        $start = $rows*$page - $rows; //
        if ($start<0) $start = 0;
        $this->db->select("id,file_name,web_path,image_width,image_height");
        $this->db->order_by("image_width","desc");
        $this->db->order_by("image_height","desc");
        $query = $this->db->get("picture",$rows,$start);
        $result = $query->result_array();
        $data['datasource'] = $result;
        $pagelink = $this->modelInst->create_page_link($pageurl);
        $data['pagelink'] = $pagelink;
        return $data;
    }
    public function create(){

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('picture/upload_failed', $error);
        }
        else
        {

            $insertdata = $this->upload->data();
            $insertdata['web_path']='statics/image/upload/';
            $data = array('upload_data' =>$insertdata );

            $this->db->insert('picture', $insertdata);
            $this->load->view('picture/upload_success', $data);
        }
    }

    public function remove($id){
        if(!$id) return;
        $this->db->where("id",$id);
        $this->db->delete("picture");
        $this->_success("删除图片");
    }

}
