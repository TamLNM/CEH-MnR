<?php
defined('BASEPATH') OR exit('');

class Common_model extends CI_Model
{
    private $UC = 'UNICODE';
    private $iYARD = "ITC";

    function __construct() {
        parent::__construct();
        $this->ceh = $this->load->database('mssql', TRUE);
    }

    public function delete_ALL_Common($iTableName, $dataX) {
		$this->ceh->trans_begin();
		$this->ceh->trans_strict(FALSE);
		
		switch ($iTableName) { 
			case "MR_BS_COMPONENT":
				foreach ($dataX as $key => $item) { 
					$this->ceh->where('YARD_ID', $this->iYARD)
							->where('COMP_ID', $item['COMP_ID'])
							->delete('MR_BS_COMPONENT');
				};
				break;
			case "MR_BS_DAMAGE":
				foreach ($dataX as $key => $item) { 
					$this->ceh->where('YARD_ID', $this->iYARD)
							->where('DAM_ID', $item['DAM_ID'])
							->delete('MR_BS_DAMAGE');
				};
				break;
			case "MR_BS_LOCATION":
				foreach ($dataX as $key => $item) { 
					$this->ceh->where('YARD_ID', $this->iYARD)
							->where('LOC_ID', $item['LOC_ID'])
							->delete('MR_BS_LOCATION');
				};
				break;
			case "MR_BS_REPAIR":
				foreach ($dataX as $key => $item) { 
					$this->ceh->where('YARD_ID', $this->iYARD)
							->where('REP_ID', $item['REP_ID'])
							->delete('MR_BS_REPAIR');
				};
				break;
			case "MR_BS_COMP_DAM_REP":
				foreach ($dataX as $key => $item) { 
					$this->ceh->where('YARD_ID', $this->iYARD)
							->where("COMP_ID", $item['COMP_ID'])
							->where("DAM_ID", $item['DAM_ID'])
							->where('REP_ID', $item['REP_ID'])
							->delete('MR_BS_COMP_DAM_REP');
				};
				break;
			case "MR_BS_VENDOR":
				foreach ($dataX as $key => $item) { 
					$this->ceh->where('YARD_ID', $this->iYARD)
							->where('VENDOR_ID', $item['VENDOR_ID'])
							->delete('MR_BS_VENDOR');
				};
				break;
			case "MR_BS_CNTR_INFO":
				foreach ($dataX as $key => $item) { 
					$this->ceh->where('YARD_ID', $this->iYARD)
							->where('CNTRNO', $item['CNTRNO'])
							->delete('MR_BS_CNTR_INFO');
				};
				break;
			default:
				$this->ceh->trans_rollback();
				$result['iStatus'] = 'Fail';
				$result['iMess'] = 'Sai thông tin bảng!';
				return $result;
			break;
		};

        $this->ceh->trans_complete();
        if($this->ceh->trans_status() === FALSE) {
            $this->ceh->trans_rollback();
            $result['iStatus'] = 'Fail';
            return $result;
        }
        else {
            $this->ceh->trans_commit();
            $result['iStatus'] = 'Success';
            return $result;
        }
    }

    public function load_ALL_Common($iTableName, $iWhere = "", $iSelect = "", $iGroupby = "") {
		if ($iSelect != "") {
    		$this->ceh->select($iSelect);
    	}
    	if ($iWhere != "") {
    		$this->ceh->where($iWhere);
    	}
		$this->ceh->where("YARD_ID", $this->iYARD);
		if ($iGroupby != "") {
    		$this->ceh->group_by($iGroupby);
		}
    	$resultX = $this->ceh->get($iTableName)->result_array();
    	return $resultX;
    }

