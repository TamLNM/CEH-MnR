<?php
defined('BASEPATH') OR exit('');

class Setting_file_model extends CI_Model
{
    private $ceh;
    private $UC = 'UNICODE';
    private $yard_id = '';

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);
        $this->yard_id = $this->config->item('YARD_ID');
    }
    
}
