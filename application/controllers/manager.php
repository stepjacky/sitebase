<?php
/**
 * Created by JetBrains PhpStorm.
 * User: 汉图 QQ285799123
 * Date: 12-4-7
 * Time: 下午9:36
 * 欢迎联系
 *To change this template use File | Settings | File Templates.
 */
class Manager extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function savehomeshop()
    {
        $insertdata = array();
        $data = $this->_xsl_post();
        foreach (array_keys($data) as $key) {
            $nv = preg_split('/\-/', $key);
            if ($nv) {
                $insertdata[$nv[0]][$nv[1]] = $data[$key];
            }
        }
        $keys = array_keys($insertdata);

        foreach ($keys as $r) {
            $sdata = $insertdata[$r];
            $sdata['position'] = $r;
            $this->db->where("position", $r);
            $query = $this->db->get("homeshop");
            $num = $query->num_rows();
            $str = "";
            if ($num == 0) {
                $this->db->insert("homeshop", $sdata);
                $str = $this->db->insert_string("homeshop", $sdata);
            } else {
                $this->db->where('position', $r);
                $this->db->update('homeshop', $sdata);
                $str = $this->db->update_string('homeshop', $sdata, "position=$r");
            }


        }

        $this->_success("主页店家设置");
    }

    public function savead()
    {
        $insertdata = array();
        $data = $this->_xsl_post();
        foreach (array_keys($data) as $key) {
            $nv = preg_split('/\-/', $key);
            if ($nv) {
                $insertdata[$nv[0]][$nv[1]] = $data[$key];
            }
        }


        $keys = array_keys($insertdata);

        foreach ($keys as $r) {
            $sdata = $insertdata[$r];
            $sdata['position'] = $r;
            $this->db->where("position", $r);
            $query = $this->db->get("homead");
            $num = $query->num_rows();
            $str = "";
            if ($num == 0) {
                $this->db->insert("homead", $sdata);
                $str = $this->db->insert_string("homead", $sdata);
            } else {
                $this->db->where('position', $r);
                $this->db->update('homead', $sdata);
                $str = $this->db->update_string('homead', $sdata, "position=$r");
            }
            $this->firelog($str);
        }


        $this->_success("主页广告设置");

    }

    public function saveart()
    {
        $data = $this->input->post(NULL, TRUE);
        $this->firelog($data);
        foreach (array_keys($data) as $key) {
            $cid = $data[$key];
            $kv = preg_split('/_/', $key);
            $istdata = array();
            $istdata['position'] = $kv[1];
            $istdata['artitle_category_id'] = $cid;

            $this->db->where("position", $kv[1]);
            $query = $this->db->get("homeartitle");
            $num = $query->num_rows();

            if ($num == 0) {
                $sql = $this->db->insert_string("homeartitle", $istdata);
                $this->firelog($sql);
                $this->db->insert("homeartitle", $istdata);
            } else if ($num > 0) {
                $this->db->where("position", $kv[1]);
                $sql = $this->db->update_string("homeartitle", $istdata);
                $this->db->update("homeartitle", $istdata);

                $this->firelog($sql);
            }
        }
        $this->_success("设置主页文章栏目");
    }

    public function saverunimg()
    {
        $data = $this->input->post(NULL, TRUE);
        $this->db->truncate("homerunimage");

        foreach ($data['image_path'] as $imgpath) {
            if ($imgpath) {
                $idata['image_path'] = $imgpath;
                $this->db->insert("homerunimage", $idata);
            }
        }
        $this->_success("主页滚动图片设置");
    }

    public function savechild($name)
    {
        $data = $this->_xsl_post();
        $pos = array("first", "second", "third", "fourth", "fifth");

        foreach ($pos as $p) {
            $ad_link_key = $name . "-" . $p . "-ad_link";
            $ad_image_key = $name . "-" . $p . "-ad_image";
            $ad_link = $data[$ad_link_key];
            $ad_image = $data[$ad_image_key];
            $sdata = array();
            $sdata['child_name'] = $name;
            $sdata['position'] = $p;

            if ($ad_link) {
                $sdata['ad_link'] = $ad_link;
            }
            if ($ad_image) {
                $sdata['ad_image'] = $ad_image;
            }
            $this->firelog(($sdata));
            $this->db->where("child_name", $name);
            $this->db->where("position", $p);
            $num = $this->db->count_all_results("childad");
            if ($num == 0) {

                $this->db->insert("childad", $sdata);
            } else {
                $this->db->where("child_name", $name);
                $this->db->where("position", $p);
                $this->db->update("childad", $sdata);
            }

        }

        $cshop = $data[$name . "-shop_category_id"];
        if ($cshop) {
            $this->db->where("child_name", $name);
            $num = $this->db->count_all_results("childshop");
            if ($num == 0) {
                $isdata['child_name'] = $name;
                $isdata['shop_category_id'] = $cshop;
                $this->db->insert("childshop", $isdata);
            } else {

                $isdata['shop_category_id'] = $cshop;
                $this->db->where("child_name", $name);
                $this->db->update("childshop", $isdata);

            }
        }
        $this->_success("设置子页面");

    }


}
