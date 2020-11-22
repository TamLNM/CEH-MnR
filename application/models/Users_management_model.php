<?php
defined('BASEPATH') OR exit('');

class Users_management_model extends CI_Model
{
    private $ceh;
    private $UC = 'UNICODE';
    private $YardID = '';

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function loadUsersGroupList(){
        $this->ceh->select('GroupUserID, GroupUserName');
        $this->ceh->order_by('GroupUserID');
        $stmt = $this->ceh->get('SYS_GROUPUSERS');
        return $stmt->result_array();
    }

    public function saveUsersGroup($datas){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);

        foreach ($datas as $key => $item) {
            if(isset($item['GroupUserName'])){
                $item['GroupUserName'] = UNICODE.$item['GroupUserName'];
            }

            $item['YardID'] = $this->session->userdata("YardID");
            $item['ModifiedBy'] = $this->session->userdata("UserID");
            $item['UpdateTime'] = date('Y-m-d H:i:s');
            $item['CreateTime'] =  $item['UpdateTime'];

            $checkitem = $this->ceh->select("GroupUserID")->where('GroupUserID', $item['GroupUserID'])
                                                        ->where('YardID', $item['YardID'])
                                                        ->limit(1)->get('SYS_GROUPUSERS')->row_array();
                if(count($checkitem) > 0){
                    /* Do nothing */
                }
                else{
                    $item['CreatedBy'] = $item['ModifiedBy'];
                    $this->ceh->insert('SYS_GROUPUSERS', $item);
                }
        }

