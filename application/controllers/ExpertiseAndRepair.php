<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExpertiseAndRepair extends CI_Controller {
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

    public function erExpertiseContainerList(){
        $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        $this->load->model('ExpertiseAndRepair_model', "mEAR");
        switch($action){ 
            case "loadData":
                $formData = $this->input->post('DATA_FORM') ? $this->input->post('DATA_FORM') : array();
                $data_ret = $this->mEAR->view_expertise_container_list_loadData($formData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };
        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "DANH SÁCH CONTAINER GIÁM ĐỊNH";
        $this->data['P_Title'] = "DANH SÁCH CONTAINER GIÁM ĐỊNH";
        $this->data['P_Table'] = "MR_DT_REPAIR_CONT";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("erExpertiseContainerList"));

        $this->load->model('Common_model', "mCommon");
        $this->data['cb_OprID'] = $this->mCommon->load_ALL_Common("CUSTOMERS", "IsOpr = 1", "CusID");
        $this->load->view('header', $this->data);   
        $this->load->view('expertise_and_repair/expertise_container_list', $this->data);
        $this->load->view('footer');
    }

    public function erQuoteAndRepair(){
        $DSAD = $this->input->post("DT") ? $this->input->post("DT") : "{}";
        if ($DSAD <> "{}") {
            $ABC = json_decode($DSAD,true);
            $action = $ABC['iAction'];
        }
        else {
            $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        }

        
        $this->load->model('ExpertiseAndRepair_model', "mEAR");
        switch($action){
            case "loadDataInput":
                $iCntrNo = $this->input->post('CNTRNO') ? $this->input->post('CNTRNO') : '';
                $iEstimateNo = $this->input->post('ESTIMATENO') ? $this->input->post('ESTIMATENO') : '';
                $iMasterRowguid = $this->input->post('MASTER_ROWGUID') ? $this->input->post('MASTER_ROWGUID') : '';
                $data_ret = $this->mEAR->view_quote_and_repair_loadDataInput($iCntrNo, $iEstimateNo, $iMasterRowguid);
                echo json_encode($data_ret);
                exit();
                break;
            case "saveDATA":
                $formData = $this->input->post('DATA_FORM') ? $this->input->post('DATA_FORM') : array();
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mEAR->view_quote_and_repair_saveDATA($formData, $detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            case "xxxx":
                $this->data['XX_ABC'] = $ABC;
                break;
            case "deleteDATA":
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mEAR->view_quote_and_repair_deleteDATA($detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            case "loadReport":
                $formData = $this->input->post('DATA_FORM') ? $this->input->post('DATA_FORM') : array();
                $data_ret = $this->mEAR->view_quote_and_repair_loadReport($formData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };

        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "BÁO GIÁ VÀ SỬA CHỮA";
        $this->data['P_Title'] = "BÁO GIÁ VÀ SỬA CHỮA";
        $this->data['P_Table'] = "MR_DT_REPAIR_CONT_DTL";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("erQuoteAndRepair"));

        $this->load->model('Common_model', "mCommon");
        $this->data['P_Tariff_Repair'] = json_encode ($this->mCommon->load_ALL_Common("MR_BS_TARIFF_REPAIR", "", "GROUP_TRF_ID, COMP_ID, REP_ID, SIZE, WIDTH, QUANTITY, UNIT, HOURS, MATE_USD"));
        
        $this->data['cb_BoxStatus'] = $this->mCommon->load_ALL_Common("MR_BS_REPAIR_SYSTEM_CODE", "TYPECODE='6'", "CODE, NAME");
        // $this->data['P_Combobox'] = json_encode ($this->mCommon->load_ALL_Common("MR_BS_REPAIR_SYSTEM_CODE", "", "TYPECODE, CODE, NAME, TYPENAME"));

        $this->load->view('header', $this->data);   
        $this->load->view('expertise_and_repair/quote_and_repair', $this->data);
        $this->load->view('footer');
    }

    public function erApprovalConfirm(){
        $action = $this->input->post('iAction') ? $this->input->post('iAction') : '';
        $this->load->model('ExpertiseAndRepair_model', "mEAR");
        switch($action){ 
            case "loadData":
                $formData = $this->input->post('DATA_FORM') ? $this->input->post('DATA_FORM') : array();
                $data_ret = $this->mEAR->view_approval_confirm_loadData($formData);
                echo json_encode($data_ret);
                exit();
                break;
            case "saveDATA":
                $detailsData = $this->input->post('DATA_DETAILS') ? $this->input->post('DATA_DETAILS') : array();
                $data_ret = $this->mEAR->view_approval_confirm_saveDATA($detailsData);
                echo json_encode($data_ret);
                exit();
                break;
            default: break;
        };

        $this->load->model("Grid_Model", "mALL");
        $this->data['title'] = "XÁC NHẬN APPROVAL";
        $this->data['P_Title'] = "XÁC NHẬN APPROVAL";
        $this->data['P_Table'] = "MR_DT_REPAIR_CONT";
        $this->data['P_Columns'] = json_encode ($this->mALL->load_TableColumns("erApprovalConfirm"));

        $this->load->model('Common_model', "mCommon");
        $this->data['cb_OprID'] = $this->mCommon->load_ALL_Common("CUSTOMERS", "IsOpr = 1", "CusID");

        $this->load->view('header', $this->data);   
        $this->load->view('expertise_and_repair/approval_confirm', $this->data);
        $this->load->view('footer');
    }

    public function ajax_load_excel() {
        $this->load->model('ExpertiseAndRepair_model', "mEAR");
        $agt = $this->mEAR->readExcel();
    }
}