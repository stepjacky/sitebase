<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-13
 * Time: 下午2:50
 * To change this template use File | Settings | File Templates.
 */
class MY_Model extends CI_Model
{
    protected $table = null;
    protected $selectFields = array();
    protected $fieldNames = array();
    protected $row_per_page=10;
    public function __construct()
    {

        parent::__construct();

        $argNum = func_num_args();
        if ($argNum == 1) {
            $this->table = func_get_arg(0);
        }
        $this->load->library('firephp');
        $this->load->database();

    }


    public function gets($page = 0, $rows = 10) {
        $start = $rows*$page - $rows; //
        if ($start<0) $start = 0;
        $this->db->select($this->get_select_fields());
        $query = $this->db->get($this->table, $rows, $start);
        $result = $query->result_array();
        return $result;
    }

    public function gets_more($sql){
        $query =  $this->db->query($sql);
        $result = $query->result_array();

        return $result;
    }


    public function page_link(){


        $config['base_url'] = $this->table.'/listview/';
        $config['total_rows'] = $this->db->count_all($this->table);
        $config['per_page'] = $this->row_per_page;
        //$this->firelog($config);
        $this->pagination->initialize($config);
        $pagelink = $this->pagination->create_links();
        //$this->firelog($pagelink);
        return $pagelink;
    }

    public function create_page_link($url){
        $config['base_url'] = $url;
        $config['total_rows'] = $this->db->count_all($this->table);
        $config['per_page'] = $this->row_per_page;
        //$this->firelog($config);
        $this->pagination->initialize($config);
        $pagelink = $this->pagination->create_links();
        //$this->firelog($pagelink);
        return $pagelink;
    }

    /**
     * @param array;
     */
    public function create($data)
    {
        $id = isset($data['id'])?$data['id']:false;
        if(!$id){

            unset($data['id']);
            $str = $this->db->insert_string($this->table, $data);
            $this->firelog($str);
            $this->db->insert($this->table, $data);

        }else{

            unset($data['id']);
            $str = $this->db->update_string($this->table,$data,"id=$id");
            $this->firelog($str);
            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
        }
    }

    public function createBatch($data)
    {

        $this->db->insert_batch($this->table, $data);

    }

    public function update($data, $id)
    {

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

    }

    public function updateBatch($data, $where)
    {

        /*
        $data = array(
            array(
                'title' => 'My title' ,
                'name' => 'My Name 2' ,
                'date' => 'My date 2'
            ),
            array(
                'title' => 'Another title' ,
                'name' => 'Another Name 2' ,
                'date' => 'Another date 2'
            )
        );
        */
        $this->db->update_batch($this->table, $data, $where);

// Produces:
// UPDATE `mytable` SET `name` = CASE
// WHEN `title` = 'My title' THEN 'My Name 2'
// WHEN `title` = 'Another title' THEN 'Another Name 2'
// ELSE `name` END,
// `date` = CASE
// WHEN `title` = 'My title' THEN 'My date 2'
// WHEN `title` = 'Another title' THEN 'Another date 2'
// ELSE `date` END
// WHERE `title` IN ('My title','Another title')

    }

    public function remove($where)
    {
        $this->db->delete($this->table, $where);

// 生成:
// DELETE FROM mytable
// WHERE id = $id
    }

    public function get($id){
        $this->db->get($id);
    }

    public function getTable(){
        return strtolower($this->table);
    }

    public function emptyObject(){
        $fields = $this->db->list_fields($this->getTable());
        $data = array();
        foreach ($fields as $field)
        {
            $data[$field]="";
        }
        $data['id']=-1;
        return $data;
    }

    public function set_select_fields($array){
        $this->selectFields=$array;
    }
    public function get_select_fields(){
        return join(',',$this->selectFields);
    }
    public function firelog($msg = "")
    {
        $this->firephp->log($msg);
    }
}
