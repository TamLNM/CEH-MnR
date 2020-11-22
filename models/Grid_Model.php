<?php
defined('BASEPATH') OR exit('');

class Grid_Model extends CI_Model {
    // private $UC = 'UNICODE';
    // private $YardID = '';

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function load_TableColumns($iTableName){
        $this->ceh->where("FormName", $iTableName);
        $this->ceh->order_by('C_Index', 'ASC');
        $result_data = $this->ceh->get('SYS_P_CONFIG_GRID');
        return $result_data->result_array();
    }
}
