<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 汉图
 * Date: 12-1-18
 * Time: 下午11:08
 * To change this template use File | Settings | File Templates.
 */
class Pages extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        if (!file_exists('application/views/pages/index.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $sql = "select s.id as id ,s.phone as phone, s.name as sname ,sc.name as cname, s.preferential_date pdate
        from shop s join shopcategory sc on sc.id=s.shop_category_id order by s.preferential_date desc
        limit 20";

        $query = $this->db->query($sql);
        $data['top20shops'] = $query->result_array();

        $sql = "select a.id as id ,a.name as aname, a.createDate as cdate, ac.name as cname from artitle as a join
           artitlecategory as ac on ac.id = a.artitle_category_id where a.consumetrends is true order by a.createDate desc
           limit 20";

        $query = $this->db->query($sql);
        $data['top20artitles'] = $query->result_array();

        $sql = "select * from homeshop";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $homeshops = array();
        $c = 0;
        foreach ($result as $hscfg) {
            $shopone = array();
            $fid = $hscfg['first_shop_id'];
            if ($fid) {
                $sql = "select phone as phone,present_image as pimage,name as name from shop where id=" . $fid;
                $query = $this->db->query($sql);
                $shopone['first'] = $query->first_row("array");
            } else {
                $shopone['first'] = array();
            }

            $fid = $hscfg['second_shop_id'];
            if ($fid) {
                $sql = "select phone as phone,present_image as pimage,name as name from shop where id=" . $fid;
                $query = $this->db->query($sql);
                $shopone['second'] = $query->first_row("array");
            } else {
                $shopone['second'] = array();
            }

            $fid = $hscfg['more_link'];
            if($fid){
                $shopone['morelink'] = $fid;
            }else{
                $shopone['morelink'] = "javascript:;";
            }

            $fid = $hscfg['more_name'];
            if($fid){
                $shopone['morename'] = $fid;
            }else{
                $shopone['morename'] = "No-Name";
            }


            $s_id_list = $hscfg['shop_list'];
            $s_list = preg_split("/\,/", $s_id_list);

            $shops = array();
            if (count($s_list) > 0) {
                foreach ($s_list as $sid) {
                    if ($sid) {
                        $sql = "select phone,name from shop where id=" . $sid;
                        $query = $this->db->query($sql);
                        $result = $query->first_row("array");
                        array_push($shops,$result);
                    }
                }
            }

            $shopone['shops'] = array_slice($shops,0,20);
            $homeshops[$c++] = $shopone;
        }
        $data['homeshops'] = $homeshops;


        $sql = "select * from homeartitle ";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $homeartitles = array();
        foreach ($result as $hacfg) {
            $caid = $hacfg['artitle_category_id'];
            $sql = "select a.id as id,a.name as name,ac.id as acid,ac.name as acname
                from artitle as a
                join artitlecategory as ac on ac.id = a.artitle_category_id
                where a.artitle_category_id=" . $caid . " order by a.createDate desc limit 12";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            $homeartitles[$hacfg['position']]['artitles'] = $result;
            $homeartitles[$hacfg['position']]['cid'] = $caid;
            $homeartitles[$hacfg['position']]['cname'] = $result?$result[0]['acname']:"";

        }
        $this->firelog($homeartitles);
        $data['homeartitles'] = $homeartitles;

        $query =  $this->db->get("homerunimage");
        $result = $query->result_array();
        $tarray = array();
        foreach($result as $runimg ){
           array_push($tarray,$runimg['image_path']);
        }
        $data['runimages'] = "?images[]=".join("&images[]=",$tarray);

        //主页广告
        $sql="select position,ad_link,ad_image from homead";
        $query = $this->db->query($sql);
        $ads = array();
        foreach($query->result_array() as $ad){
            $ads[$ad['position']]['ad_link'] = $ad['ad_link'];
            $ads[$ad['position']]['ad_image'] = $ad['ad_image'];
        }
        $data['ads'] = $ads;
        $this->_search_data($data);
        $data['title']="长沙图盛科技有限公司";
        $this->firelog($data);
        $data['message']="";
        $this->load->view('templates/header',$data);
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer',$data);
    }

    public function child($name,$page=0,$rows=10)
    {
        if (!$name) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $menus = $this->_menu_map();
        $data = array();
        $this->_child_shop_list($name,$data,$page,$rows);
        $this->_search_data($data);
        $this->_child_view($name,$data,$menus);

    }

    protected function _child_view($name,&$data,&$menu){
        $topmenu = read_file('./application/views/pages/shops-topmenu.inc');
        $data['title'] = $menu[$name]; // Capitalize the first letter
        $data['topmenu'] = $topmenu;

        $this->db->where("child_name",$name);
        $query = $this->db->get("childad");
        $result = $query->result_array();
        $ads = array();
        foreach($result as $ad){
            $ads[$ad['position']]['ad_link'] = $ad['ad_link'];
            $ads[$ad['position']]['ad_image'] = $ad['ad_image'];
        }
        $data['ads'] = $ads;
        $sql = "select a.id as id ,a.name as name ,a.createDate as createDate
               ,ac.name as cname
               from artitle as a join artitlecategory as ac
               where a.consumetrends is true
               group by a.id order by a.createDate desc limit 12";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        $data['top12news'] =  $result;
        $this->load->view('templates/header', $data);
        $this->load->view('pages/child', $data);
        $this->load->view('templates/footer', $data);
    }

    protected function _menu_map(){
        $labels = array(
            "eat"=>"餐饮",
            "shopping"=>"购物",
            "entertainment"=>"娱乐",
            "home"=>"家居",
            "live"=>"生活",
            "business"=>"商务",
            "walk"=>"出行",
            "body-building"=>"健身",
            "train"=>"培训"
        );
        return $labels;
    }

    protected function _child_shop_list($name,&$data,$page=0,$rows=10){
        if(!$name){
            show_error("no shop found");
        }
        $this->db->where("child_name",$name);
        $query = $this->db->get("childshop");
        $result = $query->first_row("array");
        if(!$result) return array();
        $start = $rows * $page - $rows; //
        if ($start < 0) $start = 0;
        $sid = $result['shop_category_id'];
        $this->db->select("phone,name,city,area,street,address,discount,present_image");
        $this->db->where("shop_category_id",$sid);
        $this->db->limit($rows,$start);
        $this->db->order_by("discount","asc");
        $query = $this->db->get("shop");
        $data['datasource'] = $query->result_array();
        $this->db->where("shop_category_id",$sid);
        $total_rows = $this->db->count_all_results("shop");

        $config['uri_segment'] = 4;
        $config['base_url'] = 'pages/child/'.$name.'/';
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $rows;
        $this->pagination->initialize($config);
        $pagelink =  $this->pagination->create_form_links();
        $data['pagelink'] = $pagelink;
    }




}
