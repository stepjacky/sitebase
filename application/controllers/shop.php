<?php
/**
 * Created by JetBrains PhpStorm.
 * User: hantu
 * Date: 12-5-12
 * Time: 下午5:55
 * To change this template use File | Settings | File Templates.
 */
class Shop extends ShopController
{
    function __construct()
    {
        parent::__construct("Shopmodel");

    }


    public function listview($page = 0, $rows = 10)
    {

        $data = $this->_listdata($page, $rows, "shop/listview");
        $this->load->view("shop/list", $data);

    }

    public function dialog($page = 0, $rows = 10)
    {
        $shops = $this->input->post("shops", TRUE);
        $data = $this->_listdata($page, $rows, "http://localhost/sitebase/shop/dialog");
        if (!$shops) $shops = array();
        $data['shops'] = array_unique($shops);
        $this->load->view("shop/dialog", $data);
    }


    private function _listdata($page = 0, $rows = 10, $pageurl)
    {
        $start = $rows * $page - $rows; //
        if ($start < 0) $start = 0;
        $sql = "SELECT s.id id ,s.name name,s.phone as phone, sc.name as cname
                ,sc.id as cid
                FROM shop s JOIN shopcategory sc ON sc.id=s.shop_category_id
                order by s.shop_category_id desc limit " . $start . "," . $rows;

        $result = $this->modelInst->gets_more($sql);
        $pagelink = $this->modelInst->create_page_link($pageurl);
        $data['datasource'] = $result;
        $data['pagelink'] = $pagelink;

        return $data;

    }

    public function editnew()
    {
        $this->db->select('id,name');
        $query = $this->db->get('shopcategory');
        $results = $query->result_array();
        $shopcategory = array();
        foreach ($results as $rst) {
            $shopcategory[$rst['id']] = $rst['name'];
        }
        $data['shopcategory'] = $shopcategory;
        $this->load->view($this->modelInst->getTable() . "/edit", $data);
    }

