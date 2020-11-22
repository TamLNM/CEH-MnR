<?php
defined('BASEPATH') OR exit('');

class ExpertiseAndRepair_model extends CI_Model {
    // private $UC = 'UNICODE';
    private $iYARD = "ITC";

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function view_expertise_container_list_loadData($arrs) {
        $xxREPAIR = "";
        $xxCNTRDETAILS = "";
        if ($arrs['OPR'] != "*") {
            $xxREPAIR = $xxREPAIR." AND OPR='".$arrs['OPR']."'";
            $xxCNTRDETAILS = $xxCNTRDETAILS." AND OprID='".$arrs['OPR']."'";
        }
        if ($arrs['CNTRNO'] != "") {
            $xxREPAIR = $xxREPAIR." AND CNTRNO='".$arrs['CNTRNO']."'";
            $xxCNTRDETAILS = $xxCNTRDETAILS." AND CntrNo='".$arrs['CNTRNO']."'";
        }
        switch ($arrs['SZTP']) {
            case "2":
            case "4":
                $xxREPAIR = $xxREPAIR." AND LEFT(SZTP, 1)='".$arrs['SZTP']."'";
                $xxCNTRDETAILS = $xxCNTRDETAILS." AND LEFT(ISO_SZTP, 1)='".$arrs['SZTP']."'";
                break;
            case "5":
                $xxREPAIR = $xxREPAIR." AND LEFT(SZTP, 1) IN ('L','M')";
                $xxCNTRDETAILS = $xxCNTRDETAILS." AND LEFT(ISO_SZTP, 1) IN ('L','M')";
                break;
            default: break;
        }
        // if ($arrs['SZTP'] != "*") {
        //     $xxREPAIR = $xxREPAIR." AND LEFT(SZTP, 1)='".$arrs['SZTP']."'";
        //     $xxCNTRDETAILS = $xxCNTRDETAILS." AND LEFT(ISO_SZTP, 1)='".$arrs['SZTP']."'";
        // }
        if ($arrs['CONTCONDITION'] != "*") {
            $xxREPAIR = $xxREPAIR." AND CONTCONDITION='".$arrs['CONTCONDITION']."'";
            $xxCNTRDETAILS = $xxCNTRDETAILS." AND ContCondition='".$arrs['CONTCONDITION']."'";
        }
        if ($arrs['CMStatus'] != "*") {
            $xxREPAIR = $xxREPAIR." AND CMSTATUS='".$arrs['CMStatus']."'";
            $xxCNTRDETAILS = $xxCNTRDETAILS." AND CMStatus='".$arrs['CMStatus']."'";
        }
        if ($arrs['ESTIMATENO'] != "") {
            $xxREPAIR = $xxREPAIR." AND ESTIMATENO='".$arrs['ESTIMATENO']."'";
        }
        $iSQL = "SELECT CNTRNO, SZTP, OPR, YARDPOS, GATEIN_DATE, CONTCONDITION, REMARKS_CNTR, ESTIMATENO, ESTIMATEDATE, ESTIMATEBY,
                    APPROVALBY, APPRPVALDATE, COMPLETEDBY, COMPLETEDDATE, BOXSTATUS, BOXCOMPLETED_DATE, 
                    MACHINESTATUS, MACHINECOMPLETED_DATE, DISCOUNT_RATE, VAT_RATE, DESCRIPTION_ESTIMATE,
                    MASTER_ROWGUID
                FROM dbo.MR_DT_REPAIR_CONT
                WHERE 1=1
                    AND (ESTIMATEDATE BETWEEN N? AND N?)" . $xxREPAIR . "
                UNION
                SELECT CntrNo, ISO_SZTP, OprID, COALESCE(IIF(ISNULL(cArea,'')='',NULL,cArea), cBlock+'-'+cBay+'-'+cRow+'-'+cTier), DateIn, ContCondition, Note, NULL, NULL, NULL,
                    NULL, NULL, NULL, NULL, NULL, NULL,
                    NULL, NULL, NULL, NULL, NULL, rowguid
                FROM dbo.CNTR_DETAILS
                WHERE 1=1
                    AND CHARINDEX(',' + ContCondition + ',', ',C,D,U,', 0) <> 0
                    AND (IsRepair IS NULL OR IsRepair = 0)
                    AND Status='E'
                    AND (DateIn BETWEEN N? AND N?)" . $xxCNTRDETAILS;

        $iWHERE = array (
            $arrs['FormDate'],
            $arrs['ToDate'],
            $arrs['FormDate'],
            $arrs['ToDate']
        );

        $ZZZ = $this->ceh->query($iSQL, $iWHERE);
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }

