<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Management extends CI_Controller {

    public $data;
    private $ceh;

    function __construct() {
        parent::__construct();

        if(empty($this->session->userdata('UserID'))) {
            redirect(md5('user') . '/' . md5('login'));
        }

        $this->load->helper(array('form','url'));
        $this->load->library('excel');
        $this->ceh = $this->load->database('mssql', TRUE);
        $this->data['menus'] = $this->menu->getMenu();
        $this->data['parentMenuList'] = $this->menu->getParentMenu();
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

    public function umSysUsersGroup(){
        /*
        $access = $this->user->access('umSysGroup');
        if($access === false) {
            show_404();
        }

        if(strlen($access) > 5) {
            $this->data['deny'] = $access;
            echo json_encode($this->data);
            exit;
        }
        */
        
        $this->load->model("Users_management_model", "mdlUM");
        $action = $this->input->post('action') ? $this->input->post('action') : '';
        if ($action == 'add'){
            $data = $this->input->post('data') ? $this->input->post('data') : array();
            if(count($data) > 0){
                $this->data['result'] = $this->mdlUM->saveUsersGroup($data);
                echo json_encode($this->data);
                exit;
            }
        }

        if ($action == 'edit'){
            $data = $this->input->post('data') ? $this->input->post('data') : array();
            if(count($data) > 0){
                $this->data['result'] = $this->mdlUM->updateUsersGroup($data);
                echo json_encode($this->data);
                exit;
            }
        }

        if ($action == 'delete'){
            $data = $this->input->post('data') ? $this->input->post('data') : array();
            if(count($data) > 0)
            {
                $this->data['result'] = $this->mdlUM->deleteUsersGroup($data);
            }
            echo json_encode($this->data);
            exit;    
        }

        $this->data['title'] = 'Quản lý nhóm người dùng';
        $this->load->view('header', $this->data);
        $this->data['sysGroupUsersList'] = $this->mdlUM->loadUsersGroupList();
        $this->load->view('users_management/sys_users_group', $this->data);
        $this->load->view('footer');
    }
    
    public function umSysUsers(){
        /*
        $access = $this->user->access('umSysUsers');
        if($access === false) {
            show_404(); 
        }

        if(strlen($access) > 5) {
            $this->data['deny'] = $access;
            echo json_encode($this->data);
            exit;
        }
        */
        $this->load->model("Users_management_model", "mdlUM");

        $action = $this->input->post('action') ? $this->input->post('action') : '';

        if ($action == 'add'){
            $saveData = $this->input->post('data') ? $this->input->post('data') : array();
            if(count($saveData) > 0){
                $this->data['result'] = $this->mdlUM->addSysUsers($saveData);
                echo json_encode($this->data);
                exit;
            }
        }

        if ($action == 'edit'){
            $child_action = $this->input->post('child_action') ? $this->input->post('child_action') : array();

            if ($child_action == 'change_password'){
                $rowguid = $this->input->post('rowguid') ? $this->input->post('rowguid') : '';
                $pass    = $this->input->post('pass') ? $this->input->post('pass') : '';
                $this->data['result'] = $this->mdlUM->changeUserPassword($rowguid, $pass);
                echo json_encode($this->data);
                exit;
            }

            $saveData = $this->input->post('data') ? $this->input->post('data') : array();
            if(count($saveData) > 0){
                $this->data['result'] = $this->mdlUM->editSysUsers($saveData);
                echo json_encode($this->data);
                exit;
            }
        }

        if ($action == 'delete'){
            $delData = $this->input->post('data') ? $this->input->post('data') : array();
            if(count($delData) > 0)
            {
                $this->data['result'] = $this->mdlUM->deleteSysUsers($delData);
            }
            echo json_encode($this->data);
            exit;  
        }

        $this->data['title'] = 'Quản lý người dùng';
        $this->load->view('header', $this->data);
        $this->data['sysUsersList'] = $this->mdlUM->loadUsersList();
        $this->data['sysGroupUsersList'] = $this->mdlUM->loadUsersGroupList();
        $this->load->view('users_management/sys_users', $this->data);
        $this->load->view('footer');
    }

    public function umSysPermission(){
        /*
        $access = $this->user->access('umSysPermission');

        if($access === false) {
            show_404();
        }

        if(strlen($access) > 5) {
            $this->data['deny'] = $access;
            echo json_encode($this->data);
            exit;
        }
        */

        $this->load->model("Users_management_model", "mdlUM");

        $action = $this->input->post('action') ? $this->input->post('action') : '';

        if ($action == 'view'){
            $child_action   = $this->input->post('child_action') ? $this->input->post('child_action') : '';
            $ParentID       = $this->input->post('ParentID') ? $this->input->post('ParentID') : '';

            if ($child_action == 'load_user_list'){
                $GroupUserID = $this->input->post('GroupUserID') ? $this->input->post('GroupUserID') : '';
                $this->data['list'] = $this->mdlUM->loadUserListByGroupID($GroupUserID);
                $this->data['menuList'] = $this->mdlUM->loadSysMenuList($ParentID);
                $this->data['sysPermissionList'] = $this->mdlUM->loadSysPermissionList();
                echo json_encode($this->data);
                exit;
            }
        }

        if ($action == 'edit'){
            $saveData = $this->input->post('data') ? $this->input->post('data') : array();

            if(count($saveData) > 0){
                $this->data['result'] = $this->mdlUM->saveSysPermission($saveData);
                echo json_encode($this->data);
                exit;  
            }  
        }

        $this->data['title'] = 'Phân quyền người dùng';
        $this->load->view('header', $this->data);
        $this->data['sysUsersList'] = $this->mdlUM->loadUsersList();
        $this->data['sysGroupUsersList'] = $this->mdlUM->loadUsersGroupList();
        $this->load->view('users_management/sys_permission', $this->data);
        $this->load->view('footer');
    }
}