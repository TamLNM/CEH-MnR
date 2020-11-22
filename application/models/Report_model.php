<?php
defined('BASEPATH') OR exit('');

class report_model extends CI_Model
{
    private $ceh;
    private $UC = 'UNICODE';
    private $yard_id = '';

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);

        $this->yard_id = $this->config->item("YARD_ID");
    }


    public function rpContainerStock_loadData($arrs) {
        $this->ceh->select("T0.CntrNo, T0.ContCondition, T0.ISO_SZTP, T0.OprID, T0.DateIn")
                ->select("COALESCE(T0.cArea, T0.cBlock+'-'+T0.cBay+'-'+T0.cRow+'-'+T0.cTier) YardLocation")
                ->select("T1.AGE_DATE, T2.ESTIMATEDATE, T2.APPRPVALDATE, T2.REPAIRDATE, T2.COMPLETEDDATE, T2.CANCLEDATE, T2.REPAIR_STATUS, T0.Note")
                ->join("MR_BS_CNTR_INFO T1", "T1.CNTRNO = T0.CntrNo AND T1.OPRID = T0.OprID AND T1.YARD_ID = T0.YARD_ID", "LEFT")
                ->join("MR_DT_REPAIR_CONT T2", "T0.rowguid = T2.MASTER_ROWGUID AND T0.YARD_ID = T2.YARD_ID", "LEFT");
        $this->ceh->where("T0.CMStatus", "S")
                ->where("T0.Status", "E")
                ->where("T0.DateIn <=", $arrs['DateIn']);
        if ($arrs['OprID'] != "*") { $this->ceh->where("T0.OprID", $arrs['OprID']); }
        if ($arrs['ISO_SZTP'] == "2") { $this->ceh->where("LEFT(T0.ISO_SZTP, 1) = '2'"); }
        else if ($arrs['ISO_SZTP'] == "4") { $this->ceh->where("LEFT(T0.ISO_SZTP, 1) = '4'"); }
        else if ($arrs['ISO_SZTP'] == "5") { $this->ceh->where("LEFT(T0.ISO_SZTP, 1) IN ('L','M')"); }
        if ($arrs['ContCondition'] != "*") { $this->ceh->where("T0.ContCondition", $arrs['ContCondition']); }
        if ($arrs['Type'] == "R") { $this->ceh->where("SUBSTRING(T0.ISO_SZTP, 3, 1) = 'R'"); }
        if ($arrs['REPAIR_STATUS'] != "*") { $this->ceh->where("T2.REPAIR_STATUS", $arrs['REPAIR_STATUS']); }
        
        $ZZZ = $this->ceh->get("CNTR_DETAILS T0");
        // print_r($ZZZ);
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }

    public function rpEstimateOfRepair_loadData($arrs) {
        $this->ceh->select("T0.CNTRNO, T0.SZTP, T0.OPR, T0.CONTCONDITION, T0.GATEIN_DATE, T0.ESTIMATENO, T0.VENDOR_ID, T1.PAYERTYPE, T0.ESTIMATEDATE, T0.APPRPVALDATE, T0.REPAIRDATE, T2.COMP_NAME_EN")
                ->select("T0.COMPLETEDDATE, T0.CANCLEDATE, T1.COMP_ID, T1.LOC_ID, T1.DAM_ID, T1.REP_ID, T1.LENGTH, T1.WIDTH, T1.QUANTITY, T1.HOURS, T1.LABOR_PRICE, T1.MATE_PRICE, T1.TOTAL")
                ->join("MR_DT_REPAIR_CONT_DTL T1", "T0.CNTRNO = T1.CNTRNO AND T0.ESTIMATENO = T1.ESTIMATENO AND T0.YARD_ID = T1.YARD_ID", "LEFT")
                ->join("MR_BS_COMPONENT T2", "T1.COMP_ID = T2.COMP_ID")
                ->where("T0.ESTIMATEDATE >=", $arrs['FormDate'])
                ->where("T0.ESTIMATEDATE <=", $arrs['ToDate']);;
        // $this->ceh->where("T0.CMStatus", "S")
        //         ->where("T0.Status", "E")
        //         ->where("T0.DateIn <=", $arrs['DateIn']);
        if ($arrs['OPR'] != "*") { $this->ceh->where("T0.OPR", $arrs['OPR']); }
        if ($arrs['SZTP'] == "2") { $this->ceh->where("LEFT(T0.SZTP, 1) = '2'"); }
        else if ($arrs['SZTP'] == "4") { $this->ceh->where("LEFT(T0.SZTP, 1) = '4'"); }
        else if ($arrs['SZTP'] == "5") { $this->ceh->where("LEFT(T0.SZTP, 1) IN ('L','M')"); }
        if ($arrs['CONTCONDITION'] != "*") { $this->ceh->where("T0.CONTCONDITION", $arrs['CONTCONDITION']); }
        if ($arrs['Type'] == "R") { $this->ceh->where("SUBSTRING(T0.SZTP, 3, 1) = 'R'"); }
        if ($arrs['REPAIR_STATUS'] != "*") { $this->ceh->where("T0.REPAIR_STATUS", $arrs['REPAIR_STATUS']); }
        if (count($arrs['PAYERTYPE']) > 0) { $this->ceh->where_in('T1.PAYERTYPE', $arrs['PAYERTYPE']); }
        $this->ceh->order_by("T0.ESTIMATENO, T0.CNTRNO");
        $ZZZ = $this->ceh->get("MR_DT_REPAIR_CONT T0");
        // print_r($ZZZ);
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }
    

    
}