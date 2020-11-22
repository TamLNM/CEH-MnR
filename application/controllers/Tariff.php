<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tariff extends CI_Controller {
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

    public function ctTariffGroup_1(){    
        $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        $this->load->model('Tariff_model', "mTar");
        switch($action){ 
            case "loadData":
                $data_ret = $this->mTar->ctTariffGroup_1_loadData();
                echo json_encode($data_ret);
                exit();
                break;
            case "saveDATA":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mTar->ctTariffGroup_1_saveDATA($mainData, $detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            case "loadDetails":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $data_ret = $this->mTar->ctTariffGroup_1_loadDetails($mainData);
                echo json_encode($data_ret);
                exit();
                break;
            case "deleteDATA_MAIN":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $data_ret = $this->mTar->ctTariffGroup_1_deleteDATA_MAIN($mainData);
                echo json_encode($data_ret);
                exit();
                break;
            case "deleteDATA_DETAILS":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mTar->ctTariffGroup_1_deleteDATA_DETAILS($mainData, $detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };
        
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "NHÓM BIỂU CƯỚC";
        $this->data['P_Title'] = "NHÓM BIỂU CƯỚC";
        $this->data['P_Table'] = "MR_BS_TARIFF_GROUP";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("ctTariffGroup_1"));
        $this->data['P_Columns_2'] = json_encode ($this->mALL->load_TableColumns("ctTariffGroup_2"));
        
        $this->load->view('header', $this->data);   
        $this->load->view('tariff/tariff_group_1', $this->data);
        $this->load->view('footer');
    }

    public function ctTariffGroup(){    
        $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        $this->load->model('Tariff_model', "mTar");
        switch($action){ 
            case "loadData":
                $data_ret = $this->mTar->ctTariffGroup_loadData();
                echo json_encode($data_ret);
                exit();
                break;
            case "saveDATA":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mTar->ctTariffGroup_saveDATA($mainData, $detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            case "loadDetails":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $data_ret = $this->mTar->ctTariffGroup_loadDetails($mainData);
                echo json_encode($data_ret);
                exit();
                break;
            case "deleteDATA_MAIN":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $data_ret = $this->mTar->ctTariffGroup_deleteDATA_MAIN($mainData);
                echo json_encode($data_ret);
                exit();
                break;
            case "deleteDATA_DETAILS":
                $mainData = $this->input->post('DATA_MAIN') ? $this->input->post('DATA_MAIN') : array();
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mTar->ctTariffGroup_deleteDATA_DETAILS($mainData, $detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };
        
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "NHÓM BIỂU CƯỚC";
        $this->data['P_Title'] = "NHÓM BIỂU CƯỚC";
        $this->data['P_Table'] = "MR_BS_TARIFF_GROUP";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("ctTariffGroup"));
        $this->data['P_Columns_2'] = json_encode ($this->mALL->load_TableColumns("ctTariffGroup_2"));
        
        $this->load->view('header', $this->data);   
        $this->load->view('tariff/tariff_group', $this->data);
        $this->load->view('footer');
    }

    public function ctTariffCodes(){
        $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        $this->load->model('Tariff_model', "mTar");
        switch($action){ 
            case "loadData":
                $formData = $this->input->post('DATA_FORM') ? $this->input->post('DATA_FORM') : array();
                $data_ret = $this->mTar->ctTariffCodes_loadData($formData);
                echo json_encode($data_ret);
                exit();
                break;
            case "saveDATA":
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mTar->ctTariffCodes_saveDATA($detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            case "deleteDATA":
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mTar->ctTariffCodes_deleteDATA($detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };

        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "BIỂU CƯỚC";
        $this->data['P_Title'] = "BIỂU CƯỚC";
        $this->data['P_Table'] = "MR_BS_TARIFF_REPAIR";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("ctTariffCodes"));
        
        $this->load->model('Common_model', "mCommon");
        $this->data['cb_GroupTRFID'] = $this->mCommon->load_ALL_Common("MR_BS_TARIFF_GROUP", "", "GROUP_TRF_ID", "GROUP_TRF_ID");
        $this->data['cb_Component'] = $this->mCommon->load_ALL_Common("MR_BS_COMPONENT", "", "COMP_ID");
        $this->data['cb_Repair'] = $this->mCommon->load_ALL_Common("MR_BS_REPAIR", "", "REP_ID");
        
        $this->load->view('header', $this->data);   
        $this->load->view('tariff/tariff_codes', $this->data);
        $this->load->view('footer');

    }
}