    public function view_quote_and_repair_loadReport($arrs){
        $iSQL1 = "SELECT TOP 1 T0.CNTRNO, CONVERT(NVARCHAR(10), T0.ESTIMATEDATE, 103) ESTIMATEDATE, T0.ESTIMATENO,
                    T0.SZTP, T3.LABOR_RATE, T0.DESCRIPTION_ESTIMATE, CONVERT(NVARCHAR(10), T4.AGE_DATE, 103) AGE_DATE,
                    CONVERT(NVARCHAR(10), T0.APPRPVALDATE, 103) APPRPVALDATE, CONVERT(NVARCHAR(10), T0.COMPLETEDDATE, 103) COMPLETEDDATE
                FROM dbo.MR_DT_REPAIR_CONT T0
                LEFT JOIN dbo.MR_BS_TARIFF_GROUP_OPR T2 ON T2.OPR_ID = T0.OPR AND T2.YARD_ID = T0.YARD_ID AND T2.IsReefer = IIF(SUBSTRING(T0.SZTP,3,1)='R',1,0)
                LEFT JOIN dbo.MR_BS_TARIFF_GROUP T3 ON T2.TR_ROWGUID = T3.ROWGUID AND T2.YARD_ID = T3.YARD_ID
                LEFT JOIN dbo.MR_BS_CNTR_INFO T4 ON T4.CNTRNO = T0.CNTRNO AND T4.YARD_ID = T0.YARD_ID
                WHERE T0.CNTRNO=? AND T0.ESTIMATENO=? AND T0.YARD_ID=?";
        $where_1 = array(
			'CNTRNO' => $arrs['CNTRNO'],
			'ESTIMATENO' => $arrs['ESTIMATENO'],
			'YARD_ID' => $this->iYARD
        );
        $result['xMaster'] = $this->ceh->query($iSQL1, $where_1)->row_array();

        $result['xDetails'] = $this->ceh->select("T0.COMP_ID, T1.COMP_NAME_EN, T0.DAM_ID, T0.LOC_ID, T0.REP_ID, T0.LENGTH, T0.WIDTH, T0.QUANTITY, T0.UNIT, T0.HOURS, T0.LABOR_PRICE, T0.MATE_PRICE, T0.TOTAL, T0.PAYERTYPE as PAYERTYPE")
                                ->join("MR_BS_COMPONENT T1", "T0.COMP_ID = T1.COMP_ID AND T0.YARD_ID = T1.YARD_ID", "LEFT")
                                ->where("T0.CNTRNO", $arrs['CNTRNO'])
                                ->where("T0.ESTIMATENO", $arrs['ESTIMATENO'])
                                ->get("MR_DT_REPAIR_CONT_DTL T0")->result_array();
        return $result;
    }
    
