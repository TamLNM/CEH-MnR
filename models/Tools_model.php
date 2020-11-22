<?php
defined('BASEPATH') OR exit('');

class Tools_model extends CI_Model {
    // private $UC = 'UNICODE';
    private $iYARD = "ITC";

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function query_expertise_and_repair_container_loadDataInput($iCntrNo) {
        $this->ceh->where('CNTRNO', $iCntrNo);
        $this->ceh->order_by('ID');
        $XXX = $this->ceh->get("MR_DT_REPAIR_CONT")->result_array();
        if ( is_array($XXX) && count($XXX) > 0 ) {
            $result['iREPAIR'] = $XXX;

            $this->ceh->where('CNTRNO', $iCntrNo);
            $YYY = $this->ceh->get("MR_DT_REPAIR_CONT_DTL")->result_array();
            if ( is_array($YYY) && count($YYY) > 0 ) { 
                $result['REPAIR_DETAILS'] = $YYY;
            }

            $this->ceh->where('CNTRNO', $iCntrNo);
            $ZZZ = $this->ceh->limit(1)->get("MR_BS_CNTR_INFO")->row_array();
            if ( is_array($ZZZ) && count($ZZZ) > 0 ) { 
                $result['CNTR_AGE'] = $ZZZ;
            }

            return $result;
        }
        else {
            return;
        }
    }

    public function change_repair_container_status_loadDataInput($iCntrNo) {
        $this->ceh->where('CNTRNO', $iCntrNo);
        $this->ceh->order_by('ID');
        $XXX = $this->ceh->get("MR_DT_REPAIR_CONT")->result_array();
        if ( is_array($XXX) && count($XXX) > 0 ) {
            $result['iREPAIR'] = $XXX;
            return $result;
        }
        else {
            return;
        }
    }

    public function change_repair_container_status_saveDATA($frmData) { 
        if ($frmData['CNTRNO'] == "" || $frmData['ESTIMATENO'] == "") return;
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        //CANCEL
        if ( $frmData['CANCLEDATE'] != "" ) {
            // $frmDate['CANCELBY'] = $this->session->userdata("UserID");
            $frmData['REPAIR_STATUS'] = 'X';
        }
        else {
            unset($frmData['CANCELBY']);
            //COMPLETED
            if ( $frmData['COMPLETEDDATE'] != "" ) {
                // $frmDate['COMPLETEDBY'] = $this->session->userdata("UserID");
                $frmData['REPAIR_STATUS'] = 'C';
            }
            else {
                unset($frmData['COMPLETEDBY']);
                //REPAIR
                if ( $frmData['REPAIRDATE'] != "" ) {
                    // $frmDate['REPAIRBY'] = $this->session->userdata("UserID");
                    $frmData['REPAIR_STATUS'] = 'R';
                }
                else {
                    unset($frmData['REPAIRBY']);
                    //APPROVAL
                    if ( $frmData['APPRPVALDATE'] != "" ) {
                        // $frmDate['APPROVALBY'] = $this->session->userdata("UserID");
                        $frmData['REPAIR_STATUS'] = 'A';
                    }
                    else {
                        unset($frmData['APPROVALBY']);
                        //ESTIMATE
                        if ( $frmData['ESTIMATEDATE'] != "" ) {
                            // $frmDate['ESTIMATEBY'] = $this->session->userdata("UserID");
                            $frmData['REPAIR_STATUS'] = 'E';
                        }
                        else {
                            unset($frmData['ESTIMATEBY']);
                        }
                    }
                }
            }
        }

        unset($frmData['SZTP']);
        unset($frmData['CMSTATUS']);
        unset($frmData['OPR']);
        unset($frmData['YARDPOS']);
        unset($frmData['CONTCONDITION']);
        unset($frmData['GATEIN_DATE']);
        unset($frmData['REMARKS_CNTR']);
        // unset($frmData['ROWGUID']);

        $frmData['MODIFIEDBY'] = $this->session->userdata("UserID");
        $frmData['UPDATE_TIME'] = date('Y-m-d H:i:s');
        $this->ceh->where("ESTIMATENO", $frmData['ESTIMATENO'])
                ->where("CNTRNO", $frmData['CNTRNO'])
                ->where("YARD_ID", $this->iYARD)
                ->update('MR_DT_REPAIR_CONT', $frmData);
        
        $this->ceh->trans_complete();
        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            $result['iStatus'] = 'Fail';
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            $result['iStatus'] = 'Success';
            return $result;
        }
    }

}
