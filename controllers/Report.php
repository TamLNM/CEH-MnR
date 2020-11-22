<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
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

    public function rpEstimateOfRepair(){
        $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        $this->load->model('Report_model', "mREP");
        switch($action){ 
            case "loadData":
                $formData = $this->input->post('DATA_FORM') ? $this->input->post('DATA_FORM') : array();
                $data_ret = $this->mREP->rpEstimateOfRepair_loadData($formData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };

        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "GIÁM ĐỊNH SỬA CHỮA CONTAINER";
        $this->data['P_Title'] = "GIÁM ĐỊNH SỬA CHỮA CONTAINER";
        $this->data['P_Table'] = "XXXX";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("rpEstimateOfRepair"));
        
        $this->load->model('Common_model', "mCommon");
        $this->data['cb_OprID'] = $this->mCommon->load_ALL_Common("CUSTOMERS", "IsOpr = 1", "CusID");
        
        $this->load->view('header', $this->data);   
        $this->load->view('report/estimate_of_repair', $this->data);
        $this->load->view('footer');
    }

    public function rpContainerStock(){
        $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        $this->load->model('Report_model', "mREP");
        switch($action){ 
            case "loadData":
                $formData = $this->input->post('DATA_FORM') ? $this->input->post('DATA_FORM') : array();
                $data_ret = $this->mREP->rpContainerStock_loadData($formData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };

        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "BÁO CÁO TỒN BÃI";
        $this->data['P_Title'] = "BÁO CÁO TỒN BÃI";
        $this->data['P_Table'] = "XXXX";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("rpContainerStock"));
        
        $this->load->model('Common_model', "mCommon");
        $this->data['cb_OprID'] = $this->mCommon->load_ALL_Common("CUSTOMERS", "IsOpr = 1", "CusID");
        
        $this->load->view('header', $this->data);   
        $this->load->view('report/container_stock', $this->data);
        $this->load->view('footer');
    }
}