    public function view_quote_and_repair_loadDataInput($iCntrNo, $iEstimateNo, $iMasterRowguid) {
        if ($iEstimateNo != "") {
            $this->ceh->where("ESTIMATENO", $iEstimateNo);
        }
        else {
            $this->ceh->where("CHARINDEX(',' + REPAIR_STATUS + ',', ',C,X,', 0) = 0");
        }
        $this->ceh->where('CNTRNO', $iCntrNo);
        $this->ceh->order_by('ID DESC');
        $XXX = $this->ceh->limit(1)->get("MR_DT_REPAIR_CONT")->row_array();
        if ( is_array($XXX) && count($XXX) > 0 ) {
            $result['iREPAIR'] = $XXX;
            $XXX_A = $this->ceh->where('CNTRNO', $XXX['CNTRNO'])
                            ->where('ESTIMATENO', $XXX['ESTIMATENO'])
                            ->get("MR_DT_REPAIR_CONT_DTL")->result_array();
            
            // $XXX_B = $this->ceh->where('OPR_ID', $XXX['OPR'])
            //                 ->where('IsReefer', (substr($XXX['SZTP'], 2, 1) == "R" ? 1 : 0))
            //                 ->limit(1)->get("MR_BS_TARIFF_GROUP")->row_array();

            $XXX_B = $this->ceh->select('T1.GROUP_TRF_ID, T1.LABOR_RATE')
                            ->join("MR_BS_TARIFF_GROUP T1", "T0.TR_ROWGUID = T1.ROWGUID AND T0.YARD_ID = T1.YARD_ID", "INNER")
                            ->where("T0.OPR_ID", $XXX['OPR'])
                            ->where("T1.IsReefer", (substr($XXX['SZTP'], 2, 1) == "R" ? 1 : 0))
                            ->get("MR_BS_TARIFF_GROUP_OPR T0")->row_array();

            $result['MR_BS_TARIFF_GROUP'] = $XXX_B;
            $result['REPAIR_DETAILS'] = $XXX_A;

            $XXX_C = $this->ceh->where("CNTRNO", $iCntrNo)->limit(1)->get("MR_BS_CNTR_INFO")->row_array();
            $result['CNTR_AGE'] = $XXX_C;
            return $result;
        }
        else {
            if ($iMasterRowguid != "") {
                $this->ceh->where("rowguid", $iMasterRowguid);
            }
            else {
                $this->ceh->where('CntrNo', $iCntrNo)
                    ->where("CHARINDEX(',' + ContCondition + ',', ',C,D,U,', 0) <> 0")
                    ->where("(IsRepair IS NULL OR IsRepair <> 1)")
                    ->where("Status", "E")
                    ->where("CMStatus <>", "D");
            }
            
            $this->ceh->order_by("ID DESC");
            $YYY = $this->ceh->limit(1)->get("CNTR_DETAILS")->row_array();
            if ( is_array($YYY) && count($YYY) > 0 ) {
                $result['iCNTRDETAILS'] = $YYY;

                // $YYY_B = $this->ceh->where('OPR_ID', $YYY['OprID'])
                //             ->where('IsReefer', (substr($YYY['ISO_SZTP'], 2, 1) == "R" ? 1 : 0))
                //             ->limit(1)->get("MR_BS_TARIFF_GROUP")->row_array();

                $YYY_B = $this->ceh->select('T1.GROUP_TRF_ID, T1.LABOR_RATE')
                                ->join("MR_BS_TARIFF_GROUP T1", "T0.TR_ROWGUID = T1.ROWGUID AND T0.YARD_ID = T1.YARD_ID", "INNER")
                                ->where("T0.OPR_ID", $YYY['OprID'])
                                ->where("T1.IsReefer", (substr($YYY['ISO_SZTP'], 2, 1) == "R" ? 1 : 0))
                                ->get("MR_BS_TARIFF_GROUP_OPR T0")->row_array();
                $result['MR_BS_TARIFF_GROUP'] = $YYY_B;

                $YYY_C = $this->ceh->where("CNTRNO", $iCntrNo)->limit(1)->get("MR_BS_CNTR_INFO")->row_array();
                $result['CNTR_AGE'] = $YYY_C;
                return $result;
            }
            else {
                return;
            }
        }
    }

    public function view_quote_and_repair_saveDATA($frmData, $gridData) {
        $isAddNew = false;
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);

        if ($frmData['ESTIMATENO'] == "") {
            $isAddNew = true;
            $frmData['ESTIMATENO'] = $this->generateEirNo();
        }

        $frmData['REMARKS_CNTR'] = UNICODE.$frmData['REMARKS_CNTR'];
        $frmData['DESCRIPTION_ESTIMATE'] = UNICODE.$frmData['DESCRIPTION_ESTIMATE'];
        $frmData['VENDOR_ID'] = UNICODE.$frmData['VENDOR_ID'];

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

