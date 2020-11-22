<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
    public $data;
    private $ceh;

    function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('UserID'))) {
            redirect(md5('user') . '/' . md5('login'));
        }

        $this->load->helper(array('form','url'));
        $this->load->model("user_model", "user");
        $this->data['menus'] = $this->menu->getMenu();
        $this->data['parentMenuList'] = $this->menu->getParentMenu();
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function _remap($method) {
        $methods = get_class_methods($this);

        $skip = array("_remap", "__construct", "get_instance");
        $a_methods = array();

        if(($method == 'index')) {
            $method = md5('index');
        }

        foreach($methods as $smethod) {
            if (!in_array($smethod, $skip)) {
                $a_methods[] = md5($smethod);
                if($method == md5($smethod)) {
                    $this->$smethod();
                    break;
                }
            }
        }

        if(!in_array($method, $a_methods)) {
            show_404();
        }
    }

    public function view_ALL_Save(){
        $data = $this->input->post() ? $this->input->post() : array();
        if ( count($data) <= 0 ) return;
        $this->load->model("Common_model", "mCommon");
        echo json_encode($this->mCommon->save_ALL_Common($data));
        exit();
    }

    public function view_ALL_Load(){
        $iTableName = $this->input->post('TableName') ? $this->input->post('TableName') : '';
        if ( $iTableName == "" ) return;
        $this->load->model("Common_model", "mCommon");
        echo json_encode($this->mCommon->load_ALL_Common($iTableName));
        exit();
    }

    public function view_ALL_Delete(){
        $iTableName = $this->input->post('TableName') ? $this->input->post('TableName') : '';
        if ( $iTableName == "" ) return;
        $iDataDelete = $this->input->post('data') ? $this->input->post('data') : array();
        if ( count($iDataDelete) <= 0) return;
        $this->load->model("Common_model", "mCommon");
        $data_ret = $this->mCommon->delete_ALL_Common($iTableName, $iDataDelete);
        echo json_encode($data_ret);
        exit();
    }

    public function cmComponent(){
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "BỘ PHẬN CONTAINER";
        $this->data['P_Title'] = "BỘ PHẬN CONTAINER";
        $this->data['P_Table'] = "MR_BS_COMPONENT";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("MR_BS_COMPONENT"));
        $this->load->view('header', $this->data);   
        $this->load->view('common/view_common_ALL', $this->data);
        $this->load->view('footer');
    }

    public function cmDamage(){
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "HƯ HỎNG CONTAINER";
        $this->data['P_Title'] = "HƯ HỎNG CONTAINER";
        $this->data['P_Table'] = "MR_BS_DAMAGE";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("MR_BS_DAMAGE"));
        $this->load->view('header', $this->data);   
        $this->load->view('common/view_common_ALL', $this->data);
        $this->load->view('footer');
    }

    public function cmLocation(){
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "VỊ TRÍ HƯ HỎNG CONTAINER";
        $this->data['P_Title'] = "VỊ TRÍ HƯ HỎNG CONTAINER";
        $this->data['P_Table'] = "MR_BS_LOCATION";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("MR_BS_LOCATION"));
        $this->load->view('header', $this->data);   
        $this->load->view('common/view_common_ALL', $this->data);
        $this->load->view('footer');
    }

    public function cmRepair(){
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "SỬA CHỮA CONTAINER";
        $this->data['P_Title'] = "SỬA CHỮA CONTAINER";
        $this->data['P_Table'] = "MR_BS_REPAIR";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("MR_BS_REPAIR"));
        $this->load->view('header', $this->data);   
        $this->load->view('common/view_common_ALL', $this->data);
        $this->load->view('footer');
    }

    public function cmCompDamRep(){
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "COMP-DAM-REP";
        $this->data['P_Title'] = "COMP-DAM-REP";
        $this->data['P_Table'] = "MR_BS_COMP_DAM_REP";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("MR_BS_COMP_DAM_REP"));
        $this->load->view('header', $this->data);   
        $this->load->view('common/view_common_ALL', $this->data);
        $this->load->view('footer');
    }

    public function cmVendors(){
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "ĐƠN VỊ SỬA CHỮA";
        $this->data['P_Title'] = "ĐƠN VỊ SỬA CHỮA";
        $this->data['P_Table'] = "MR_BS_VENDOR";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("MR_BS_VENDOR"));
        $this->load->view('header', $this->data);   
        $this->load->view('common/view_common_ALL', $this->data);
        $this->load->view('footer');
    }

    public function cmContainerInfo(){
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "DỮ LIỆU VẬT LÍ CONT";
        $this->data['P_Title'] = "DỮ LIỆU VẬT LÍ CONT";
        $this->data['P_Table'] = "MR_BS_CNTR_INFO";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("MR_BS_CNTR_INFO"));
        $this->load->view('header', $this->data);   
        $this->load->view('common/view_common_ALL', $this->data);
        $this->load->view('footer');
    }

    public function cmOODSetting(){
        /*
        $access = $this->user->access('cmUnitCodes');
        if($access === false) {
            show_404();
        }

        if(strlen($access) > 5) {
            $this->data['deny'] = $access;
            echo json_encode($this->data);
            exit;
        }
        */

        $this->data['title'] = "CẤU HÌNH QUÁ HẠN";
        $this->load->view('header', $this->data);   
        $this->load->view('common/oodsetting', $this->data);
        $this->load->view('footer');
    }
}