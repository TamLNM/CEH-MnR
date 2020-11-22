<?php
defined('BASEPATH') OR exit('');

class Tariff_model extends CI_Model {
    // private $UC = 'UNICODE';
    private $iYARD = "ITC";

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function ctTariffGroup_loadData() {
        $this->ceh->distinct()
            ->select("GROUP_TRF_ID, LABOR_RATE, IsReefer, REMARKS")
            ->order_by('GROUP_TRF_ID');
        $ZZZ = $this->ceh->get("MR_BS_TARIFF_GROUP");
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }

    public function ctTariffGroup_1_loadData() {
        $this->ceh->distinct()
            ->select("GROUP_TRF_ID, LABOR_RATE, IsReefer, REMARKS, ROWGUID")
            ->order_by('GROUP_TRF_ID');
        $ZZZ = $this->ceh->get("MR_BS_TARIFF_GROUP");
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }

    public function ctTariffGroup_loadDetails($arrs) {
        $arrs = $arrs[0];
        $this->ceh->select("OPR_ID")
            ->where('GROUP_TRF_ID', $arrs['GROUP_TRF_ID'])
            ->where('IsReefer', $arrs['IsReefer'])
            ->order_by('OPR_ID');
        $ZZZ = $this->ceh->get("MR_BS_TARIFF_GROUP");
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }

    public function ctTariffGroup_1_loadDetails($arrs) {
        $arrs = $arrs[0];
        $this->ceh->select("OPR_ID")
            ->where('TR_ROWGUID', $arrs['ROWGUID'])
            ->order_by('OPR_ID');
        $ZZZ = $this->ceh->get("MR_BS_TARIFF_GROUP_OPR");
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }
    