        if ($isAddNew) {
            //Cập nhật 1 số thông tin ESTIMATE
            // $frmData['REPAIR_STATUS'] = 'E';
            // $frmData['ESTIMATEBY'] = $this->session->userdata("UserID");
            // $frmData['ESTIMATEDATE'] = date('Y-m-d H:i:s');

            $frmData['YARD_ID'] = $this->iYARD;
            $frmData['CREATEBY'] = $this->session->userdata("UserID");
            $frmData['INSERT_TIME'] = date('Y-m-d H:i:s');
            $this->ceh->insert('MR_DT_REPAIR_CONT', $frmData);
            $updateAddNew_CntrDetails = array (
                'IsRepair' => 1,
                'ModifiedBy' => $this->session->userdata("UserID"),
                'update_time' => date('Y-m-d H:i:s')
            );
            if ($frmData['REPAIR_STATUS'] == 'C') { $updateAddNew_CntrDetails['ContCondition'] = 'B'; }
            $this->ceh->where('rowguid', $frmData['MASTER_ROWGUID'])->update('CNTR_DETAILS', $updateAddNew_CntrDetails);
        }
        else {
            $frmData['MODIFIEDBY'] = $this->session->userdata("UserID");
            $frmData['UPDATE_TIME'] = date('Y-m-d H:i:s');
            $this->ceh->where("ESTIMATENO", $frmData['ESTIMATENO'])
                    ->where("CNTRNO", $frmData['CNTRNO'])
                    ->where("YARD_ID", $this->iYARD)
                    ->update('MR_DT_REPAIR_CONT', $frmData);
            $this->ceh->where('rowguid', $frmData['MASTER_ROWGUID'])->update('CNTR_DETAILS', array('ContCondition' => 'B',
                                                                                                'ModifiedBy' => $this->session->userdata("UserID"),
                                                                                                'update_time' => date('Y-m-d H:i:s')));     
        }

        $detailChange = false;
        foreach ($gridData as $key => $item) { 
            if($item['COMP_ID'] == "" || $item['REP_ID'] == "") {
                continue;
            }

            $item['REMARKS'] = UNICODE.$item['REMARKS'];
            

            if (isset($item['ROWGUID']) && $item['ROWGUID'] != "") {
                $itemX = $this->ceh->select('ROWGUID')
                                    ->where('ROWGUID', $item['ROWGUID'])
                                    ->get("MR_DT_REPAIR_CONT_DTL")
                                    ->row_array();
                if (is_array($itemX) && count($itemX) > 0) {
                    unset($item['ROWGUID']);
                    $item['MODIFIEDBY'] = $this->session->userdata("UserID");
                    $item['UPDATE_TIME'] = date('Y-m-d H:i:s');
                    $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->update("MR_DT_REPAIR_CONT_DTL", $item);
                }
            }
            else {
                unset($item['ROWGUID']);
                $item['YARD_ID'] = $this->iYARD;
                $item['CREATEBY'] = $this->session->userdata("UserID");
                $item['INSERT_TIME'] = date('Y-m-d H:i:s');
                $item['CNTRNO'] = $frmData['CNTRNO'];
                $item['ESTIMATENO'] = $frmData['ESTIMATENO'];
                $this->ceh->insert("MR_DT_REPAIR_CONT_DTL", $item);
            }
            $detailChange = true;
        }

        $XXX_A = $this->ceh->where('CNTRNO', $frmData['CNTRNO'])
                            ->where('ESTIMATENO', $frmData['ESTIMATENO'])
                            ->get("MR_DT_REPAIR_CONT_DTL")->result_array();

       

