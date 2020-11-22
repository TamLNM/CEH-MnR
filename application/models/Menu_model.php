<?php
defined('BASEPATH') OR exit('');

class menu_model extends CI_Model
{
    private $ceh;
    function __construct() {
        parent::__construct();

        $this->load->helper(array('form','url'));
        $this->load->library(array('session'));
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function getMenu() {
        $stmt = $this->ceh->where('ParentID IS NULL')
                        ->order_by('OrderBy', 'ASC')
                        ->where('AppID', 'MnR')
                        ->get('SA_MENU');

        $results = $stmt->result_array();
        $menu_r = array();

        foreach($results as $result) {
            $menu_r[$result['MenuID']]['MenuID'] = $result['MenuID'];
            $menu_r[$result['MenuID']]['MenuName'] = $result['MenuName'];
            $menu_r[$result['MenuID']]['MenuID'] = $result['MenuID'];
            $menu_r[$result['MenuID']]['MenuIcon'] = $result['MenuIcon'];
            $submenu = $this->getSubMenu($result['MenuID']);
            $menu_r[$result['MenuID']]['submenu'] = $submenu;
            foreach ($submenu as $val) {
                $menu_r[$result['MenuID']]['submenu'][$val['MenuID']]['MenuID'] = $val['MenuID'];
                $menu_r[$result['MenuID']]['submenu'][$val['MenuID']]['MenuName'] = $val['MenuName'];
                $menu_r[$result['MenuID']]['submenu'][$val['MenuID']]['MenuID'] = $val['MenuID'];
                $menu_r[$result['MenuID']]['submenu'][$val['MenuID']]['MenuIcon'] = $val['MenuIcon'];
            }
        }

        return $menu_r;
    }

    public function getParentMenu() {
        $stmt = $this->ceh->where('ParentID IS NULL')
                            ->order_by('OrderBy', 'ASC')
                            ->get('SA_MENU');
        return $stmt->result_array();
    }

    public function getMenuID($MenuID) {
        $stmt = $this->ceh->where('MenuID', $MenuID)
                            ->order_by('OrderBy', 'ASC')
                            ->get('SA_MENU');

        $results = $stmt->result_array();
        $menu_r = array();

        foreach($results as $result) {
            $menu_r[$result['MenuID']]['MenuID'] = $result['MenuID'];
            $menu_r[$result['MenuID']]['MenuID'] = $result['MenuID'];
            $menu_r[$result['MenuID']]['MenuName'] = $result['MenuName'];
            $menu_r[$result['MenuID']]['MenuIcon'] = $result['MenuIcon'];
            $menu_r[$result['MenuID']]['submenu'] = $this->getSubMenu($result['MenuID']);
        }
        return $menu_r;
    }

    public function getSubMenu($pMenu) {
        $submenu_r = array();

        $userID = $this->session->userdata('UserID');
        $stmt = $this->ceh->select('A.rowguid as rowguid, A.MenuID as MenuID, MenuName, MenuIcon')
                            ->where('ParentID', $pMenu)
                            ->where('AppID', 'MnR')
                            ->where('IsVisible', 1)
                            ->order_by('OrderBy', 'ASC')
                            ->get('SA_MENU A');

        $menus = $stmt->result_array();

        foreach($menus as $menu) {
            //if ($menu['IsView'] == 1){
                $submenu_r[$menu['MenuID']]['MenuID'] = $menu['MenuID'];
                $submenu_r[$menu['MenuID']]['MenuName'] = $menu['MenuName'];
                $submenu_r[$menu['MenuID']]['MenuIcon'] = $menu['MenuIcon'];
            //}
        }
        return $submenu_r;
    }

    public function getAllMenus() {
        $stmt = $this->ceh->where('ParentID IS NULL')
                            ->order_by('OrderBy', 'ASC')
                            ->get('SA_MENU');

        $results = $stmt->result_array();
        $menu_r = array();

        foreach($results as $result) {
            $menu_r[$result['MenuID']]['MenuID'] = $result['MenuID'];
            $menu_r[$result['MenuID']]['MenuName'] = $result['MenuName'];
            $menu_r[$result['MenuID']]['MenuID'] = $result['MenuID'];
            $menu_r[$result['MenuID']]['submenu'] = $this->getSubMenu($result['MenuID']);
        }
        return $menu_r;
    }

    public function getAllSubs($p_id) {

        $submenu_r = array();

        $this->ceh->get('SA_MENU');

        $stmt = $this->ceh->where('ParentID', $p_id)
                            ->order_by('OrderBy', 'ASC')
                            ->get('SA_MENU');

        $menus = $stmt->result_array();

        foreach($menus as $menu) {
            $submenu_r[$menu['MenuID']]['MenuID'] = $menu['MenuID'];
            $submenu_r[$menu['MenuID']]['MenuID'] = $menu['MenuID'];
            $submenu_r[$menu['MenuID']]['MenuName'] = $menu['MenuName'];
            $submenu_r[$menu['MenuID']]['MenuIcon'] = $menu['MenuIcon'];
        }
        return $submenu_r;
    }
}