    public function ctTariffGroup_saveDATA($mainData, $gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $detailChange = false;
        $mainData = $mainData[0];
        $mainData['REMARKS'] = UNICODE.$mainData['REMARKS'];
        $result['cantInsert'] = array();
        // $result['success'] = array();

        if (is_array($gridData) && count($gridData) > 0) {  
            // foreach ($gridData as $key => $item) { 
            //     $mainData['OPR_ID'] = $item['OPR_ID'];
            //     $this->ceh->select('ROWGUID')
            //             ->where('YARD_ID', $this->iYARD)
            //             ->where('GROUP_TRF_ID', $mainData['GROUP_TRF_ID'])
            //             ->where('OPR_ID', $mainData['OPR_ID']);
            //     $itemX = $this->ceh->limit(1)->get("MR_BS_TARIFF_GROUP")->row_array();
            //     if (is_array($itemX) && count($itemX) > 0) { 
            //         $mainData['MODIFIEDBY'] = $this->session->userdata("UserID");
            //         $mainData['UPDATE_TIME'] = date('Y-m-d H:i:s');
            //         $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->update("MR_BS_TARIFF_GROUP", $mainData);
            //     }
            //     else {
            //         $mainData['YARD_ID'] = $this->iYARD;
            //         $mainData['CREATEBY'] = $this->session->userdata("UserID");
            //         $mainData['INSERT_TIME'] = date('Y-m-d H:i:s');
            //         $this->ceh->insert("MR_BS_TARIFF_GROUP", $mainData);
            //     }
            // }

            // foreach ($gridData as $key => $item) { 
            //     $mainData['OPR_ID'] = $item['OPR_ID'];
    
            //     $this->ceh->where('YARD_ID', $this->iYARD)
            //             ->where('OPR_ID', $mainData['OPR_ID']);
            //     $itemX = $this->ceh->limit(1)->get("MR_BS_TARIFF_GROUP")->row_array();
            //     if (is_array($itemX) && count($itemX) > 0) { 
            //         if ($itemX['GROUP_TRF_ID'] == $mainData['GROUP_TRF_ID'] && $itemX['IsReefer'] == $mainData['IsReefer']) {
            //             $mainData['MODIFIEDBY'] = $this->session->userdata("UserID");
            //             $mainData['UPDATE_TIME'] = date('Y-m-d H:i:s');
            //             $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->update("MR_BS_TARIFF_GROUP", $mainData);
            //         }
            //         else {
            //             array_push($result['cantInsert'], 'Hãng tàu: '.$itemX['OPR_ID'].' đang thuộc nhóm biểu cước: '.$itemX['GROUP_TRF_ID']);
            //         }
            //     }
            //     else {
            //         $mainData['YARD_ID'] = $this->iYARD;
            //         $mainData['CREATEBY'] = $this->session->userdata("UserID");
            //         $mainData['INSERT_TIME'] = date('Y-m-d H:i:s');
            //         $this->ceh->insert("MR_BS_TARIFF_GROUP", $mainData);
            //     }
            // }

            foreach ($gridData as $key => $item) { 
                $mainData['OPR_ID'] = $item['OPR_ID'];
    
                $this->ceh->where('YARD_ID', $this->iYARD)
                        ->where('OPR_ID', $mainData['OPR_ID']);
                $itemX = $this->ceh->get("MR_BS_TARIFF_GROUP")->result_array();
                if (is_array($itemX) && count($itemX) > 0) { 
                    foreach ($itemX as $key => $itemZ) {  
                        if ($itemZ['GROUP_TRF_ID'] == $mainData['GROUP_TRF_ID']) {
                            //  && $itemX['IsReefer'] == $mainData['IsReefer']
                            $itemX1 = $this->ceh->where('YARD_ID', $this->iYARD)
                                            ->where('OPR_ID', $mainData['OPR_ID'])
                                            ->where('GROUP_TRF_ID', $itemZ['GROUP_TRF_ID'])
                                            ->where('IsReefer', $mainData['IsReefer'])
                                            ->get("MR_BS_TARIFF_GROUP")->row_array();
                            if (is_array($itemX1) && count($itemX1) > 0) {
                                $mainData['MODIFIEDBY'] = $this->session->userdata("UserID");
                                $mainData['UPDATE_TIME'] = date('Y-m-d H:i:s');
                                $this->ceh->where("ROWGUID", $itemX1['ROWGUID'])->update("MR_BS_TARIFF_GROUP", $mainData);
                            }
                            else {
                                $mainData['YARD_ID'] = $this->iYARD;
                                $mainData['CREATEBY'] = $this->session->userdata("UserID");
                                $mainData['INSERT_TIME'] = date('Y-m-d H:i:s');
                                $this->ceh->insert("MR_BS_TARIFF_GROUP", $mainData);
                            }
                        }
                        else {
                            array_push($result['cantInsert'], 'Hãng tàu: '.$itemZ['OPR_ID'].' đang thuộc nhóm biểu cước: '.$itemZ['GROUP_TRF_ID']);
                        }
                    };
                    // if ($itemX['GROUP_TRF_ID'] == $mainData['GROUP_TRF_ID'] && $itemX['IsReefer'] == $mainData['IsReefer']) {
                    //     $mainData['MODIFIEDBY'] = $this->session->userdata("UserID");
                    //     $mainData['UPDATE_TIME'] = date('Y-m-d H:i:s');
                    //     $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->update("MR_BS_TARIFF_GROUP", $mainData);
                    // }
                    // else {
                    //     array_push($result['cantInsert'], 'Hãng tàu: '.$itemX['OPR_ID'].' đang thuộc nhóm biểu cước: '.$itemX['GROUP_TRF_ID']);
                    // }
                }
                else {
                    $mainData['YARD_ID'] = $this->iYARD;
                    $mainData['CREATEBY'] = $this->session->userdata("UserID");
                    $mainData['INSERT_TIME'] = date('Y-m-d H:i:s');
                    $this->ceh->insert("MR_BS_TARIFF_GROUP", $mainData);
                }
            }
        }
        else {
            //Update MasterOnly
            $arrUpdate = array(
                'REMARKS' => $mainData['REMARKS'],
                'LABOR_RATE' => $mainData['LABOR_RATE'],
                'MODIFIEDBY' => $this->session->userdata("UserID"),
                'UPDATE_TIME' => date('Y-m-d H:i:s')
            );
            $this->ceh->where('YARD_ID', $this->iYARD)->where('GROUP_TRF_ID', $mainData['GROUP_TRF_ID'])->update("MR_BS_TARIFF_GROUP", $arrUpdate);
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

    public function newGuid() {
        $data = openssl_random_pseudo_bytes( 16 );
        $data[6] = chr( ord( $data[6] ) & 0x0f | 0x40 ); // set version to 0100
        $data[8] = chr( ord( $data[8] ) & 0x3f | 0x80 ); // set bits 6-7 to 10

        return strtoupper(vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split( bin2hex( $data ), 4 ) ));
    }

    public function ctTariffGroup_1_saveDATA($mainData, $gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $isAddNew = false;
        $mainData = $mainData[0];
        $mainData['REMARKS'] = UNICODE.$mainData['REMARKS'];
        $result['cantInsert'] = array();

        //Check Master:
        if ($mainData['ROWGUID'] == "") {
            $itemMaster = $this->ceh->where('GROUP_TRF_ID', $mainData['GROUP_TRF_ID'])
                            ->get('MR_BS_TARIFF_GROUP')->row_array();
            if (is_array($itemMaster) && count($itemMaster) > 0) {   
                $this->ceh->trans_rollback();
                $result['iStatus'] = 'Fail';
                $result['iMess'] = 'Đã tồn tại mã nhóm: '.$mainData['GROUP_TRF_ID'];
                return $result;
            }
            $isAddNew = true;
            //Insert ----
            // unset($mainData['ROWGUID']);
            // var_dump($mainData);
            $mainData['ROWGUID'] = $this->newGuid();
            $mainData['YARD_ID'] = $this->iYARD;
            $mainData['CREATEBY'] = $this->session->userdata("UserID");
            $mainData['INSERT_TIME'] = date('Y-m-d H:i:s');
            $this->ceh->insert("MR_BS_TARIFF_GROUP", $mainData);
            // $mainData['ROWGUID'] = $this->ceh->insert_id('ROWGUID');
            // var_dump($this->ceh->insert_id());
        }
        else {
            //Update ----
            $arrUpdate = array(
                'REMARKS' => $mainData['REMARKS'],
                'LABOR_RATE' => $mainData['LABOR_RATE'],
                'IsReefer' => $mainData['IsReefer'],
                'MODIFIEDBY' => $this->session->userdata("UserID"),
                'UPDATE_TIME' => date('Y-m-d H:i:s')
            );
            $this->ceh->where('YARD_ID', $this->iYARD)->where('ROWGUID', $mainData['ROWGUID'])->update("MR_BS_TARIFF_GROUP", $arrUpdate);

            $arrUpdateDetails = array (
                'IsReefer' => $mainData['IsReefer'],
                'MODIFIEDBY' => $this->session->userdata("UserID"),
                'UPDATE_TIME' => date('Y-m-d H:i:s')
            );
            $this->ceh->where('YARD_ID', $this->iYARD)->where('TR_ROWGUID', $mainData['ROWGUID'])->update("MR_BS_TARIFF_GROUP_OPR", $arrUpdateDetails);
        }

        // Update Details:
        foreach ($gridData as $key => $item) { 
            $this->ceh->where('YARD_ID', $this->iYARD)
                    ->where('OPR_ID', $item['OPR_ID'])
                    ->where('IsReefer', $mainData['IsReefer']);
            $itemX = $this->ceh->get("MR_BS_TARIFF_GROUP_OPR")->row_array();
            if (is_array($itemX) && count($itemX) > 0) {  
                if ($itemX['TR_ROWGUID'] != $mainData['ROWGUID']) {
                    array_push($result['cantInsert'], 'Hãng tàu: '.$itemX['OPR_ID'].' đã thuộc nhóm biểu cước khác!');
                }
            }
            else {
                $item['YARD_ID'] = $this->iYARD;
                $item['CREATEBY'] = $this->session->userdata("UserID");
                $item['INSERT_TIME'] = date('Y-m-d H:i:s');
                $item['TR_ROWGUID'] = $mainData['ROWGUID'];
                $item['IsReefer'] = $mainData['IsReefer'];
                $this->ceh->insert("MR_BS_TARIFF_GROUP_OPR", $item);
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
            if ($isAddNew) { $result['ROWGUID'] = $mainData['ROWGUID']; }
            return $result;
        }
    }

    public function ctTariffGroup_deleteDATA_MAIN($gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $gridData = $gridData[0];

        $this->ceh->where('YARD_ID', $this->iYARD)
            ->where('GROUP_TRF_ID', $gridData['GROUP_TRF_ID'])
            ->where('IsReefer', $gridData['IsReefer'])
            ->delete('MR_BS_TARIFF_GROUP');

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

    public function ctTariffGroup_1_deleteDATA_MAIN($gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $gridData = $gridData[0];

        $this->ceh->where('YARD_ID', $this->iYARD)
            ->where('ROWGUID', $gridData['ROWGUID'])
            ->delete('MR_BS_TARIFF_GROUP');

        $this->ceh->where('YARD_ID', $this->iYARD)
            ->where('TR_ROWGUID', $gridData['ROWGUID'])
            ->delete('MR_BS_TARIFF_GROUP_OPR');

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

    public function ctTariffGroup_deleteDATA_DETAILS($mainData, $gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $detailChange = false;
        $mainData = $mainData[0];
        // $result['success'] = array();

        foreach ($gridData as $key => $item) { 
            $this->ceh->where('YARD_ID', $this->iYARD)
                    ->where('GROUP_TRF_ID', $mainData['GROUP_TRF_ID'])
                    ->where('IsReefer', $mainData['IsReefer'])
                    ->where('OPR_ID', $item['OPR_ID'])
                    ->delete('MR_BS_TARIFF_GROUP');
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

    public function ctTariffGroup_1_deleteDATA_DETAILS($mainData, $gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $detailChange = false;
        $mainData = $mainData[0];
        // $result['success'] = array();

        foreach ($gridData as $key => $item) { 
            $this->ceh->where('YARD_ID', $this->iYARD)
                    ->where('TR_ROWGUID', $mainData['ROWGUID'])
                    ->where('OPR_ID', $item['OPR_ID'])
                    ->delete('MR_BS_TARIFF_GROUP_OPR');
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

    public function ctTariffCodes_loadData($arrs) {
        if ($arrs['GROUP_TRF_ID'] == "") unset($arrs['GROUP_TRF_ID']);
        if ($arrs['COMP_ID'] == "") unset($arrs['COMP_ID']);
        if ($arrs['REP_ID'] == "") unset($arrs['REP_ID']);
        // if ($arrs['LOC_ID'] == "") unset($arrs['LOC_ID']);
        // if ($arrs['DESCRIPTION'] == "") unset($arrs['DESCRIPTION']);

        if ( is_array($arrs) && count($arrs) > 0 ) {
            $this->ceh->where($arrs);
        }
            
        $this->ceh->order_by('GROUP_TRF_ID, COMP_ID, REP_ID');
        $ZZZ = $this->ceh->get("MR_BS_TARIFF_REPAIR");
        $XYZ = $ZZZ->result_array();
        return $XYZ;
    }

    public function ctTariffCodes_saveDATA($gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $detailChange = false;

        // foreach ($gridData as $key => $item) { 
        //     $item['DESCRIPTION'] = UNICODE.$item['DESCRIPTION'];

        //     if (isset($item['ROWGUID']) && $item['ROWGUID'] != "") {
        //         $itemX = $this->ceh->select('ROWGUID')
        //                             ->where('ROWGUID', $item['ROWGUID'])
        //                             ->get("MR_BS_TARIFF_REPAIR")
        //                             ->row_array();
        //         if (is_array($itemX) && count($itemX) > 0) {
        //             unset($item['ROWGUID']);
        //             $item['MODIFIEDBY'] = $this->session->userdata("UserID");
        //             $item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        //             $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->update("MR_BS_TARIFF_REPAIR", $item);
        //         }
        //     }
        //     else {
        //         unset($item['ROWGUID']);
        //         $item['YARD_ID'] = $this->iYARD;
        //         $item['CREATEBY'] = $this->session->userdata("UserID");
        //         $item['INSERT_TIME'] = date('Y-m-d H:i:s');
        //         $this->ceh->insert("MR_BS_TARIFF_REPAIR", $item);
        //     }
        //     $detailChange = true;
        // }

        foreach ($gridData as $key => $item) { 
            $item['DESCRIPTION'] = UNICODE.$item['DESCRIPTION'];
            unset($item['ROWGUID']);
            $this->ceh->select('ROWGUID')
                    ->where('YARD_ID', $this->iYARD)
                    ->where('GROUP_TRF_ID', $item['GROUP_TRF_ID'])
                    ->where('COMP_ID', $item['COMP_ID'])
                    ->where('REP_ID', $item['REP_ID']);
            if ($item['LOC_ID'] != "") { $this->ceh->where('LOC_ID', $item['LOC_ID']); }
            if ($item['SIZE'] != "") { $this->ceh->where('SIZE', $item['SIZE']); }
            if ($item['WIDTH'] != "") { $this->ceh->where('WIDTH', $item['WIDTH']); }
            if ($item['UNIT'] != "") { $this->ceh->where('UNIT', $item['UNIT']); }
            if ($item['QUANTITY'] != "") { $this->ceh->where('QUANTITY', $item['QUANTITY']); }

            $itemX = $this->ceh->limit(1)->get("MR_BS_TARIFF_REPAIR")->row_array();
            if (is_array($itemX) && count($itemX) > 0) { 
                $item['MODIFIEDBY'] = $this->session->userdata("UserID");
                $item['UPDATE_TIME'] = date('Y-m-d H:i:s');
                $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->update("MR_BS_TARIFF_REPAIR", $item);
            }
            else {
                $item['YARD_ID'] = $this->iYARD;
                $item['CREATEBY'] = $this->session->userdata("UserID");
                $item['INSERT_TIME'] = date('Y-m-d H:i:s');
                $this->ceh->insert("MR_BS_TARIFF_REPAIR", $item);
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
            // if ($detailChange) $result['REPAIR_DETAILS'] = $XXX_A;
            return $result;
        }
    }

    public function ctTariffCodes_deleteDATA($gridData) {
        $this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $result['success'] = array();

        foreach ($gridData as $key => $item) { 
            $this->ceh->select('ROWGUID')
                    ->where('YARD_ID', $this->iYARD)
                    ->where('GROUP_TRF_ID', $item['GROUP_TRF_ID'])
                    ->where('COMP_ID', $item['COMP_ID'])
                    ->where('REP_ID', $item['REP_ID']);
            if ($item['LOC_ID'] != "") { $this->ceh->where('LOC_ID', $item['LOC_ID']); }
            $itemX = $this->ceh->limit(1)->get("MR_BS_TARIFF_REPAIR")->row_array();
            if (is_array($itemX) && count($itemX) > 0) { 
                $this->ceh->where("ROWGUID", $itemX['ROWGUID'])->delete("MR_BS_TARIFF_REPAIR");
                array_push($result['success'], $item);
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
    
}