        $this->ceh->trans_complete();
        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            $result['iStatus'] = 'Fail';
            return FALSE;
        }
        else {
            $this->ceh->trans_commit();
            $result['iStatus'] = 'Success';
            $result['iESTIMATENO'] = $frmData['ESTIMATENO'];
            if ($detailChange) $result['REPAIR_DETAILS'] = $XXX_A;
            // $loxz=('{"item_rp":'.json_encode($itemrp).',"order_rp":'.json_encode($itemrp).'}');
            // $this->send_mail($dataform['ORDERNO']);  
            // die($loxz);             
            return $result;
        }
    }

    public function view_quote_and_repair_deleteDATA($gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $result['success'] = array();

        foreach ($gridData as $key => $item) { 
            // $this->ceh->select('ROWGUID')
            //         ->where('YARD_ID', $this->iYARD)
            //         ->where('ROWGUID', $item['GROUP_TRF_ID'])
            //         ->where('COMP_ID', $item['COMP_ID'])
            //         ->where('REP_ID', $item['REP_ID']);
            // if ($item['LOC_ID'] != "") { $this->ceh->where('LOC_ID', $item['LOC_ID']); }
            // $itemX = $this->ceh->limit(1)->get("MR_BS_TARIFF_REPAIR")->row_array();
            // if (is_array($itemX) && count($itemX) > 0) { 
            $this->ceh->where("ROWGUID", $item['ROWGUID'])->delete("MR_BS_TARIFF_REPAIR");
            // array_push($result['success'], $item['ROWGUID']);
            array_push($result['success'], $item);
            // array_push($result['success'], JSON.stringify($item));
            
            // }
        }
        // $this->ceh->trans_rollback();
        // $result['iStatus'] = 'Success';
        // return $result;
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

    public function view_approval_confirm_loadData($arrs) {
        $this->ceh->select("T0.ROWGUID, T0.CNTRNO, T0.ESTIMATENO, T0.OPR, T0.SZTP, T0.CONTCONDITION, T0.GATEIN_DATE, SUM(ISNULL(T1.TOTAL,0)) TOTAL,
                            T0.ESTIMATEBY, T0.ESTIMATEDATE, T0.APPRPVALDATE, T0.REPAIRDATE, T0.COMPLETEDDATE, T0.DESCRIPTION_ESTIMATE, T0.REMARKS_CNTR")
                ->join("MR_DT_REPAIR_CONT_DTL T1", "T0.CNTRNO = T1.CNTRNO AND T0.ESTIMATENO = T1.ESTIMATENO", "LEFT")
                ->group_by("T0.ROWGUID, T0.CNTRNO, T0.ESTIMATENO, T0.OPR, T0.SZTP, T0.CONTCONDITION, T0.GATEIN_DATE,
                            T0.ESTIMATEBY, T0.ESTIMATEDATE, T0.APPRPVALDATE, T0.REPAIRDATE, T0.COMPLETEDDATE, T0.DESCRIPTION_ESTIMATE, T0.REMARKS_CNTR")
                ->where("T0.ESTIMATEDATE >=", $arrs['FormDate'])
                ->where("T0.ESTIMATEDATE <=", $arrs['ToDate']);
        if($arrs['OPR'] != "*") { $this->ceh->where("T0.OPR", $arrs['OPR']); }
        if($arrs['CNTRNO'] != "") { $this->ceh->where("T0.CNTRNO", $arrs['CNTRNO']); }
        if($arrs['CONTCONDITION'] != "*") { $this->ceh->where("T0.CONTCONDITION", $arrs['CONTCONDITION']); }
        if ($arrs['SZTP'] == "2") { $this->ceh->where("LEFT(T0.SZTP, 1) = '2'"); }
        else if ($arrs['SZTP'] == "4") { $this->ceh->where("LEFT(T0.SZTP, 1) = '4'"); }
        else if ($arrs['SZTP'] == "5") { $this->ceh->where("LEFT(T0.SZTP, 1) IN ('L','M')"); }
        
        $this->ceh->order_by("T0.ESTIMATENO");
        $ZZZ = $this->ceh->get("MR_DT_REPAIR_CONT T0");
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }

    public function view_approval_confirm_saveDATA($arrs) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        foreach ($arrs as $key => $item) { 
            $item['DESCRIPTION_ESTIMATE'] = UNICODE.$item['DESCRIPTION_ESTIMATE'];
            $item['REMARKS_CNTR'] = UNICODE.$item['REMARKS_CNTR'];
            if (isset($item['ROWGUID']) && $item['ROWGUID'] != "") {
                $itemX = $this->ceh->select('ROWGUID, MASTER_ROWGUID')
                                    ->where('ROWGUID', $item['ROWGUID'])
                                    ->get("MR_DT_REPAIR_CONT")
                                    ->row_array();
                if (is_array($itemX) && count($itemX) > 0) {
                    unset($item['ROWGUID']);
                    unset($item['CNTRNO']);
                    unset($item['SZTP']);
                    unset($item['OPR']);
                    unset($item['GATEIN_DATE']);
                    unset($item['ESTIMATENO']);
                    unset($item['CONTCONDITION']);
                    unset($item['TOTAL']);
                    
                    if ( $item['COMPLETEDDATE'] != "" ) {
                        $item['COMPLETEDBY'] = $this->session->userdata("UserID");
                        $item['REPAIR_STATUS'] = 'C';
                    }
                    else {
                        unset($item['COMPLETEDDATE']);
                        if ( $item['REPAIRDATE'] != "" ) {
                            $item['REPAIRBY'] = $this->session->userdata("UserID");
                            $item['REPAIR_STATUS'] = 'R';
                        }
                        else {
                            unset($item['REPAIRDATE']);
                            if ( $item['APPRPVALDATE'] != "" ) {
                                $item['APPROVALBY'] = $this->session->userdata("UserID");
                                $item['REPAIR_STATUS'] = 'A';
                            }
                            else {
                                unset($item['APPRPVALDATE']);
                                if ( $item['ESTIMATEDATE'] != "" ) {
                                    $item['ESTIMATEBY'] = $this->session->userdata("UserID");
                                    $item['REPAIR_STATUS'] = 'E';
                                }
                                else {
                                    unset($item['ESTIMATEBY']);
                                }
                            }
                        }
                    }
                    $item['MODIFIEDBY'] = $this->session->userdata("UserID");
                    $item['UPDATE_TIME'] = date('Y-m-d H:i:s');
                    $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->update("MR_DT_REPAIR_CONT", $item);

                    if (isset($item['REPAIR_STATUS']) && $item['REPAIR_STATUS'] == "C") {
                        $updateAddNew_CntrDetails = array (
                            'ContCondition' => 'B',
                            'ModifiedBy' => $this->session->userdata("UserID"),
                            'update_time' => date('Y-m-d H:i:s')
                        );
                        $this->ceh->where('rowguid', $itemX['MASTER_ROWGUID'])->update('CNTR_DETAILS', $updateAddNew_CntrDetails);
                    }
                }
            }
        }
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

    public function generateEirNo() {
        $prefix_t = 'R'.date('y').date('m').date('d');

        $cdb = $this->ceh->select('ISNULL(Max(RIGHT(ESTIMATENO,10)), 0) ESTIMATENO')
                                        ->where('LEFT(ESTIMATENO, 7) = ', $prefix_t)
                                        ->where('YARD_ID', $this->iYARD)
                                        ->get("MR_DT_REPAIR_CONT")->row_array();

        return ( intval( $cdb[ 'ESTIMATENO' ] ) > 0 ) ? ( intval( $cdb[ 'ESTIMATENO' ] ) + 1 ) : $prefix_t."0001";
    }

    public function dbDateTime($strDateTime){
        if($strDateTime == '' || empty($strDateTime) || (strpos($strDateTime, '/')  === false && strpos($strDateTime, '-')  === false)) return '';
        $dts = explode(' ', $strDateTime);
        $date = date('Y-m-d', strtotime(implode('-', array_reverse(explode('/',$dts[0])))));
        $datetime = isset($dts[1]) ? date('Y-m-d H:i:s', strtotime($date.$dts[1])) : date('Y-m-d H:i:s', strtotime($date.' 00:00:00'));
        return $datetime;
    }

    public function readExcel(){
        $this->load->library('upload');
        $upload_data = $this->upload->data();
       //print_r($bill);die();
        $this->load->library('excel');
        error_reporting(0);
        try{
            $objPHPExcel = PHPExcel_IOFactory::load($_FILES['file']['tmp_name']);
        //Chọn trang cần truy xuất
            $sheet = $objPHPExcel->setActiveSheetIndex(0);
            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            if($TotalCol>20)$TotalCol=20;
            $data = [];
            for ($i = 2; $i <= $Totalrow; $i++) {
                for ($j = 0; $j < $TotalCol; $j++) {
                    $data[$i - 2][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();
                }
            }

            echo json_encode($data);die();
        }
        catch(Exception $ex){
            die("file not excel");
        }
        //$this->check_item_and_add
        return $data;
    }
}