    public function create()
    {
        if (!$this->upload->do_upload("present_image")) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('picture/upload_failed', $error);
        } else {

            $uploaddata = $this->upload->data();
            $uploaddata['web_path'] = 'statics/image/upload/';
            $this->db->insert('picture', $uploaddata);
            $data = $this->input->post(NULL, TRUE);
            $data['present_image'] = $uploaddata['web_path'] . $uploaddata['file_name'];
            $this->modelInst->create($data);
            $message['message'] = "添加商家";
            $this->load->view("common/formsuccess", $message);
        }

    }

    /**
     * 显示更新优惠页面
     */
    public function preferential($id = -1)
    {
        if ($id == -1) show_error('商家不存在', 404);
        $data['shopId'] = $id;
        $this->db->select("preferential");
        $this->db->where("id", $id);
        $result = $this->db->get($this->modelInst->getTable());
        $data['preferential'] = $result->first_row()->preferential;
        $this->load->view("shop/preferential", $data);
    }

    /**
     *  根据编号更新优惠信息
     *
     */
    public function savepreferantial($id = -1)
    {
        if ($id == -1) show_error('商家不存在', 404);
        $data = $this->input->post(NULL, TRUE);
        $data['preferential_date'] = date("Y-m-d H:i:s");
        $this->db->where('id', $id);
        $this->db->update($this->modelInst->getTable(), $data);
        $msg = array("message" => "更新商家优惠活动");
        $this->load->view("common/formsuccess", $msg);
    }

    public function savecommit()
    {
        $data = $this->input->post(NULL, TRUE);
        $str = $this->db->insert_string("shopcommit", $data);
        $this->firelog($str);
        $this->db->insert("shopcommit", $data);
        $this->_success("添加评论");


    }

    public function index($phone = "88888888", $page = 'shop', $activeIndex = 0, $pindex = 0, $rows = 20)
    {
        if (!file_exists('application/views/shops/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data = array("phone" => $phone);
        $data['activeIndex'] = $activeIndex;
        $topmenu = $this->load->view("shops/topmenu", $data, true);

        $data['topmenu'] = $topmenu;


        //TODO 这里查询商家公用信息,准备填充商家页面

        $sql = "select
                  s.id as sid,
                  s.name as sname,
                  sc.name as cname,
                  s.main_product as mproduct,
                  s.worktime as wtime,
                  s.phone as sphone,
                  s.qq as sqq,
                  s.discount as sdiscount,
                  s.address as saddress,
                  s.roads as sroads,
                  s.area as sarea,
                  s.envs as senvs,
                  s.parked as sparked,
                  s.carded as scarded,
                  s.favourabled as sfavour,
                  s.longitude as slon,
                  s.latitude  as slat
                from shop as s join shopcategory as sc on sc.id = s.shop_category_id
                where s.phone = '" . $phone . "'";

        $query = $this->db->query($sql);

        $num = $query->num_rows();
        if ($num == 0) {
            show_error("Shop does not exists with phone $phone", 500, "Error");
            return;
        }


        $result = $query->first_row("array");

        $data['shopself'] = $result;
        $shop_id = $result['sid'];

        //最新动态信息
        $sql = "select s.id as sid, s.name as sname,s.present_image as simage from shoptrends as s where s.shop_id=" . $shop_id . " limit 3";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        $data['trends'] = $result;


        //商家底部产品滚动图片

        $sql = "select s.image as simage from shopproductimage as s where s.shop_id=" . $shop_id;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $data['pdtimages'] = $result;


        //顶部跑马灯滚动

        $sql = "select s.image as simage from shopplayimage as s where s.shop_id=" . $shop_id;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $tarray = array();
        foreach ($result as $timage) {
            array_push($tarray, $timage['simage']);
        }


        $data['runimages'] = "?images[]=" . join("&images[]=", $tarray);

        $this->_pageData($phone, $shop_id, $page, $data, $pindex, $rows);
        $this->firelog($data);

        $shopchild = $this->load->view("shops/" . $page, $data, true);
        $data['shopchild'] = $shopchild;
        $this->load->view('shops/shopframe', $data);

    }

    public function _pageData($phone, $shopid, $page, &$data, $pindex, $rows)
    {
        if ($page == "shop") {

            $this->db->select("synopsis,preferential,characteristic");
            $this->db->where("phone", $phone);
            $query = $this->db->get("shop");
            $data['shopdata'] = $query->first_row("array");
        }
        if ($page == "introduce") {

            $this->db->select("synopsis");
            $this->db->where("phone", $phone);
            $query = $this->db->get("shop");
            $data['shopdata'] = $query->first_row("array");
        }

        if ($page == "album") {
            $this->db->select("preferential");
            $this->db->where("phone", $phone);
            $query = $this->db->get("shop");
            $data['shopdata'] = $query->first_row("array");
        }

        if ($page == "advertise") {
            $this->db->select("jobinfo");
            $this->db->where("phone", $phone);
            $query = $this->db->get("shop");
            $data['shopdata'] = $query->first_row("array");
        }

        if ($page == "commentary") {
            $table = 'shopcommit';
            $this->db->select("id,username,createDate,content");
            $this->db->where("shop_id", $shopid);
            $this->db->order_by("createDate", "desc");
            $start = $rows * $pindex - $rows; //
            if ($start < 0) $start = 0;
            $this->db->limit($rows, $start);
            $query = $this->db->get($table);
            $data['shopdata'] = $query->result_array();

            $this->db->where('shop_id', $shopid);
            $this->db->from($table);
            $total_rows = $this->db->count_all_results();

            $config['uri_segment'] = 6;
            $config['base_url'] = 'shop/index/' . $phone . '/commentary/4/';
            $config['total_rows'] = $total_rows;
            $config['per_page'] = $rows;

            $this->pagination->initialize($config);
            $pagelink = $this->pagination->create_form_links();
            $data['pagelink'] = $pagelink;
        }
    }


    public function toppic($id = -1)
    {
        $data['shopId'] = $id;
        $this->load->view("shop/toppic", $data);
    }

    public function savetoppic($id)
    {

        $this->db->where('shop_id', $id);
        $this->db->delete('shopplayimage');
        for ($i = 0; $i < 6; $i++) {
            $field_name = "topimage_";
            if (!$this->upload->do_upload($field_name . $i)) {
                $error = array('error' => $this->upload->display_errors());
                $this->firelog($error);
                continue;
            } else {

                $uploaddata = $this->upload->data();

                $uploaddata['web_path'] = 'statics/image/upload/';
                $this->db->insert('picture', $uploaddata);
                $data['image'] = $uploaddata['web_path'] . $uploaddata['file_name'];
                $data['shop_id'] = $id;

                $this->db->insert('shopplayimage', $data);


            }
        }
        $message['message'] = "添加商家顶部图片";
        $this->load->view("common/formsuccess", $message);
    }

    public function pdtpic($id)
    {
        $data['shopId'] = $id;
        $this->load->view("shop/pdtpic", $data);
    }

    public function savepdtpic($id)
    {
        $this->db->where('shop_id', $id);
        $this->db->delete('shopproductimage');
        for ($i = 0; $i < 9; $i++) {
            $field_name = "topimage_";
            if (!$this->upload->do_upload($field_name . $i)) {
                $error = array('error' => $this->upload->display_errors());
                $this->firelog($error);
                continue;
            } else {

                $uploaddata = $this->upload->data();

                $uploaddata['web_path'] = 'statics/image/upload/';
                $this->db->insert('picture', $uploaddata);
                $data['image'] = $uploaddata['web_path'] . $uploaddata['file_name'];
                $data['shop_id'] = $id;

                $this->db->insert('shopproductimage', $data);


            }
        }
        $message['message'] = "添加商家顶部图片";
        $this->load->view("common/formsuccess", $message);
    }

    public function info($id)
    {
        $this->load->view("shop/infoedit", array("shopId" => $id));
    }

    public function infoshow($id)
    {
        $this->load->view("shop/info", array("shopId" => $id));
    }

    public function saveinfo($id = -1)
    {
        if ($id == -1) return;
        if (!$this->upload->do_upload("present_image")) {
            $error = array('error' => $this->upload->display_errors());
            $this->firelog($error);

        } else {

            $uploaddata = $this->upload->data();
            $uploaddata['web_path'] = 'statics/image/upload/';
            $this->db->insert('picture', $uploaddata);

            $data = $this->input->post(NULL, TRUE);
            $data['present_image'] = $uploaddata['web_path'] . $uploaddata['file_name'];
            $data['shop_id'] = $id;

            $this->firelog($data);
            $this->db->insert('shoptrends', $data);

            $msg['message'] = "添加商家咨询";
            $this->load->view("common/formsuccess", $msg);

        }
    }

    public function search($page = 0, $rows = 10)
    {
        $data = $this->_xsl_post();
        $this->firelog($data);
        $vdata = array(
            "area" => "区域",
            "street" => "街道",
            "word" => "关键字",
            "favourabled" => "可优惠",
            "parked" => "可停车",
            "carded" => "可刷卡"
        );
        $message = array();
        foreach (array_keys($vdata) as $vkey) {
            if ($this->_post_exists($vkey, $data)) {
                array_push($message, $vdata[$vkey] . ":<b style='margin-left:10px;color:red'>" . $data[$vkey] . "</b>");
            }
        }


        $lastidx = -4;
        $keys = array("area", "street");
        $sql = "select
           s.name  name , s.area  area,s.phone  phone
           ,s.roads roads,s.discount discount,s.address
           ,s.main_product mpdt,s.present_image pimage,
           sc.name cname from shop s
           join shopcategory sc on sc.id = s.shop_category_id
            ";
        $where = "where ";
        foreach ($keys as $key) {

            if ($this->_post_exists($key, $data)) {
                $where .= " s." . $key . " like '%" . $data[$key] . "%'  and";

            }
        }

        //,"favourabled","parked","carded","shop_category_id
        $boolkey = array("favourabled", "parked", "carded");
        foreach ($boolkey as $bkey) {

            if ($this->_post_exists($bkey, $data)) {
                $where .= " s." . $bkey . " is true  and";

            }
        }

        $scate = 'shop_category_id';
        if ($this->_post_exists($scate, $data) && $data['shop_category_id'] != "no") {

            $svalue = $data['shop_category_id'];
            $sid = preg_split("/\-/", $svalue);
            $where .= " s.shop_category_id=" . $sid[0] . "  and ";
            array_push($message, "商家类型 : <b style='margin-left:10px;color:red'>" . $sid[1] . "</b>");

        }

        $likekeys = array("name","preferential", "characteristic", "main_product", "synopsis");
        if ($this->_post_exists("word", $data)) {
            foreach ($likekeys as $lkkey) {
                $where .= " s." . $lkkey . " like '%" . $data['word'] . "%'  or";
            }
            $lastidx = -2;
        }

        $start = $rows * $page - $rows; //
        if ($start < 0) $start = 0;
        $sql .= $where == "where" ? "where 1!=1" : substr($where, 0, $lastidx)." limit ".$start.",".$rows;


        $sumsql = "select count(*) m from shop s
           join shopcategory sc on sc.id = s.shop_category_id "
            .($where=="where"?" where 1!=1":substr($where, 0, $lastidx));

        $query = $this->db->query($sumsql);
        $result = $query->first_row("array");

        $total_rows = $result['m'];

        array_push($message,"结果共有 ".$total_rows." 条 ");


        $query = $this->db->query($sql);
        $result = $query->result_array();


        $rdata = array("title" => "商家搜索");
        $rdata['message'] = join("<span style='margin-right: 10px;'>,&nbsp;</span>", $message);



        $this->_search_data($rdata);
        $rdata['querys'] = $data;

        $config['uri_segment'] = 3;
        $config['base_url'] = 'shop/search/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $rows;

        $this->pagination->initialize($config);
        $pagelink = $this->pagination->create_ie_links();

        $this->firelog($sql);
        $rdata['pagelink'] = $pagelink;
        $rdata['qshops'] = $result;

        $this->db->select("phone,name");
        $this->db->order_by("preferential_date","desc");
        $this->db->limit(20,0);
        $query = $this->db->get("shop");

        $new_dis_shops = $query->result_array();
        $rdata['disshops'] = $new_dis_shops;

        $this->db->select("id,name");
        $this->db->where("consumetrends","1");
        $this->db->order_by("createDate","desc");
        $this->db->limit(20,0);
        $query = $this->db->get("artitle");
        $new_trends_artitle = $query->result_array();
        $rdata['trendsartitles'] = $new_trends_artitle;

        $this->load->view('templates/header', $rdata);
        $this->load->view('shop/search', $rdata);
        $this->load->view('templates/footer', $rdata);

    }


    public function remove($id)
    {
        $this->_remove_shop($id);
        $this->_success("删除商家成功!");

    }

    public function update()
    {

    }

    public function get($id = 0)
    {

    }


}