    public function save_ALL_Common($dataX){
    	$this->ceh->trans_begin();
        $this->ceh->trans_strict(FALSE);
        $return;
        switch ($dataX['P_Table']) {
			case 'MR_BS_CNTR_INFO':
        		foreach ($dataX['dataTable'] as $key => $item) { 
        			$item['YARD_ID'] = $this->iYARD;
					unset($item['ROWGUID']);
        			$checkItem = $this->ceh->select("ROWGUID")
											->where("CNTRNO", $item['CNTRNO'])
        									->where("YARD_ID", $this->iYARD)
        									->limit(1)
        									->get("MR_BS_CNTR_INFO")
											->row_array();
        			if ( is_array($checkItem) && count($checkItem) > 0 ) {
        				$item['MODIFIEDBY'] = $this->session->userdata("UserID");
            			$item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        				$this->ceh->where('ROWGUID', $checkItem["ROWGUID"])->update('MR_BS_CNTR_INFO', $item);
        			}
        			else {
        				$item['CREATEBY'] = $this->session->userdata("UserID");
            			$item['INSERT_TIME'] = date('Y-m-d H:i:s');
            			$this->ceh->insert("MR_BS_CNTR_INFO", $item);
        			}
        		};
        		break;
        	case 'MR_BS_COMPONENT':
        		foreach ($dataX['dataTable'] as $key => $item) { 
        			$item['YARD_ID'] = $this->iYARD;
        			$item['COMP_NAME_VN'] = UNICODE.$item['COMP_NAME_VN'];

        			$checkItem = $this->ceh->select("ROWGUID")
        									->where("COMP_ID", $item['COMP_ID'])
        									->where("YARD_ID", $this->iYARD)
        									->limit(1)
        									->get("MR_BS_COMPONENT")
											->row_array();
        			if ( is_array($checkItem) && count($checkItem) > 0 ) {
        				$item['MODIFIEDBY'] = $this->session->userdata("UserID");
            			$item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        				$this->ceh->where('ROWGUID', $checkItem["ROWGUID"])->update('MR_BS_COMPONENT', $item);
        			}
        			else {
        				$item['CREATEBY'] = $this->session->userdata("UserID");
            			$item['INSERT_TIME'] = date('Y-m-d H:i:s');
            			$this->ceh->insert("MR_BS_COMPONENT", $item);
        			}
        		};
        		break;
        	case "MR_BS_DAMAGE":
        		foreach ($dataX['dataTable'] as $key => $item) { 
        			$item['YARD_ID'] = $this->iYARD;
        			$item['DAM_NAME_VN'] = UNICODE.$item['DAM_NAME_VN'];

        			$checkItem = $this->ceh->select("ROWGUID")
        									->where("DAM_ID", $item['DAM_ID'])
        									->where("YARD_ID", $this->iYARD)
        									->limit(1)
        									->get("MR_BS_DAMAGE")
        									->row_array();
        			if ( is_array($checkItem) && count($checkItem) > 0 ) {
        				$item['MODIFIEDBY'] = $this->session->userdata("UserID");
            			$item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        				$this->ceh->where('ROWGUID', $checkItem["ROWGUID"])->update('MR_BS_DAMAGE', $item);
        			}
        			else {
        				$item['CREATEBY'] = $this->session->userdata("UserID");
            			$item['INSERT_TIME'] = date('Y-m-d H:i:s');
            			$this->ceh->insert("MR_BS_DAMAGE", $item);
        			}
        		};
        		break;
    		case "MR_BS_LOCATION":
    			foreach ($dataX['dataTable'] as $key => $item) { 
        			$item['YARD_ID'] = $this->iYARD;
        			$item['NOTE'] = UNICODE.$item['NOTE'];

        			$checkItem = $this->ceh->select("ROWGUID")
        									->where("LOC_ID", $item['LOC_ID'])
        									->where("YARD_ID", $this->iYARD)
        									->limit(1)
        									->get("MR_BS_LOCATION")
        									->row_array();
        			if ( is_array($checkItem) && count($checkItem) > 0 ) {
        				$item['MODIFIEDBY'] = $this->session->userdata("UserID");
            			$item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        				$this->ceh->where('ROWGUID', $checkItem["ROWGUID"])->update('MR_BS_LOCATION', $item);
        			}
        			else {
        				$item['INDEX_LOCATION'] = 0;
        				$item['CREATEBY'] = $this->session->userdata("UserID");
            			$item['INSERT_TIME'] = date('Y-m-d H:i:s');
            			$this->ceh->insert("MR_BS_LOCATION", $item);
        			}
        		};
        		break;
    		case "MR_BS_REPAIR":
    			foreach ($dataX['dataTable'] as $key => $item) { 
        			$item['YARD_ID'] = $this->iYARD;
        			$item['REP_NAME_VN'] = UNICODE.$item['REP_NAME_VN'];

        			$checkItem = $this->ceh->select("ROWGUID")
        									->where("REP_ID", $item['REP_ID'])
        									->where("YARD_ID", $this->iYARD)
        									->limit(1)
        									->get("MR_BS_REPAIR")
        									->row_array();
        			if ( is_array($checkItem) && count($checkItem) > 0 ) {
        				$item['MODIFIEDBY'] = $this->session->userdata("UserID");
            			$item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        				$this->ceh->where('ROWGUID', $checkItem["ROWGUID"])->update('MR_BS_REPAIR', $item);
        			}
        			else {
        				$item['CREATEBY'] = $this->session->userdata("UserID");
            			$item['INSERT_TIME'] = date('Y-m-d H:i:s');
            			$this->ceh->insert("MR_BS_REPAIR", $item);
        			}
        		};
        		break;
        	case "MR_BS_COMP_DAM_REP":
    			foreach ($dataX['dataTable'] as $key => $item) { 
        			$item['YARD_ID'] = $this->iYARD;
        			$item['NAME_VN'] = UNICODE.$item['NAME_VN'];
        			
        			$checkItem = $this->ceh->select("ROWGUID")
        									->where("COMP_ID", $item['COMP_ID'])
        									->where("DAM_ID", $item['DAM_ID'])
        									->where("REP_ID", $item['REP_ID'])
        									->where("YARD_ID", $this->iYARD)
        									->limit(1)
        									->get("MR_BS_COMP_DAM_REP")
        									->row_array();
        			if ( is_array($checkItem) && count($checkItem) > 0 ) {
        				$item['MODIFIEDBY'] = $this->session->userdata("UserID");
            			$item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        				$this->ceh->where('ROWGUID', $checkItem["ROWGUID"])->update('MR_BS_COMP_DAM_REP', $item);
        			}
        			else {
        				$item['CREATEBY'] = $this->session->userdata("UserID");
            			$item['INSERT_TIME'] = date('Y-m-d H:i:s');
            			$this->ceh->insert("MR_BS_COMP_DAM_REP", $item);
        			}
        		};
        		break;
        	case "MR_BS_VENDOR":
    			foreach ($dataX['dataTable'] as $key => $item) { 
        			$item['YARD_ID'] = $this->iYARD;
        			$item['VENDOR_NAME'] = UNICODE.$item['VENDOR_NAME'];
        			
        			$checkItem = $this->ceh->select("ROWGUID")
        									->where("VENDOR_ID", $item['VENDOR_ID'])
        									->where("YARD_ID", $this->iYARD)
        									->limit(1)
        									->get("MR_BS_VENDOR")
        									->row_array();
        			if ( is_array($checkItem) && count($checkItem) > 0 ) {
        				$item['MODIFIEDBY'] = $this->session->userdata("UserID");
            			$item['UPDATE_TIME'] = date('Y-m-d H:i:s');
        				$this->ceh->where('ROWGUID', $checkItem["ROWGUID"])->update('MR_BS_VENDOR', $item);
        			}
        			else {
        				$item['CREATEBY'] = $this->session->userdata("UserID");
            			$item['INSERT_TIME'] = date('Y-m-d H:i:s');
            			$this->ceh->insert("MR_BS_VENDOR", $item);
        			}
        		};
        		break;
        	default:
        		$this->ceh->trans_rollback();
	            $return['iStatus'] = "Fail";
	            $return['iMess'] = "Không thấy thông tin dữ liệu";
	            return $return;
        		break;
        }
        $this->ceh->trans_complete();
        if ( $this->ceh->trans_status() === FALSE ) {
            $this->ceh->trans_rollback();
            $return['iStatus'] = "Fail";
            $return['iMess'] = "Phát sinh lỗi. Rollback dữ liệu!";
        }
        else {
            $this->ceh->trans_commit();
            $return['iStatus'] = "Success";
            $return['iMess'] = "Thêm/ Cập nhật thành công";
        }
        return $return;
    }

    
}