        $this->ceh->trans_complete();

        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return TRUE;
        }

        return $result;
    }

    public function updateUsersGroup($datas){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);

        foreach ($datas as $key => $item) {
            if(isset($item['GroupUserName'])){
                $item['GroupUserName'] = UNICODE.$item['GroupUserName'];
            }        

            $checkitem = $this->ceh->select("rowguid")->where('rowguid', $item['rowguid'])
                                                        ->where('YardID', $item['YardID'])
                                                        ->limit(1)->get('SYS_GROUPUSERS')->row_array();
            if(count($checkitem) > 0){
                $item['ModifiedBy'] = $this->session->userdata("UserID");
                $item['UpdateTime'] = date('Y-m-d H:i:s');

                $this->ceh->where('rowguid', $checkitem["rowguid"])->update('SYS_GROUPUSERS', $item);
            }
            else{
                /* Do nothing */
            }
        }

        $this->ceh->trans_complete();

        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return TRUE;
        }

        return $result;
    }

    public function deleteUsersGroup($datas){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);
        $result['error'] = array();
        $result['success'] = array();

        foreach ($datas as $item) {
            $this->ceh->where('rowguid', $item)->delete('SYS_GROUPUSERS');      
            array_push($result['success'], 'Xóa thành công!');
        }

        $this->ceh->trans_complete();

        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return $result;
        }
    }

    public function loadUsersList(){
        $this->ceh->select('A.rowguid as rowguid, A.YardID as YardID, A.GroupUserID as GroupUserID, GroupUserName, UserID, UserName, Pwd, DefaultPwd, PwdDate, BirthDay, Email, IsActive');
        $this->ceh->order_by('A.GroupUserID');
        $this->ceh->join('SYS_GROUPUSERS B', 'A.GroupUserID = B.GroupUserID', 'left');
        $stmt = $this->ceh->get('SYS_USERS A');
        return $stmt->result_array();
    }

    public function changeUserPassword($rowguid = '', $pass = ''){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);

        if ($rowguid != '' && $pass != ''){
            $item['Pwd'] = $pass;

            $checkitem = $this->ceh->select("rowguid")->where('rowguid', $rowguid)->limit(1)->get('SYS_USERS')->row_array();

            if(count($checkitem) > 0){
                $this->ceh->where('rowguid', $rowguid)->update('SYS_USERS', $item);
            }
        }

        $this->ceh->trans_complete();

        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return TRUE;
        }

        return $result;
    }

    public function addSysUsers($datas){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);

        foreach ($datas as $key => $item) {
            if(isset($item['UserName'])){
                $item['UserName'] = UNICODE.$item['UserName'];
            }

            $item['ModifiedBy'] = $this->session->userdata("UserID");
            $item['UpdateTime'] = date('Y-m-d H:i:s');
            $item['CreateTime'] = $item['UpdateTime'];
            $item['CreatedBy']  = $item['ModifiedBy'];
            $item['YardID']     = $this->session->userdata("YardID");
            $item['Pwd']        = $item['InpPwd'];
            $item['DefaultPwd'] = $item['InpDefaultPwd'];
            $item['PwdDate']   = $item['UpdateTime'];

            unset($item['rowguid']);
            unset($item['InpPwd']);
            unset($item['InpDefaultPwd']);

            $checkitem = $this->ceh->select("UserID")->where('UserID', $item['UserID'])
                                                        ->where('YardID', $item['YardID'])
                                                        ->limit(1)->get('SYS_USERS')->row_array();
            if(count($checkitem) > 0){
                /* Do nothing */
            }
            else{
                $this->ceh->insert('SYS_USERS', $item);
            }
        }

        $this->ceh->trans_complete();
        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return TRUE;
        }
        return $result;     
    }

    public function editSysUsers($datas){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);

        foreach ($datas as $key => $item) {
            if(isset($item['UserName'])){
                $item['UserName'] = UNICODE.$item['UserName'];
            }

            unset($item['InpPwd']);
            unset($item['InpDefaultPwd']);
            unset($item['Pwd']);

            $item['UpdateTime'] = date('Y-m-d H:i:s');

            $checkitem = $this->ceh->select("rowguid")->where('rowguid', $item['rowguid'])
                                                    ->where('YardID', $item['YardID'])
                                                    ->limit(1)->get('SYS_USERS')
                                                    ->row_array();
            if(count($checkitem) > 0){
                $this->ceh->where('rowguid', $checkitem['rowguid'])->update('SYS_USERS', $item);
            }
            else{
                /* Do nothing */
            }
        }

        $this->ceh->trans_complete();
        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return TRUE;
        }
        return $result;     
    }

    public function deleteSysUsers($datas){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);
        $result['error'] = array();
        $result['success'] = array();

        foreach ($datas as $item) {
            $this->ceh->where('rowguid', $item)->delete('SYS_USERS');   
        }

        $this->ceh->trans_complete();

        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return $result;
        }
    }

    /* SYS_PERMISSION table */
    public function loadUserListByGroupID($GroupUserID = ''){
        $this->ceh->select('A.GroupUserID as GroupUserID, GroupUserName, UserID, UserName, Email, BirthDay');

        if ($GroupUserID != ''){
            $this->ceh->where('A.GroupUserID', $GroupUserID);
        }

        $this->ceh->where('IsActive', 1);
        
        $this->ceh->join('SYS_GROUPUSERS B', 'A.GroupUserID = B.GroupUserID');
        $this->ceh->order_by('UserID', 'ASC');
        $stmt = $this->ceh->get('SYS_USERS A');
        return $stmt->result_array();
    }

    public function loadSysMenuList($ParentID = ''){
        if ($ParentID != ''){
            $this->ceh->where('ParentID', $ParentID);
            $this->ceh->or_where('rowguid', $ParentID);
        }

        $this->ceh->order_by('OrderBy');
        $stmt = $this->ceh->get('SYS_MENUS');
        return $stmt->result_array();
    }

    public function loadSysPermissionList(){
        $this->ceh->order_by('MenuID');
        $stmt = $this->ceh->get('SYS_PERMISSION');
        return $stmt->result_array();
    }

    public function saveSysPermission($datas){
        $this->ceh->trans_start();
        $this->ceh->trans_strict(FALSE);

        foreach ($datas as $key => $item) {
            if ($item['UserID']){
                $checkitem = $this->ceh->where('GroupUserID', $item['GroupUserID'])
                                    ->where('UserID', $item['UserID'])
                                    ->where('MenuID', $item['MenuID'])
                                    ->limit(1)->get('SYS_PERMISSION')->row_array();
            }
            else{
                $checkitem = $this->ceh->where('GroupUserID', $item['GroupUserID'])
                                    ->where('UserID is NULL')
                                    ->where('MenuID', $item['MenuID'])
                                    ->limit(1)->get('SYS_PERMISSION')->row_array();
            }
            

            if(count($checkitem) > 0){
                $item['UpdateTime'] = date('Y-m-d H:i:s');
                if ($item['UserID']){
                    $this->ceh->where('GroupUserID', $checkitem["GroupUserID"])
                            ->where('UserID', $checkitem["UserID"])
                            ->where('MenuID', $checkitem["MenuID"])
                            ->update('SYS_PERMISSION', $item);
                }
                else{
                    $this->ceh->where('GroupUserID', $checkitem["GroupUserID"])
                            ->where('UserID is NULL')
                            ->where('MenuID', $checkitem["MenuID"])
                            ->update('SYS_PERMISSION', $item);
                }
            }
            else{
                $item['YardID'] = $this->session->userdata("YardID");
                $item['ModifiedBy'] = $this->session->userdata("UserID");
                $item['UpdateTime'] = date('Y-m-d H:i:s');
                $item['CreateTime'] =  $item['UpdateTime'];
                $this->ceh->insert('SYS_PERMISSION', $item);
            }
        }

        $this->ceh->trans_complete();

        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            return TRUE;
        }

        return $result;
    }
}