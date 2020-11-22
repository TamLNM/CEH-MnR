<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="<?=base_url('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet" />
<style>
	.input{
		height: 28px; 
		font-size: 12px; 
		padding-left: 11px; 
		border-radius: 5px;
	}
	#inputForm{
		font-size: 0.95rem;
	}
	.rowHeight{
		height: 55px;
	}
	label{
		font-size: 0.85rem;
	}
	.labelX {
	  	width : 10px;
	  	overflow:hidden;
	  	display:inline-block;
		text-overflow: ellipsis;
		white-space: nowrap;
	}
	textarea{
		margin-left: 1rem; 
		border-radius: 5px;
		border: 1px solid rgba(0,0,0,.15);
		resize: none;
	}
	th{
		font-size: 0.95rem;
	}
	.xxx{
		position: relative;
	    display: block;
	    float: left!important;
	    margin-right: 1rem;
	}
	.ibox .ibox-body {
		padding: 17px 17px 5px;
	}
</style>
<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<div class="ibox-head">
				<div class="ibox-title">BÁO GIÁ SỬA CHỮA CONTAINER</div>
				<div class="button-bar-group">
					<button id="exportEstimate" class="btn btn-outline-dark btn-sm btn-loading mr-1 mt-1 mb-1" 
                                            data-loading-text="<i class='la la-file'></i>In phiếu Estimate"
                                            title="In phiếu Estimate">
                        <span class="btn-icon"><i class="la la-file"></i>In phiếu Estimate</span>
                    </button> 
                    <button id="export" class="btn btn-outline-dark btn-sm btn-loading mr-1 mt-1 mb-1" 
                                            data-loading-text="<i class='la la-file'></i>Xuất Excel"
                                            title="Xuất Excel">
                        <span class="btn-icon"><i class="la la-file"></i>Xuất Excel</span>
                    </button> 
					<!--<button id="search" class="btn btn-outline-warning btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Nạp dữ liệu"
										 	title="Nạp dữ liệu">
						<span class="btn-icon"><i class="ti-search"></i>Nạp dữ liệu</span>
					</button>
					<button id="addexcel" class="btn btn-outline-primary btn-sm mr-1">
						<span class="btn-icon"><i class="fa fa-upload"></i>Chèn file Excel</span>
					</button> -->
					<!-- <a href="<?=base_url("assets/excels/quote_and_repair.xlsx");?>" class="btn btn-outline-primary btn-sm mr-1">
						<span class="btn-icon"><i class="fa fa-download"></i>Tải File Excel Mẫu</span>
					</a> -->
					<!-- <input type="file" name="fileinput" id=fileinput style="display: none">
					<button id="addrow" class="btn btn-outline-success btn-sm mr-1" title="Thêm dòng mới">
						<span class="btn-icon"><i class="fa fa-plus"></i>Thêm dòng</span>
					</button>-->

					<button id="save" class="btn btn-outline-primary btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Lưu dữ liệu" 
										title="Lưu dữ liệu">
						<span class="btn-icon"><i class="fa fa-save"></i>Lưu</span>
					</button>
					
					<!--<button id="delete" class="btn btn-outline-danger btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Xóa dữ liệu" 
										title="Xóa những dòng đang chọn">
						<span class="btn-icon"><i class="fa fa-trash"></i>Xóa dòng</span>
					</button>
				-->
				</div>
			</div>

			<div class="ibox-body mt-0 pt-0 pb-0 bg-f9 border-e" id="inputForm">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row" style="font-weight: bolder; border-bottom: 1px solid rgba(0, 0, 0, .1)">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label" >THÔNG TIN CONTAINER</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<i class="la la-angle-up" style="margin-top: 0.5rem; float: right;" id="containerInfoButton"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="containerInfoTab1">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Container</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtCNTRNO" attrX="CNTRNO" attrY="CntrNo" class="form-control input" placeholder="Số cont" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="containerInfoTab2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Kích cỡ</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtSZTP" attrX="SZTP" attrY="ISO_SZTP" attrR="" class="form-control input" placeholder="Size" type="text">
										</div>
									</div>
								</div>								
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="containerInfoTab3">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Trạng thái</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtCMSTATUS" attrX="CMSTATUS" attrY="CMStatus" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="containerInfoTab4">
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX" title="Hãng khai thác">Hãng khai thác</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Vị trí bãi</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtOPR" attrX="OPR" attrY="OprID" attrR="" class="form-control input ml-4" placeholder="" type="text">
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtYARDPOS" attrX="YARDPOS" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="containerInfoTab5">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ngày vào bãi</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtGATEIN_DATE" attrX="GATEIN_DATE" attrY="DateIn" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>									
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs3" id="containerInfoTab6">
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Tình trạng</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">PTI Date</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtCONTCONDITION" attrX="CONTCONDITION" attrY="ContCondition" attrR="" class="form-control input" placeholder="" type="text">
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtPTI_DATE" attrX="PTI_DATE" class="form-control input" placeholder="" type="text">
										</div>										
									</div>
									
								</div>		
								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 mb-3" id="containerInfoTab7">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ghi chú</label>
										<textarea id="txtREMARKS_CNTR" attrX="REMARKS_CNTR" attrY="Note" attrR="" rows="4" cols="128" style="padding-left: 10px;"></textarea>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="containerInfoTab8">
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Box Status</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Box Comptd</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<select id="txtBOXSTATUS" attrX="BOXSTATUS"  class="selectpicker" data-width="100%" data-style="btn-default btn-sm">
												<option value="" selected>Box Status</option>
												<?php if(isset($cb_BoxStatus) && count($cb_BoxStatus) > 0) {$i = 1; ?>
													<?php foreach($cb_BoxStatus as $item) {  ?>
														<option value="<?=$item['CODE'];?>"><?=$item['NAME'];?></option>
													<?php $i++; }  ?>
												<?php } ?>
											</select>
											<!-- <input id="txtBOXSTATUS" attrX="BOXSTATUS" class="form-control input" placeholder="" type="text"> -->
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtBOXCOMPLETED_DATE" attrX="BOXCOMPLETED_DATE" class="form-control input" placeholder="" type="text">
										</div>										
									</div>
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX" title="Machinery Status">Machinery Status</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX" title="Machinery Status">Machinery Comptd</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<select id="txtMACHINESTATUS" attrX="MACHINESTATUS"  class="selectpicker" data-width="100%" data-style="btn-default btn-sm">
												<option value="" selected>Machinery Status</option>
												<?php if(isset($cb_BoxStatus) && count($cb_BoxStatus) > 0) {$i = 1; ?>
													<?php foreach($cb_BoxStatus as $item) {  ?>
														<option value="<?=$item['CODE'];?>"><?=$item['NAME'];?></option>
													<?php $i++; }  ?>
												<?php } ?>
											</select>
											<!-- <input id="txtMACHINESTATUS" attrX="MACHINESTATUS" class="form-control input" placeholder=""type="text"> -->
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtMACHINECOMPLETED_DATE" attrX="MACHINECOMPLETED_DATE" class="form-control input" placeholder=""type="text">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row" style="font-weight: bolder; border-bottom: 1px solid rgba(0, 0, 0, .1)">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label" >THÔNG TIN BÁO GIÁ</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<i class="la la-angle-up" style="margin-top: 0.5rem; float: right;" id="priceInfoButton"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="priceInfoTab1">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Estimated date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtESTIMATEDATE" attrX="ESTIMATEDATE" attrR="" type="text" placeholder="Estimated date">
												<span class="input-group-addon bg-white btn text-danger" id="del-ref-exp-date" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
									<input id="txtESTIMATEBY" attrX="ESTIMATEBY" attrR="" class="form-control input" placeholder="" type="text" style="display: none">
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Approval date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtAPPRPVALDATE" attrX="APPRPVALDATE" attrR="" type="text" placeholder="Approval date">
												<span class="input-group-addon bg-white btn text-danger" id="del-ref-exp-date" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
									<input id="txtAPPROVALBY" attrX="APPROVALBY" attrR="" class="form-control input" placeholder="" type="text" style="display: none">
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2"  id="priceInfoTab3">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Repair date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtREPAIRDATE" attrX="REPAIRDATE" attrR="" type="text" placeholder="Repair date">
												<span class="input-group-addon bg-white btn text-danger" id="del-ref-exp-date" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
									<input id="txtREPAIRBY" attrX="REPAIRBY" attrR="" class="form-control input" placeholder="" type="text" style="display: none">
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab4">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Completed date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtCOMPLETEDDATE" attrX="COMPLETEDDATE" attrR="" type="text" placeholder="Completed date">
												<span class="input-group-addon bg-white btn text-danger" id="del-ref-exp-date" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
									<input id="txtCOMPLETEDBY" attrX="COMPLETEDBY" attrR="" class="form-control input" placeholder="" type="text" style="display: none">
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab5">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Cancel date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtCANCLEDATE" attrX="CANCLEDATE" attrR="" type="text" placeholder="Cancel date">
												<span class="input-group-addon bg-white btn text-danger" id="del-ref-exp-date" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
									<input id="txtCANCELBY" attrX="CANCELBY" attrR="" class="form-control input" placeholder="" type="text" style="display: none">
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab6">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Age</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="xxxAge" class="form-control input" placeholder="" type="text" readonly>
										</div>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 mb-2" id="priceInfoTab7">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ghi chú báo giá</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtDESCRIPTION_ESTIMATE" attrX="DESCRIPTION_ESTIMATE" class="form-control input" placeholder="" type="text">
										</div>
										<!-- <textarea id="txtDESCRIPTION_ESTIMATE" attrX="DESCRIPTION_ESTIMATE" rows="4" cols="107"></textarea> -->
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab8">
									<input id="txtREPAIR_STATUS" attrX="REPAIR_STATUS" attrR="" class="form-control input" placeholder="" type="text" style="display: none">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Số lệnh</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtESTIMATENO" attrX="ESTIMATENO" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab9">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Đội sửa chữa</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtVENDOR_ID" attrX="VENDOR_ID" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row" style="font-weight: bolder; border-bottom: 1px solid rgba(0, 0, 0, .1)">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">THÔNG TIN TÍNH CƯỚC</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<i class="la la-angle-up" style="margin-top: 0.5rem; float: right;" id="tariffInfoButton"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="tariffInfoTab1">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">VAT Rate</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtVAT_RATE" attrX="VAT_RATE" class="form-control input" placeholder="" type="text">
										</div>
									</div>						
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="tariffInfoTab2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">VAT Amount</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtVAT" attrX="VAT" class="form-control input" placeholder="" type="text">
										</div>
									</div>						
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="tariffInfoTab3">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Discount Rate</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtDISCOUNT_RATE" attrX="DISCOUNT_RATE" class="form-control input" placeholder="" type="text">
										</div>
									</div>							
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="tariffInfoTab4">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Discount Amount</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtDIS_AMOUNT" attrX="DIS_AMOUNT" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="tariffInfoTab5">
									<div class="row">
										<label class="checkbox checkbox-grey checkbox-success ml-3" style="margin-top: 2.25rem;">
	                                        <input id="autoCalculate" type="checkbox" checked="">
	                                        <span class="input-span"></span>Auto Calculate
                                       	</label>
                                       	<button class="btn btn-success btn-icon-only btn-sm btn-air ml-2" style="max-width: 25px; max-height: 25px; margin-top: 1.7rem;">
											<i class="la la-calculator"></i>
										</button>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-2 mb-2" style="border-top: 1px solid rgba(0, 0, 0, .1)"  id="tariffInfoTab6">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<label class="col-md-12 col-sm-12 col-xs-12 col-form-label ml-5" style="font-weight: bolder;">TỔNG CỘNG</label>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Hours</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtHours" attrR="" class="form-control input" placeholder="" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Mate</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtMate" attrR="" class="form-control input" placeholder="" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Labor</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtLabor" attrR="" class="form-control input" placeholder="" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Total</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtTotal" attrR="" class="form-control input" placeholder="" type="text">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row ibox-body">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<div id="tablecontent" class="mt-1">
						<table id="contenttable" tableX="<?= $P_Table ?>" class="table table-striped display nowrap" cellspacing="0" style="width: 99.8%">
							<thead>
								<tr>
									
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Add more row modal --> 
<div class="modal fade" id="add-row-modal" tabindex="-1" role="dialog" aria-labelledby="groups-modalLabel-1" aria-hidden="true" data-whatever="id" style="padding-left: 14%; top: 200px">
	<div class="modal-dialog" role="document" style="width: 300px!important">
		<div class="modal-content" style="border-radius: 4px">
			<div class="modal-body">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row form-group">
						<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="text-align: right; margin-right: 5px">Số dòng</label>
						<input id="rowsNumeric" class="col-md-6 col-sm-6 col-xs-6 form-control form-control-sm border-e" placeholder="Số dòng" type="number" value="1">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div  style="margin: 0 auto!important;">
					<button class="btn btn-sm btn-rounded btn-gradient-blue btn-labeled btn-labeled-left btn-icon" id="apply-add-row" data-dismiss="modal">
						<span class="btn-label"><i class="ti-check"></i></span>Xác nhận</button>
					<button class="btn btn-sm btn-rounded btn-gradient-peach btn-labeled btn-labeled-left btn-icon" data-dismiss="modal">
						<span class="btn-label"><i class="ti-close"></i></span>Đóng</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id='dataExportEstimate' hidden>
	<table id="estimateTable">
		<tbody id="estimateTBody">
			<tr>
				<td colspan="5" class="title">
					<img style="height: 45%; width: 30%" src="<?=base_url('assets/img/logoITC1.png');?>">
				</td>
				<td colspan="5" style="text-align: right; padding-top: 5px;" class="title">
					Add: Nguyen Thi Tu Street, Phu Huu Ward, Dist. HCMC<br>
					Tel: 028 37315050; Fax: 028 373 15051
				</td>
			</tr>
			<tr style="margin-top: 2rem; margin-bottom: 2rem;">
				<td colspan="10" style="font-weight: bold; text-align: center; font-size: 1.25rem;">ESTIMATE OF REPAIRS</td>
			</tr>
			<tr>
				<td colspan="4" class="title"></td>
				<td colspan="6" class="title" style="text-align: right!important;">
					<span id="rCntrNo" style="font-weight: bold"></span><br>
					<span id="rEstimateDate"></span><br>
					<span id="rEstimateNo"></span><br>
				</td>
			</tr>
			<tr>
				<td class="title2" colspan="2" style="width: 20%">UNIT OF MEASURE:</td>
				<td class="title2" colspan="2" style="width: 20%">CURRENCY: USD</td>
				<td class="title2" colspan="2" style="width: 20%" id="LABOR_RATE"></td>
				<td class="title2" colspan="2" style="width: 20%" id="SIZE"></td>
				<td class="title2" colspan="2" style="width: 20%">LOC: SP-ITC</td>
			</tr>
		</tbody>
	</table>
	<table id="estimateTable2" style="margin-top: 1rem; margin-left: auto; margin-right: auto; width: 100%">
		<!--
		<thead>
			<tr class="XXX" style="width: 100%">
				<th class="STT">STT</th>
				<th class="COMP_ID">Comp Code</th>
				<th class="COMP_NAME_EN">Component Name</th>
				<th class="DAM_ID">Dam Code</th>
				<th class="LOC_ID">Loc</th>
				<th class="REP_ID">Rep Code</th>
				<th class="LENGTH">Length</th>
				<th class="WIDTH">Width</th>
				<th class="QUANTITY">Qty</th>
				<th class="UNIT">P</th>
				<th class="HOURS">Hours</th>
				<th class="LABOR_PRICE">Labour Cost</th>
				<th class="MATE_PRICE">Meterial Cost</th>
				<th class="TOTAL">Total Cost</th>
			</tr>
		</thead>
		-->
		<tbody id="estimateTBody2">
			<tr>
				<td>1</td>
				<td>PAA</td>
				<td>FRONT WALL PANEL</td>
				<td>DT</td>
				<td>LX6N</td>
				<td>GS</td>
				<td>120.00</td>
				<td>60.00</td>
				<td>1</td>
				<td>U</td>
				<td>1.85</td>
				<td>3.70</td>
				<td>11.16</td>
				<td>14.86</td>
			</tr>
			<tr>
				<td>2</td>
				<td>PAA</td>
				<td>FRONT WALL PANEL</td>
				<td>CU</td>
				<td>LX6N</td>
				<td>GW</td>
				<td>15.00</td>
				<td>-</td>
				<td>1</td>
				<td>U</td>
				<td>0.50</td>
				<td>1.00</td>
				<td>2.26</td>
				<td>3.26</td>
			</tr>
			<tr>
				<td>3</td>
				<td>GATO</td>
				<td>GASKET</td>
				<td>CU</td>
				<td>DB3N</td>
				<td>SN</td>
				<td>30.00</td>
				<td>-</td>
				<td>1</td>
				<td>U</td>
				<td>0.50</td>
				<td>1.00</td>
				<td>4.41</td>
				<td>5.41</td>
			</tr>
			<tr class="notDelete">
				<td style="height: 1.85rem;"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="notDelete">
				<td style="border-right: none!important; font-weight: bolder; text-align: left; margin-left: 5px; vertical-align: top; padding-left: 5px;" colspan="5">TOTAL<br>COVERAGE<br>DRAYAGE<br>PHOTO</td>
				<td class='noBorderLeftRight' colspan="5"></td>
				<td style="vertical-align: top; text-align: center; border-left: none; border-right: none"><b id="report_HOURS"></b><br><br><br></td>
				<td style="vertical-align: top; text-align: center; border-left: none; border-right: none"><b id="reportLABOR_PRICE"></b><br><br><br></td>
				<td style="vertical-align: top;background-origin text-align: center; border-left: none; border-right: none"><b id="reportMATE_PRICE"></b><br><br><br></td>
				<td style="vertical-align: top; text-align: center; border-left: none"><b id="reportTOTAL"></b><br><br><br></td>
			</tr>
			<tr class="notDelete">
				<td style="border-right: none!important; font-weight: bolder; text-align: left; margin-left: 5px; vertical-align: top; padding-left: 5px;" colspan="10">COMMENT: <b attrReport = "DESCRIPTION_ESTIMATE" style="font-weight: normal;"></b></td>
				<td class='noBorderLeftRight'></td>
			</tr>
			<tr class="notDelete">
				<td colspan="3" class='noBorderRight'>
					<b style="font-weight: bolder">MANUFACTURE DATE: </b><b attrReport = "AGE_DATE" style="font-weight: normal"></b><br>
					<b style="font-weight: bolder">APPROVAL DATE: </b><b attrReport = "APPRPVALDATE" style="font-weight: normal"></b><br>
					<b style="font-weight: bolder">COMPLETED DATE: </b><b attrReport = "COMPLETEDDATE" style="font-weight: normal"></b><br><br>
				</td>
				<td class='noBorderLeftRight' colspan="5"></td>
				<td colspan="5" class='noBorderLeftRight' style="font-weight: bolder;">
					OPPERATION TOTAL<br>
					CUSTOMER TOTAL<br>
					DISCOUNT<br>
					GRAND TOTAL<br>
				</td>
				<td style="font-weight: bolder; text-align: center!important; border-left: none; padding-right: 5px;">
					-<br>
					<b id="reportTOTAL1"></b><br>
					-<br>
					<b id="reportTOTAL2"></b>
				</td>
			</tr>
			<tr class="notDelete" style="border: none!important; height: 4rem; font-weight: bolder">
				<td colspan="4" style="border: none!important;">
					<u>APPROVAL PARTY</u>
				</td>
				<td colspan="4" style="border: none!important;">
					CUSTOMER
				</td>
				<td colspan="5" style="border: none!important;">
					SP-ITC REPAIR WORKSHOP
				</td>
			</tr>
		</tbody>
	</table>
</div>

<div id="cell-context-cbo_PAYERTYPE" class="btn-group">
	<button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split show-table" data-toggle="dropdown" 
						aria-haspopup="true" aria-expanded="false">
	</button>
	<div class="dropdown-menu dropdown-menu-right"></div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		var tableMain = $('#contenttable').attr("tableX");
        var tableColumn = <?= $P_Columns ?>;
        var _columns = Load_GridHeader('contenttable', tableColumn);
		var tbl = $('#contenttable');
		var iUser = '<?=$this->session->UserID;?>';
		var ifGroupID = '', ifLabor = 0;
		var tableDataExport = '';

		var postDATA = <?= (isset($XX_ABC) ? json_encode($XX_ABC) : "{}") ?>;
		checkMT();
		function checkMT() {
			if (typeof(postDATA['CNTRNO']) != 'undefined') {
				$('#txtCNTRNO').val(postDATA['CNTRNO']);
				$('#txtESTIMATENO').val(postDATA['ESTIMATENO']);
				$('#inputForm').attr("rowguid", postDATA['MASTER_ROWGUID']);
				CNTRNO_KEYPRESS();
			}
		}

		var cbTariff = <?= $P_Tariff_Repair ?>;
		onoffReadonly();
		
		var parentMenuList 	= {};
		var btnSrc = '<div class="xxx" style="margin-right: -5px;"><a class="btn" href="<?=base_url("assets/excels/quote_and_repair.xlsx");?>"><i style="color: #365899;"><u>Tải file import mẫu...</u></i></a></div>';

		<?php if(isset($parentMenuList) && count($parentMenuList) >= 0){?>
			parentMenuList = <?=json_encode($parentMenuList);?>;
		<?php } ?>

		for (i = 0; i < parentMenuList.length; i++){
			if (parentMenuList[i]['MenuID'] == 'ExpertiseAndRepair'){
				$('#' + parentMenuList[i]['MenuID']).addClass('active');
			}
			else{
				$('#' + parentMenuList[i]['MenuID']).removeClass();
			}
		}
		
		var dataTbl = tbl.newDataTable({
			configColumns: tableColumn,
			configTableMain: tableMain,
			scrollY: '55vh',
			order: [[ _columns.indexOf("STT"), 'asc' ]],
			paging: false,
            keys:true,
            autoFill: {
                focus: 'focus'
            },
            select: true,
            rowReorder: false
		});
		tbl.initComplete({
			//FILEIMPORT: 'FILEIMPORT',
			//IMPORT: 'IMPORT',
			ADD: 'ADD',
			DELETE: 'DELETE'
		});
		tbl.editableTableWidget();

		//$('#contenttable_btnAdd').css({'margin-top': '-7px'});
		//$('#contenttable_btnSearch').css({'margin-top': '-7px'});
		//$('#contenttable_btnDelete').css({'margin-top': '-7px'});
		//$('.dt-buttons').before(btnSrc);

		$('#tbl').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});



//-------------------TAM---------------------------
		/* Add new row event */
		$('#contenttable_btnAdd').on('click', function(){
			$('#add-row-modal').modal("show");
        });

		var sumNumRows = 0;
        $("#apply-add-row").on("click", function(){
        	numRows = parseInt($('#rowsNumeric').val()); // Numeric of new rows user added
        	sumNumRows += numRows;
        	if (numRows == 1){
        		tbl.newRow();
        		rowsExist = $("#contenttable").DataTable().rows().nodes().length;
				for (i = 0; i < rowsExist; i++){
					cell = tbl.find("tbody tr:eq(" + i + ") td:eq("+ _columns.indexOf("STT") +")");
					tbl.DataTable().cell(cell).data(i+1).draw(false);
				}
			}
			else{
				numRowsExist = $("#contenttable").DataTable().rows().nodes().length;
				numRowHasAddNewClass = 0;
				index = 1;
				for (i = numRowsExist - 1; i >= 0 ; i--){
					var crRow = tbl.find("tbody tr:eq("+i+")");
					if(crRow.hasClass("addnew"))
						numRowHasAddNewClass++;
					else{
						cell = tbl.find("tbody tr:eq(" + i + ") td:eq("+ _columns.indexOf("STT") +")");
			        	tbl.DataTable().cell(cell).data(sumNumRows + index).draw(false);
			        	index++;
					}
				}
				tbl.newMoreRows(numRows, numRowHasAddNewClass);
			}
       	});

        $("#add-row-modal").bind('keypress', function(e) {
       		if(e.which == 13){
	       		numRows = parseInt($('#rowsNumeric').val()); // Numeric of new rows user added
	        	sumNumRows += numRows;
	        	if (numRows == 1){
	        		tbl.newRow();
	        		rowsExist = $("#contenttable").DataTable().rows().nodes().length;
					for (i = 0; i < rowsExist; i++){
						cell = tbl.find("tbody tr:eq(" + i + ") td:eq("+ _columns.indexOf("STT") +")");
						tbl.DataTable().cell(cell).data(i+1).draw(false);
					}
				}
				else{
					numRowsExist = $("#contenttable").DataTable().rows().nodes().length;
					numRowHasAddNewClass = 0;
					index = 1;
					for (i = numRowsExist - 1; i >= 0 ; i--){
						var crRow = tbl.find("tbody tr:eq("+i+")");
						if(crRow.hasClass("addnew"))
							numRowHasAddNewClass++;
						else{
							cell = tbl.find("tbody tr:eq(" + i + ") td:eq("+ _columns.indexOf("STT") +")");
				        	tbl.DataTable().cell(cell).data(sumNumRows + index).draw(false);
				        	index++;
						}
					}
					tbl.newMoreRows(numRows, numRowHasAddNewClass);
				}
				$("#add-row-modal").modal("hide");
			}
       	});

       	/* Prevent press '-' */
       	$("#rowsNumeric").keydown(function(event) {
		  	if (event.which == 189) {
		    	event.preventDefault();
		   	}
		});

       	var containerInfoIdx = 1;
       	$('#containerInfoButton').on('click', function(){
       		$(this).removeClass();
       		if (containerInfoIdx % 2 == 1){
				$(this).addClass('la la-angle-down');
       			for (i = 1; i <= 8; i++){
					$("#containerInfoTab" + i).hide();
				}
       		}
       		else{
				$(this).addClass('la la-angle-up');
       			for (i = 1; i <= 8; i++){
					$("#containerInfoTab" + i).show();
				}
       		}			
			containerInfoIdx++;
       	});

       	var priceInfoIdx = 1;
       	$('#priceInfoButton').on('click', function(){
       		$(this).removeClass();
       		if (priceInfoIdx % 2 == 1){
				$(this).addClass('la la-angle-down');
       			for (i = 1; i <= 9; i++){
					$("#priceInfoTab" + i).hide();
				}
       		}
       		else{
				$(this).addClass('la la-angle-up');
       			for (i = 1; i <= 8; i++){
					$("#priceInfoTab" + i).show();
				}
       		}			
			priceInfoIdx++;
       	}); 

       	var tariffInfoIdx = 1;
       	$('#tariffInfoButton').on('click', function(){
       		$(this).removeClass();
       		if (tariffInfoIdx % 2 == 1){
				$(this).addClass('la la-angle-down');
       			for (i = 1; i <= 6; i++){
					$("#tariffInfoTab" + i).hide();
				}
       		}
       		else{
				$(this).addClass('la la-angle-up');
       			for (i = 1; i <= 6; i++){
					$("#tariffInfoTab" + i).show();
				}
       		}			
			tariffInfoIdx++;
		}); 
//-------------------------------------------------

//-------------------PHONG---------------------------
		$('#contenttable_btnDelete').on('click', function(){
			if(tbl.getSelectedRows().length == 0) {
            	$('.toast').remove();
            	toastr["info"]("Vui lòng chọn các dòng dữ liệu để xóa!");
			}
			else {
            	tbl.confirmDelete_News( function(selectedData){
            		postDel(selectedData);
            	});
            }
		});

		function postDel(rows) {
			$('.ibox.collapsible-box').blockUI();

			var delBtn = $('#contenttable_btnDelete');
			delBtn.button('loading');
			var formdata = {
				'iAction': 'deleteDATA',
				'DATA_DETAILS': rows
			};
			$.ajax({
				url: "<?=site_url(md5('ExpertiseAndRepair') . '/' . md5('erQuoteAndRepair'));?>",
				dataType: 'json',
				data: formdata,
				type: 'POST',
				success: function (data) {
					delBtn.button('reset');
					$('.ibox.collapsible-box').unblock();
					if (data.iStatus == 'Success') {
						if(data.success && data.success.length > 0){ 
							var afterDelete = false;
							for (var i = 0; i < data.success.length; i++) { 
								afterDelete = true;
								var indexes = tbl.filterRowIndexes( _columns.indexOf("ROWGUID") , data.success[i].ROWGUID);
        						tbl.DataTable().rows( indexes ).remove().draw( false );
        						toastr["success"]('Xóa thành công COM: ' + data.success[i].COMP_ID + ' / REP: ' + data.success[i].REP_ID);
							}
							if (afterDelete) {
								tbl.updateSTT( _columns.indexOf( "STT" ) );
							}
						}
						else {
							toastr["success"]("Xóa thành công!");
						}
					}
					if(data.deny) {
						toastr["error"](data.deny);
						return;
					};
				},
				error: function(err){
					delBtn.button('reset');
					$('.ibox.collapsible-box').unblock();
					console.log(err);
				}
			});
		}

		$('#txtCNTRNO').keypress(function(e){
			var keycode = (e.which ? e.which : e.keyCode)
			if(keycode == 13){
				CNTRNO_KEYPRESS();
				// var iCntrNo = $(this).val().trim(),
				// 	iEstimateNo = $('#txtESTIMATENO').val().trim();
				// 	iMASTER_ROWGUID = $('#inputForm').attr("rowguid") ? $('#inputForm').attr("rowguid") : "";
				// if(iCntrNo.length == 11 ){
				// 	tbl.dataTable().fnClearTable();
				// 	loadDataInput(iCntrNo, iEstimateNo, iMASTER_ROWGUID);
				// }
				// else {
				// 	toastr['error']('Nhập sai định dạng số Container');
				// 	$(this).focus();
				// 	return;
				// };
			};
		});

		function CNTRNO_KEYPRESS(){
			var iCntrNo = $('#txtCNTRNO').val().trim(),
				iEstimateNo = $('#txtESTIMATENO').val().trim();
				iMASTER_ROWGUID = $('#inputForm').attr("rowguid") ? $('#inputForm').attr("rowguid") : "";
			if(iCntrNo.length == 11 ){
				tbl.dataTable().fnClearTable();
				loadDataInput(iCntrNo, iEstimateNo, iMASTER_ROWGUID);
			}
			else {
				toastr['error']('Nhập sai định dạng số Container');
				$(this).focus();
				return;
			};
		}

		function loadDataInput(iCntrNo, iEstimateNo, iMASTER_ROWGUID){
			var dataSend = {
				CNTRNO: iCntrNo,
				ESTIMATENO: iEstimateNo,
				MASTER_ROWGUID: iMASTER_ROWGUID,
				iAction: 'loadDataInput'
			};
			$.ajax({ 
				type: 'POST',
				dataType: 'json',
				data: dataSend,
				url: '<?= site_url(md5('ExpertiseAndRepair').'/'.md5('erQuoteAndRepair'));?>',
				success: function(dataGet){ 
					if(dataGet){
						console.log(dataGet);
						toastr['success']('Nạp dữ liệu thành công!');
						if (dataGet['MR_BS_TARIFF_GROUP']) {
							console.log(dataGet['MR_BS_TARIFF_GROUP']);
							ifGroupID = dataGet['MR_BS_TARIFF_GROUP']['GROUP_TRF_ID'];
							ifLabor = dataGet['MR_BS_TARIFF_GROUP']['LABOR_RATE'];
							$('th[col-name="LABOR_PRICE"]').attr('default-value', ifLabor);
						}
						else {
							ifGroupID = '';
							ifLabor = '';
						};

						if (dataGet['iREPAIR']) {
							fillData_REPAIR(dataGet['iREPAIR']);
							if (dataGet['REPAIR_DETAILS']) {
								Load_Data_Grid('contenttable', _columns, dataGet['REPAIR_DETAILS']);
								$('#txtHours').val(dataGet['REPAIR_DETAILS'].map(p=>p.HOURS).reduce(sumALL));
								$('#txtLabor').val(dataGet['REPAIR_DETAILS'].map(p=>p.LABOR_PRICE).reduce(sumALL))
								$('#txtMate').val(dataGet['REPAIR_DETAILS'].map(p=>p.MATE_PRICE).reduce(sumALL))
								$('#txtTotal').val(dataGet['REPAIR_DETAILS'].map(p=>p.TOTAL).reduce(sumALL))
							}
							if (dataGet['CNTR_AGE']) {
								var xxxxxx = dataGet['CNTR_AGE']['AGE_DATE'];
								$('#xxxAge').val(xxxxxx.split('.')[0]);
							};
							return;
						};
						if (dataGet['iCNTRDETAILS']) {
							fillData_CNTRDETAILS(dataGet['iCNTRDETAILS']);
							if (dataGet['CNTR_AGE']) {
								var xxxxxx = dataGet['CNTR_AGE']['AGE_DATE'];
								$('#xxxAge').val(xxxxxx.split('.')[0]);
							};
							return;
						};
					}
					else {
						toastr['info']('Không có dữ liệu!');
						return;
					};
				},
				error: function(dataGet){
					toastr['error']('Phát sinh lỗi, xem log');
					console.log(dataGet);
					return false;
				}
			});
			return true;
		}

		function fillData_Report(arrs, arrs1) {
			$('#dataExportEstimate').find('p[attrReport], b[attrReport]').each(function(){
				$(this).html('');
			});
			$('#dataExportEstimate').find('p[attrReport], b[attrReport]').each(function(){
				$(this).html( (arrs[$(this).attr('attrReport')] == null ? "" : arrs[$(this).attr('attrReport')]) );
			});
			$('#estimateTable2 tbody tr:not(".notDelete")').remove();
			if (arrs1 && arrs1.length > 0) {
				var x = arrs1.length - 1; 

				var sumHour = 0,
					sumLabourCode = 0,
					sumMeterialCode = 0,
					sumTotalCost = 0,
					laborRate = arrs1[0].LABOR_PRICE,
					laborRateData = arrs1[0].LABOR_PRICE;

				for (x; x >= 0; x--) {
					if (arrs1[x].LABOR_PRICE != laborRateData){
						laborRate = '';
					}

					sumHour 		+= (arrs1[x].HOURS ? parseFloat(arrs1[x].HOURS) : 0);
					sumLabourCode 	+= (arrs1[x].LABOR_PRICE ? parseFloat(arrs1[x].LABOR_PRICE) : 0);
					sumMeterialCode += (arrs1[x].MATE_PRICE ? parseFloat(arrs1[x].MATE_PRICE) : 0);
					sumTotalCost 	+= (arrs1[x].TOTAL ? parseFloat(arrs1[x].TOTAL) : 0);
					cell = 
						'<tr> <td style="width: 5%">' + (parseInt(x) + 1) + '</td>' +
						'<td>' + arrs1[x].COMP_ID + '</td>' +
						'<td>' + ( arrs1[x].COMP_NAME_EN == null ? "" : arrs1[x].COMP_NAME_EN ) + '</td>' +
						'<td>' + ( arrs1[x].DAM_ID 		 == null ? "" : arrs1[x].DAM_ID ) + '</td>' +
						'<td>' + ( arrs1[x].LOC_ID 		 == null ? "" : arrs1[x].LOC_ID ) + '</td>' +
						'<td>' + ( arrs1[x].REP_ID 		 == null ? "" : arrs1[x].REP_ID ) + '</td>' +
						'<td>' + ( arrs1[x].LENGTH 		 == null ? "" :	arrs1[x].LENGTH ) + '</td>' +
						'<td>' + ( arrs1[x].WIDTH 		 == null ? "" : arrs1[x].WIDTH ) + '</td>' +
						'<td>' + ( arrs1[x].QUANTITY 	 == null ? "" : arrs1[x].QUANTITY ) + '</td>' +
						'<td>' + ( arrs1[x].PAYERTYPE 		 == null ? "" : arrs1[x].PAYERTYPE ) + '</td>' +
						'<td>' + ( arrs1[x].HOURS 		 == null ? "" : arrs1[x].HOURS ) + '</td>' +
						'<td>' + ( arrs1[x].LABOR_PRICE  == null ? "" : arrs1[x].LABOR_PRICE ) + '</td>' +
						'<td>' + ( arrs1[x].MATE_PRICE 	 == null ? "" : arrs1[x].MATE_PRICE ) + '</td>' +
						'<td>' + arrs1[x].TOTAL + '</td> </tr>';
					$('#estimateTable2 tbody').prepend(cell);
				} 


				cell = '<tr style="width: 100%"><th class="STT">STT</th><th class="COMP_ID">Comp Code</th><th class="COMP_NAME_EN">Component Name</th><th class="DAM_ID">Dam Code</th><th class="LOC_ID">Loc</th><th class="REP_ID">Rep Code</th><th class="LENGTH">Length</th><th class="WIDTH">Width</th><th class="QUANTITY">Qty</th><th class="UNIT">P</th><th class="HOURS">Hours</th>				<th class="LABOR_PRICE">Labor Rate</th><th class="MATE_PRICE">Meterial Cost</th>				<th class="TOTAL">Total Cost</th></tr>';
				$('#estimateTable2 tbody').prepend(cell);
				
				// $('#txtHours').val(arrs1.map(p=>p.HOURS).reduce(sumALL));
				$("#SIZE").html('SIZE: ' + $("#txtSZTP").val());
				$("#rCntrNo").text('UNIT #: ' + $('#txtCNTRNO').val());
				$("#rEstimateDate").text('ESTIMATE DATE: ' + getDate($('#txtESTIMATEDATE').val()));
				$("#rEstimateNo").text('ESTIMATE NO: ' + $('#txtESTIMATENO').val());
				$("#LABOR_RATE").html('LABOR RATE: ' + laborRate);
				$("#report_HOURS").html(sumHour);
				$('#reportLABOR_PRICE').html(sumLabourCode.toFixed(2));//arrs1.map(p=>p.LABOR_PRICE).reduce(sumALL));
				$('#reportMATE_PRICE').html(sumMeterialCode.toFixed(2));//arrs1.map(p=>p.MATE_PRICE).reduce(sumALL));
				$('#reportTOTAL').html(sumTotalCost.toFixed(2));//arrs1.map(p=>p.TOTAL).reduce(sumALL));
				$('#reportTOTAL1').html($('#reportTOTAL').html());
				$('#reportTOTAL2').html($('#reportTOTAL').html());
			}
			return;
		}

		function fillData_REPAIR(arrs){
			clear_INPUT();
			$('#inputForm').find('input[attrX], textarea, select[attrX]').each(function(){
				switch ($(this).attr('attrX')) {
					case "BOXSTATUS":
					case "MACHINESTATUS":
						$(this).selectpicker('val', (arrs[$(this).attr('attrX')] == null ? '' : arrs[$(this).attr('attrX')]) )
						break;
					case "ESTIMATEBY":
					case "APPROVALBY":
					case "REPAIRBY":
					case "COMPLETEDBY":
					case "CANCELBY":
						$(this).val( (arrs[$(this).attr('attrX')] == null ? iUser : arrs[$(this).attr('attrX')]) );
						break;
					case "ESTIMATEDATE":
					case "APPRPVALDATE":
					case "REPAIRDATE":
					case "COMPLETEDDATE":
					case "CANCLEDATE":
						$(this).val( (arrs[$(this).attr('attrX')] == null ? "" : arrs[$(this).attr('attrX')]) );
						break;
						if ( arrs[$(this).attr('attrX')] == null ) {
							$(this).val('');
						}
						else {
							var sDate = new Date(Date.parse( arrs[$(this).attr('attrX')] ,"dd/mm/yyyy HH:mm:ss"));
							var iDate = moment(sDate).format('DD/MM/YYYY HH:mm:ss');
							// console.log(moment(sDate, 'DD/MM/YYYY HH:mm:ss'));
							$(this).val(iDate);
						}
						// $(this).val( arrs[$(this).attr('attrX')] == null ? "" : arrs[$(this).attr('attrX')].format('DD/MM/YYYY HH:mm:ss') );
						// $('#toDate').val(moment().format('DD/MM/YYYY HH:mm:ss'));
						break;
					default:
						$(this).val(arrs[$(this).attr('attrX')]);
						break;
				}
			});
			// $('#txtVENDOR_ID').prop('readonly', true);
			// $('#txtVENDOR_ID').attr('readonly', true);
			$('#inputForm').attr("rowguid", arrs['MASTER_ROWGUID']);
		}

		function fillData_CNTRDETAILS(arrs){
			clear_INPUT();
			$('#inputForm').find('input[attrY], textarea').each(function(){
				$(this).val(arrs[$(this).attr('attrY')]);
			});
			fillData_UserCode();
			$('#txtYARDPOS').val(arrs.cArea ? arrs.cArea : arrs.cBlock + '-' + arrs.cBay + '-' + arrs.cRow + '-' + arrs.cTier);
			// $('#txtVENDOR_ID').prop('readonly', false);
			// $('#txtVENDOR_ID').attr('readonly', false);
			$('#inputForm').attr("rowguid", arrs['rowguid']);
			tbl.newMoreRows(6, 0);
			$('.addnew').removeClass('addnew');

		}

		function fillData_UserCode(){
			var xyzt = ["txtESTIMATEBY", "txtAPPROVALBY", "txtREPAIRBY", "txtCOMPLETEDBY", "txtCANCELBY"];
			xyzt.forEach(function(item){
				$('#'+item).val(iUser);
			});
		}

		function onoffReadonly(){
			$('#inputForm').find('input[attrR], textarea[attrR]').each(function(){
				$(this).prop('readonly', true);
				// $(this).attr('readonly', true);
			});
		}

		function clear_INPUT(){
			$("#inputForm").find("input, textarea").each(function(){
				if($(this).attr("attrX")!="CNTRNO")
					$(this).val("");
			});
			$('#inputForm').attr("rowguid", "");
		}

		$('#save').on('click', function(){
			// if(tbl.DataTable().rows( '.addnew, .editing' ).data().toArray().length == 0) {
            // 	$('.toast').remove();
            // 	toastr["info"]("Không có dữ liệu thay đổi!");
			// }
			// else {
			if(!tbl.validate_required()) return;
			$.confirm({
				title: 'Thông báo!',
				type: 'orange',
				icon: 'fa fa-warning',
				content: 'Tất cả sẽ được lưu lại!\nTiếp tục?',
				buttons: {
					ok: {
						text: 'Xác nhận lưu',
						btnClass: 'btn-warning',
						keys: ['Enter'],
						action: function(){
							VALIDATE_DATA_INPUT("#inputForm", 'attrX', function(){
								saveData();
							},function(err){
								alert(err);
							});
						}
					},
					cancel: {
						text: 'Hủy bỏ',
						btnClass: 'btn-default',
						keys: ['ESC']
					}
				}
			});
			// }
		});

		function saveData(){
			var dataForm = GET_ALL_DATA_INPUT('#inputForm', 'attrX');
			dataForm['MASTER_ROWGUID'] = $('#inputForm').attr('rowguid');

			if (dataForm['ESTIMATEDATE'] == "") {
				toastr["error"]("Vui lòng chọn ngày Estimate!");
				return;
			}

			if (dataForm['COMPLETEDDATE'] != "" && dataForm['APPRPVALDATE'] == "") {
				toastr["error"]("Cần xác nhận Approval Date trước khi Complete!");
				return;
			}

			
			// console.log(dataForm);
			// return;

			var newData = tbl.getAddNewData();
			var editData = tbl.getEditData();
			Array.prototype.push.apply(newData,editData);
			var xxCheck = true;
			newData.forEach(function(item){
				if (item['COMP_ID'] != "" && item['REP_ID'] != "" && item['PAYERTYPE'] == "") {
					xxCheck = false;
					return;
				}
			});

			if (xxCheck == false) {
				toastr["error"]("Vui lòng xác định đối tượng thanh toán!");
				return;
			};
			var fData = {
				DATA_FORM: dataForm,
				DATA_DETAILS: newData,
				iAction: 'saveDATA'
			};
			console.log(fData);
			// return;
			postSave(fData);
		}
		

		function postSave(formData){
			var saveBtn = $('#save');
			saveBtn.button('loading');
			$('.page-content.fade-in-up').blockUI();
			$.ajax({ 
				url: '<?= site_url(md5('ExpertiseAndRepair').'/'.md5('erQuoteAndRepair'));?>',
				dataType: 'json',
				data: formData,
				type: 'POST',
				success: function (data) {
					saveBtn.button('reset');
					$('.page-content.fade-in-up').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Lưu thành công!");
						console.log(formData['DATA_FORM']);
						if (formData['DATA_FORM'].ESTIMATENO == "") {
							$('#txtESTIMATENO').val(data.iESTIMATENO);
						}
						if (data.REPAIR_DETAILS) {
							tbl.dataTable().fnClearTable();
							Load_Data_Grid('contenttable', _columns, data['REPAIR_DETAILS']);
						}
					}
					if(data.deny) {
						toastr["error"](data.deny);
						return;
					};
				},
				error: function(err){
					toastr["error"]("Error!");
					saveBtn.button('reset');
					$('.page-content.fade-in-up').unblock();
					console.log(err);
				}
			});
		}

		$("#txtESTIMATEDATE, #txtAPPRPVALDATE, #txtREPAIRDATE, #txtCOMPLETEDDATE, #txtCANCLEDATE, #txtPTI_DATE, #txtBOXCOMPLETED_DATE, #txtMACHINECOMPLETED_DATE, #xxxAge").datetimepicker({
			controlType: 'select',
			oneLine: true,
			// dateFormat: 'dd/mm/yy',
			dateFormat: 'yy-mm-dd',
			timeFormat: 'HH:mm:00',
			timeInput: true,
			useCurrent: true,
			// autoclose: true,
			onSelect: function (e, x) {
				$(this).datepicker('hide');
				/* Do nothing */
			}	
		});

		$('#txtESTIMATEDATE + span').on('click', function () {
			$('#txtESTIMATEDATE').val('');
		});
		$('#txtAPPRPVALDATE + span').on('click', function () {
			$('#txtAPPRPVALDATE').val('');
		});
		$('#txtREPAIRDATE + span').on('click', function () {
			$('#txtREPAIRDATE').val('');
		});
		$('#txtCOMPLETEDDATE + span').on('click', function () {
			$('#txtCOMPLETEDDATE').val('');
		});
		$('#txtCANCLEDATE + span').on('click', function () {
			$('#txtCANCLEDATE').val('');
		});

		// $('#txtESTIMATEDATE, #txtAPPRPVALDATE, #txtREPAIRDATE, #txtCOMPLETEDDATE, #txtCANCLEDATE, #txtPTI_DATE, #txtBOXCOMPLETED_DATE, #txtMACHINECOMPLETED_DATE').on('changeDate', function(ev){
		// 	console.log('Changed');
		// 	$(this).datepicker('hide');
		// });

        $('#exportEstimate').on('click', function(e){
			// exportEstimate
			var rpESTIMATENO = $('#txtESTIMATENO').val();
			var rpCNTRNO = $('#txtCNTRNO').val();
			if (rpESTIMATENO == "" || rpCNTRNO == "") {
				toastr["warning"]("Chưa xác định số Container/ số Lệnh");
				return;
			};
			var fData = {
				DATA_FORM: {CNTRNO: rpCNTRNO, ESTIMATENO: rpESTIMATENO},
				iAction: 'loadReport'
			};
			$.ajax({ 
				url: '<?= site_url(md5('ExpertiseAndRepair').'/'.md5('erQuoteAndRepair'));?>',
				dataType: 'json',
				data: fData,
				type: 'POST',
				success: function (data) {
					if (data) {
					// if (data && data.length > 0) {
						fillData_Report(data['xMaster'], data['xDetails']);
						// Load_Data_Grid('contenttable', _columns, data);
						var w = window.open('PHIẾU ESTIMATE'),
							headContent = document.getElementsByTagName('head')[0].innerHTML;

						w.document.write('<html><head>' + headContent + '<link rel="stylesheet" type="text/css" href="' + "<?=base_url('assets/css/quote_and_repair_css.css');?>" + '"></head><body style="background: rgb(204,204,204); font-family: "Times New Roman", Times, serif; background: rgb(204,204,204);"><page style="padding: 10px 5px 10px 5px;">');
						w.document.write($('#dataExportEstimate').html());
						w.document.write('</page></body></html>');
					}
					else {
						toastr["success"]("Không có dữ liệu!");
						return;
					}
					return;
				},
				error: function(err){
					toastr["error"]("Error!");
					$('.page-content.fade-in-up').unblock();
					console.log(err);
				}
			});
			return;
            var w = window.open('', 'PHIẾU ESTIMATE'),
            	headContent = document.getElementsByTagName('head')[0].innerHTML;

            w.document.write('<html><head>' + headContent + '<link rel="stylesheet" type="text/css" href="' + "<?=base_url('assets/css/quote_and_repair_css.css');?>" + '"></head><body style="background: rgb(204,204,204); font-family: "Times New Roman", Times, serif; background: rgb(204,204,204);"><page>');
            w.document.write($('#dataExportEstimate').html());
            w.document.write('</page></body></html>');
        });

		/*
        $("#exportReport").on('click', function(e){
        	var w = window.open('', 'BÁO CÁO BÁO GIÁ - SỬA CHỮA'),
            	headContent = document.getElementsByTagName('head')[0].innerHTML;

            w.document.write('<html><head>' + headContent + '<link rel="stylesheet" type="text/css" href="' + "<?=base_url('assets/css/quote_and_repair_css.css');?>" + '"></head><body style="background: rgb(204,204,204); font-family: "Times New Roman", Times, serif; background: rgb(204,204,204);"><page>');
            w.document.write($('#dataExportReport').html());
            w.document.write('</page></body></html>');
		   });
		*/

		$('#editor-input').on('change', function(e){
			var colIdx = tbl.find('td.focus').index();
			switch (colIdx) { 
				case _columns.indexOf("COMP_ID"):
				case _columns.indexOf("REP_ID"):
				case _columns.indexOf("LENGTH"):
				case _columns.indexOf("WIDTH"):
				case _columns.indexOf("QUANTITY"):
					var rowIdx = tbl.find('td.focus').closest('tr').index();
					onChangeMain(rowIdx);
					break;
				case _columns.indexOf("HOURS"):
				case _columns.indexOf("LABOR_PRICE"):
				case _columns.indexOf("MATE_PRICE"):
					var rowIdx = tbl.find('td.focus').closest('tr').index();
					onChangeTotal(rowIdx);
					break;
				default: break;
			};
		});	

		var gridTimeOut;
		// tbl.on('change', 'td', function(e){
		// 	console.log(e);
		// 	var colidx = $(this).index();
		// 	switch (colidx) {
		// 		case _columns.indexOf("COMP_ID"):
		// 		case _columns.indexOf("REP_ID"):
		// 		case _columns.indexOf("LENGTH"):
		// 		case _columns.indexOf("WIDTH"):
		// 		case _columns.indexOf("QUANTITY"):
		// 			// clearTimeout(gridTimeOut);
		// 			// gridTimeOut = setTimeout(function(){ onChangeMain( $( e.target )); tbl.DataTable().draw(false); }, 70);
		// 			onChangeMain( $( e.target ) );
		// 			tbl.DataTable().draw(false);
		// 			break;
		// 		default: break;
		// 	}
		// });

		function fillTotal( rowIdx ) {
			var dtC = tbl.DataTable(); 
			var iiHours = dtC.cell( rowIdx, _columns.indexOf( "HOURS" ) ).data() ? dtC.cell( rowIdx, _columns.indexOf( "HOURS" ) ).data() : 0,
				iiLabor = dtC.cell( rowIdx, _columns.indexOf( "LABOR_PRICE" ) ).data() ? dtC.cell( rowIdx, _columns.indexOf( "LABOR_PRICE" ) ).data() : 0,
				iiMate = dtC.cell( rowIdx, _columns.indexOf( "MATE_PRICE" ) ).data() ? dtC.cell( rowIdx, _columns.indexOf( "MATE_PRICE" ) ).data() : 0,
				iiUnit = dtC.cell( rowIdx, _columns.indexOf( "UNIT" ) ).data(),
				iiQuantity = dtC.cell( rowIdx, _columns.indexOf( "QUANTITY" ) ).data() ? dtC.cell( rowIdx, _columns.indexOf( "QUANTITY" ) ).data() : 0;
			
			var iiLaborRate = parseFloat(iiLabor) * parseFloat(iiHours);
			var iiTotal = 0;
			if(iiUnit+"" == "Q") {
				iiTotal = parseFloat(iiLaborRate) + parseFloat(iiMate);
			}
			else {
				iiTotal = (parseFloat(iiLaborRate) + parseFloat(iiMate)) * parseFloat(iiQuantity);
			}
			dtC.cell( rowIdx, _columns.indexOf( "TOTAL" ) ).data(iiTotal.toFixed(2));
			dtC.draw(false);
		}

		function onChangeTotal( rowIdx ){
			var dtC = tbl.DataTable(); 
			rowIdx = dtC.row( tbl.find("td.focus").closest('tr') ).index();
			dtC.draw(false);
			fillTotal(rowIdx);
		}

		// function onChangeMain( cell ){
		function onChangeMain( rowIdx ){
			var dtC = tbl.DataTable(); 
			// var rowIdx = dtC.cell( cell ).index().row;
			var iiComp = tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "COMP_ID" ) + ')').html(),
				iiRep = tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "REP_ID" ) + ')').html(), 
				iiLength = tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "LENGTH" ) + ')').html(),
				iiWidth = tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "WIDTH" ) + ')').html(),
				iiQuantity = tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "QUANTITY" ) + ')').html();

			// var iiComp = dtC.cell( rowIdx, _columns.indexOf( "COMP_ID" ) ).data(),
			// 	iiRep = dtC.cell( rowIdx, _columns.indexOf( "REP_ID" ) ).data(),
			// 	iiLength = dtC.cell( rowIdx, _columns.indexOf( "LENGTH" ) ).data(),
			// 	iiWidth = dtC.cell( rowIdx, _columns.indexOf( "WIDTH" ) ).data(),
			// 	iiQuantity = dtC.cell( rowIdx, _columns.indexOf( "QUANTITY" ) ).data();
			
			rowIdx = dtC.row( tbl.find("td.focus").closest('tr') ).index(); //tbl.find('tbody tr').length-rowIdx-1;
			if (iiComp && iiRep && iiLength && iiWidth && iiQuantity) {
				console.log(ifGroupID);
				var iiTariff = cbTariff.filter(p => p.GROUP_TRF_ID == ifGroupID 
									&& p.COMP_ID == iiComp
									&& p.REP_ID == iiRep
									&& parseFloat(p.SIZE) == parseFloat(iiLength)
									&& parseFloat(p.WIDTH) == parseFloat(iiWidth)
									&& parseFloat(p.QUANTITY) == parseFloat(iiQuantity));
				if (iiTariff && iiTariff.length > 0) {
					// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "UNIT" ) + ')').html(iiTariff[0]['UNIT']);
					// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "HOURS" ) + ')').html(iiTariff[0]['HOURS']);
					// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "MATE_PRICE" ) + ')').html(iiTariff[0]['MATE_USD']);
					dtC.cell( rowIdx, _columns.indexOf( "UNIT" ) ).data( iiTariff[0]['UNIT'] );
					dtC.cell( rowIdx, _columns.indexOf( "HOURS" ) ).data( iiTariff[0]['HOURS'] );
					dtC.cell( rowIdx, _columns.indexOf( "MATE_PRICE" ) ).data( iiTariff[0]['MATE_USD'] );
				}
				else {
					// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "UNIT" ) + ')').html('');
					// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "HOURS" ) + ')').html('');
					// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "MATE_PRICE" ) + ')').html('');
					dtC.cell( rowIdx, _columns.indexOf( "UNIT" ) ).data("");
					dtC.cell( rowIdx, _columns.indexOf( "HOURS" ) ).data("");
					dtC.cell( rowIdx, _columns.indexOf( "MATE_PRICE" ) ).data("");
				}
			}
			else {
				// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "UNIT" ) + ')').html('');
				// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "HOURS" ) + ')').html('');
				// tbl.find('tbody tr:eq(' + rowIdx + ') td:eq(' + _columns.indexOf( "MATE_PRICE" ) + ')').html('');
				dtC.cell( rowIdx, _columns.indexOf( "UNIT" ) ).data("");
				dtC.cell( rowIdx, _columns.indexOf( "HOURS" ) ).data("");
				dtC.cell( rowIdx, _columns.indexOf( "MATE_PRICE" ) ).data("");
			}
			dtC.draw(false);
			fillTotal(rowIdx);
		}

		/*
		// var cbALL = <?= $P_Combobox ?>;
		// console.log(cbALL);
		*/
		
		// if (cbALL && cbALL.length > 0) {
		// 	var cbBoxStatus = cbALL.filter(p=>p.TYPECODE == "6");
		// 	if (cbBoxStatus && cbBoxStatus.length > 0) {

		// 	}
		// }
		
		var cbo_PAYERTYPE = [
			'O',
			'D',
			'T',
			'I',
			'X',
			'U',
			'F'
		];
		var tblDetails_Header = tbl.parent().prev().find('table');
		tblDetails_Header.find(' th:eq(' + _columns.indexOf( 'PAYERTYPE' ) + ') ').setSelectSource( cbo_PAYERTYPE );
		tbl.setExtendDropdown({
			target: "#cell-context-cbo_PAYERTYPE",
			source: cbo_PAYERTYPE,
			live_search: true,
			colIndex: _columns.indexOf("PAYERTYPE"),
			onSelected: function(cell, value){
				// var keys = cboItemGroup.filter(p => p.Name == value).map(x=>x.Code)[0];
				// var tempHtml = "<input class='hiden-input' value='" + keys + "' >" + value;
				$(cell).parent().addClass("editing");
				// tbl.DataTable().cell(cell).data(tempHtml).draw(false);
				tbl.DataTable().cell(cell).data(value).draw(false);
			}
		});

		var sumALL = ( iiReturn, iiCurrent) => parseFloat(iiReturn).toFixed(2) + parseFloat(iiCurrent).toFixed(2);

		//EXCEL
		//-----AHIEU------
		var Upload = function (file) {
			this.file = file;
		};

		Upload.prototype.getType = function() {
			return this.file.type;
		};
		Upload.prototype.getSize = function() {
			return this.file.size;
		};
		Upload.prototype.getName = function() {
			console.log(this);
			return this.file.name;
		};
		Upload.prototype.doUpload = function () {
			var that = this;
			var formData = new FormData();

			// add assoc key values, this will be posts values
			formData.append("file", this.file, this.getName());
			formData.append("upload_file", true);

			$.ajax({
				type: "POST",
				url: "<?=site_url(md5('ExpertiseAndRepair') . '/' . md5('ajax_load_excel'));?>",
				xhr: function () {
					var myXhr = $.ajaxSettings.xhr();
					if (myXhr.upload) {
						myXhr.upload.addEventListener('progress', that.progressHandling, false);
					}
					return myXhr;
				},
				success: function (data) {
					var data=JSON.parse(data);
					console.log(data);
					// return;
					$("#fileinput").val('');
					if(data.length>0) {
						var stt=$("#contenttable").DataTable().rows().count();
						$("#contenttable tbody tr").addClass("cwt");
						$.each(data, function (k, v) {	
							if (v[1] == "" || v[1] == null) return;
							// console.log(v);
							stt++;
							var ite=[];
							ite[0]=stt;
							ite[1]=v[1];
							ite[2]=v[2];
							ite[3]=v[3];
							ite[4]=v[4];
							ite[5]=v[5];
							ite[6]=v[6];
							ite[7]=v[7];
							ite[8]=v[8];
							ite[9]=v[9];
							ite[10]=v[10];
							ite[11]=v[11];
							ite[12]=v[12];
							ite[13]=v[13];
							ite[14]=v[14];
							ite[15] = "";
							var addj=$("#contenttable").DataTable().row.add(ite).draw();	
							$(addj).addClass("editing");	
						});
						$("#contenttable tbody tr:not(.cwt)").addClass("editing");
						$("#contenttable tbody tr").removeClass("cwt");
					}
				},
				error: function (error) {
					// handle error
				},
				async: true,
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				timeout: 60000
			});
		};

		$(document).on(evClick,"#addexcel",function(){
			$("#fileinput").trigger(evClick);
		});

		$(document).on("change","#fileinput",function(){
			console.log("fileinput-change");
			var code=$(this).attr("code");
			var file = $("#fileinput")[0].files[0];
		    var upload = new Upload(file);
		    upload.doUpload();
		});

		/* Export Excel */
		$('#export').on('click', function(e){
			var rpESTIMATENO = $('#txtESTIMATENO').val();
			var rpCNTRNO = $('#txtCNTRNO').val();
			if (rpESTIMATENO == "" || rpCNTRNO == "") {
				toastr["warning"]("Chưa xác định số Container/ số Lệnh");
				return;
			};
			var fData = {
				DATA_FORM: {CNTRNO: rpCNTRNO, ESTIMATENO: rpESTIMATENO},
				iAction: 'loadReport'
			};
			$.ajax({ 
				url: '<?= site_url(md5('ExpertiseAndRepair').'/'.md5('erQuoteAndRepair'));?>',
				dataType: 'json',
				data: fData,
				type: 'POST',
				success: function (data) {
					if (data) {
						processData(data['xMaster'], data['xDetails']);
					}
					else {
						toastr["success"]("Không có dữ liệu!");
						return;
					}
					return;
				},
				error: function(err){
					toastr["error"]("Error!");
					$('.page-content.fade-in-up').unblock();
					console.log(err);
				}
			});
		});

		function processData(data1, data2){
			/* Prepare data for export */
			var sumHour = 0,
				sumLabourCode = 0,
				sumMeterialCode = 0,
				sumTotalCost = 0,
				laborRate = data2[0].HOURS,
				laborRateData = data2[0].LABOR_PRICE;

			tableDataExport  = '';
			tableDataExport += '<tr style="width: 100%"><th class="STT">STT</th><th class="COMP_ID">Comp Code</th><th class="COMP_NAME_EN">Component Name</th><th class="DAM_ID">Dam Code</th><th class="LOC_ID">Loc</th><th class="REP_ID">Rep Code</th><th class="LENGTH">Length</th><th class="WIDTH">Width</th><th class="QUANTITY">Qty</th><th class="UNIT">P</th><th class="HOURS">Hours</th><th class="LABOR_PRICE">Labour Cost</th><th class="MATE_PRICE">Meterial Cost</th><th class="TOTAL">Total Cost</th></tr>';


			for (i = 0; i < data2.length; i++) {
				var data = data2[i];
				if (data.LABOR_PRICE != laborRateData){
					laborRate = '';
				}
console.log(data2);
				sumHour 		+= (data.HOURS 		 ? parseFloat(data.HOURS) 		: 0);
				sumLabourCode 	+= (data.LABOR_PRICE ? parseFloat(data.LABOR_PRICE) : 0);
				sumMeterialCode += (data.MATE_PRICE  ? parseFloat(data.MATE_PRICE) 	: 0);
				sumTotalCost 	+= (data.TOTAL 		 ? parseFloat(data.TOTAL) 		: 0);
				cell = '<tr> <td style="width: 5%">' + (parseInt(i) + 1) + '</td>' +
					'<td>' + ( data.COMP_ID ) + '</td>' +
					'<td>' + ( data.COMP_NAME_EN == null ? "" : data.COMP_NAME_EN ) + '</td>' +
					'<td>' + ( data.DAMID 		 == null ? "" : data.DAM_ID ) + '</td>' +
					'<td>' + ( data.LOC_ID 		 == null ? "" : data.LOC_ID ) + '</td>' +
					'<td>' + ( data.REP_ID 		 == null ? "" : data.REP_ID ) + '</td>' +
					'<td>' + ( data.LENGTH 		 == null ? "" :	data.LENGTH ) + '</td>' +
					'<td>' + ( data.WIDTH 		 == null ? "" : data.WIDTH ) + '</td>' +
					'<td>' + ( data.QUANTITY 	 == null ? "" : data.QUANTITY ) + '</td>' +
					'<td>' + ( data.PAYERTYPE 		 == null ? "" : data.PAYERTYPE ) + '</td>' +
					'<td>' + ( data.HOURS 		 == null ? "" : data.HOURS ) + '</td>' +
					'<td>' + ( data.LABOR_PRICE  == null ? "" : data.LABOR_PRICE ) + '</td>' +
					'<td>' + ( data.MATE_PRICE 	 == null ? "" : data.MATE_PRICE ) + '</td>' +
					'<td>' + data.TOTAL + '</td> </tr>';
				tableDataExport += cell;
			} 

			// $('#txtHours').val(arrs1.map(p=>p.HOURS).reduce(sumALL));
			$("#SIZE").html('SIZE: ' + $("#txtSZTP").val());
			$("#rCntrNo").text('UNIT #: ' + $('#txtCNTRNO').val());
			$("#rEstimateDate").text('ESTIMATE DATE: ' + getDate($('#txtESTIMATEDATE').val()));
			$("#rEstimateNo").text('ESTIMATE NO: ' + $('#txtESTIMATENO').val());
			$("#LABOR_RATE").html('LABOR RATE: ' + laborRate);
			$("#report_HOURS").html(sumHour);
			$('#reportLABOR_PRICE').html(sumLabourCode.toFixed(2));//arrs1.map(p=>p.LABOR_PRICE).reduce(sumALL));
			$('#reportMATE_PRICE').html(sumMeterialCode.toFixed(2));//arrs1.map(p=>p.MATE_PRICE).reduce(sumALL));
			$('#reportTOTAL').html(sumTotalCost.toFixed(2));//arrs1.map(p=>p.TOTAL).reduce(sumALL));
			$('#reportTOTAL1').html($('#reportTOTAL').html());
			$('#reportTOTAL2').html($('#reportTOTAL').html());

			tableDataExport += '<tr class="notDelete">';
				tableDataExport += '<td style="border-right: none!important; font-weight: bolder; text-align: left; margin-left: 5px; vertical-align: top; padding-left: 5px; border-right: none;" colspan="5" colspan="10">TOTAL<br>COVERAGE<br>DRAYAGE<br>PHOTO</td>';	
				tableDataExport += '<td style="vertical-align: top; text-align: right; border-left: none; border-right: none; border-left: none;"><b id="report_HOURS">' + $('#report_HOURS').html() + '</b><br><br><br></td>';
				tableDataExport += '<td style="vertical-align: top; text-align: right; border-left: none; border-right: none"><b id="reportLABOR_PRICE">' + $('#reportLABOR_PRICE').html() + '</b><br><br><br></td>';
				tableDataExport += '<td style="vertical-align: top; text-align: right; border-left: none; border-right : none"><b id="reportMATE_PRICE">' + $('#reportMATE_PRICE').html() + '</b><br><br><br></td>';
				tableDataExport += '<td style="vertical-align: top; text-align: right; border-left: none"><b id="reportTOTAL">' + $('#reportTOTAL').html() + '</b><br><br><br></td>';
			tableDataExport += '</tr>';
			tableDataExport += '<tr class="notDelete">';
				tableDataExport += '<td style="border-right: none!important; font-weight: bolder; text-align: left; margin-left: 5px; vertical-align: top; padding-left: 5px;" colspan="14">COMMENT: <b attrReport = "DESCRIPTION_ESTIMATE" style="font-weight: normal;">' + $('#txtDESCRIPTION_ESTIMATE').html() + '</b></td>';
			tableDataExport += '</tr>';

			/*
			tableDataExport += '<tr class="notDelete">';
				tableDataExport += '<td colspan="6" class="noBorderRight" style="border-bottom: none!important; border-right: none;!important">MANUFACTURE DATE</td>';
				tableDataExport += '<td colspan="2" class="noBorderRight" style="font-weight: bold">';
					tableDataExport += $('#AGE_DATE').html();
				tableDataExport += '</td>';
				tableDataExport += '<td colspan="5" class="noBorderRight" style="border-bottom: none!important; border-right: none!important;">OPPERATION TOTAL</td>';
				tableDataExport += '<td style="text-align: right;">-</td>';
			tableDataExport += '</tr>';
			tableDataExport += '<tr class="notDelete">';
				tableDataExport += '<td colspan="6" class="noBorderRight" style="border-bottom: none!important; border-right: none!important; border-top: none!important;">APPROVAL DATE</td>';
				tableDataExport += '<td colspan="2" class="noBorderRight"  style="font-weight: bold;  border-top: none!important;">';
					tableDataExport += $('#APPRPVALDATE').html();
				tableDataExport += '</td>';
				tableDataExport += '<td colspan="5" class="noBorderRight" style="border-bottom: none!important; border-right: none;!important">CUSTOMER TOTAL</td>';
				tableDataExport += '<td style="text-align: right;">';
					tableDataExport += $('#reportTOTAL1').html();
				tableDataExport += '</td>';
			tableDataExport += '</tr>';
			tableDataExport += '<tr class="notDelete">';
				tableDataExport += '<td colspan="6" class="noBorderRight" style="border-bottom: none!important; border-right: none!important; border-top: none!important;">COMPLETED DATE</td>';
				tableDataExport += '<td colspan="2" class="noBorderRight" style="font-weight: bold;  border-top: none!important;">';
					tableDataExport += $('#COMPLETEDDATE').html();
				tableDataExport += '</td>';
				tableDataExport += '<td colspan="5" class="noBorderRight" style="border-bottom: none!important; border-right: none!important; ">DISCOUNT</td>';
				tableDataExport += '<td style="text-align: right;">-</td>';
			tableDataExport += '</tr>';
			tableDataExport += '<tr class="notDelete">';
				tableDataExport += '<td colspan="6" class="noBorderRight" style="border-top: none!important;"></td>';
				tableDataExport += '<td colspan="2" class="noBorderRight" style="font-weight: bold;"></td>';
				tableDataExport += '<td colspan="5" class="noBorderRight">GRAND TOTAL</td>';
				tableDataExport += '<td style="text-align: right;">';
					tableDataExport += $('#reportTOTAL2').html();
				tableDataExport += '</td>';
			tableDataExport += '</tr>';
			*/
			
			tableDataExport += '<tr class="notDelete">';
				tableDataExport += '<td colspan="8" class="noBorderRight">';
					tableDataExport += '<b style="font-weight: bolder">MANUFACTURE DATE: </b><b attrReport = "" style="font-weight: normal"></b><br>';
					tableDataExport += '<b style="font-weight: bolder">APPROVAL DATE: </b><b attrReport = "APPRPVALDATE" style="font-weight: normal"></b><br>';
					tableDataExport += '<b style="font-weight: bolder">COMPLETED DATE: </b><b attrReport = "COMPLETEDDATE" style="font-weight: normal"></b><br><br>';
				tableDataExport += '</td>';
				tableDataExport += '<td colspan="5" class="noBorderLeftRight" style="font-weight: bolder; border-right: none">OPPERATION TOTAL<br>CUSTOMER TOTAL<br>DISCOUNT<br>GRAND TOTAL<br>';
				tableDataExport += '</td>';
				tableDataExport += '<td style="font-weight: bolder; text-align: right!important; border-left: none; padding-left: auto;">-<br><b id="reportTOTAL1">' + $('#reportTOTAL1').html() + '</b><br>-<br><b id="reportTOTAL2">' + $('#reportTOTAL2').html() + '</b>';
				tableDataExport += '</td>';
			tableDataExport += '</tr>';

			/* Export Excel */
			exportExcel(tableDataExport);
		}

		function exportExcel(src){
			var dataSrc = '<html><head><style>#xxx th, #xxx td {border: 1px solid black; border-width: thin;} </style></head><body>';

			dataSrc += '<table>';
				dataSrc += '<tr>';
					dataSrc += '<td colspan="9" class="title">';
						dataSrc += '<img style="height: 45%; width: 30%" src="<?=base_url('assets/img/logoITC.png');?>">';
					dataSrc += '</td>';
					dataSrc += '<td colspan="5" style="text-align: right; padding-top: 5px;" class="title">Add: Nguyen Thi Tu Street, Phu Huu Ward, Dist. HCMC<br>Tel: 028 37315050; Fax: 028 373 15051';
					dataSrc += '</td>';
				dataSrc += '</tr>';
				dataSrc += '<tr style="margin-top: 2rem; margin-bottom: 2rem;">';
					dataSrc += '<td colspan="14" style="font-weight: bold; text-align: center; font-size: 1.25rem;">ESTIMATE OF REPAIRS</td>';
				dataSrc += '</tr>';
				dataSrc += '<tr>';
					dataSrc += '<td colspan="12" class="title"></td>';
					dataSrc += '<td colspan="2" class="title" style="text-align: right!important;">';
						dataSrc += '<span id="rCntrNo" style="font-weight: bold">' + $('#rCntrNo').html() + '</span><br>';
						dataSrc += '<span id="rEstimateDate">' + $('#rEstimateDate').html() + '</span><br>';
						dataSrc += '<span id="rEstimateNo">' + $('#rEstimateNo').html() + '</span><br>';
					dataSrc += '</td>';
				dataSrc += '</tr>';
				dataSrc += '<tr>';
					dataSrc += '<td></td>';
					dataSrc += '<td class="title2" colspan="2" style="width: 20%">UNIT OF MEASURE:</td>';
					dataSrc += '<td class="title2" colspan="3" style="width: 20%">CURRENCY: USD</td>';
					dataSrc += '<td class="title2" colspan="4" style="width: 20%" id="LABOR_RATE">' + $('#LABOR_RATE').html() + '</td>';
					dataSrc += '<td class="title2" colspan="2" style="width: 20%" id="SIZE">' + $('#SIZE').html() + '</td>';
					dataSrc += '<td class="title2" colspan="2" style="width: 20%">LOC: SP-ITC</td>';
				dataSrc += '</tr>';
		    dataSrc += "</table>";
			dataSrc += "<table id='xxx'>";
		    	dataSrc += src;
		    dataSrc += "</table>";
			dataSrc += '<table>';
				dataSrc += '<tr><td></td></tr>';
		    	dataSrc += '<tr class="notDelete" style="border: none!important; height: 4rem; font-weight: bolder">';
		    		dataSrc += '<td colspan="2"></td>';
					dataSrc += '<td colspan="3" style="border: none!important;"><u>APPROVAL PARTY</u>';
					dataSrc += '</td>'
					dataSrc += '<td colspan="5" style="border: none!important;">CUSTOMER';
					dataSrc += '</td>';
					dataSrc += '<td></td>';
					dataSrc += '<td colspan="3" style="border: none!important;">SP-ITC REPAIR WORKSHOP';
					dataSrc += '</td>';
				dataSrc += '</tr>';
			dataSrc += '</table></body></html>';

			var data_type = 'data:application/vnd.ms-excel',
		    	a = document.createElement('a');
		   	a.href = data_type + ', ' + encodeURIComponent(dataSrc);
		    a.download = 'REPAIR REPORT.xls';
	        a.click();
	        e.preventDefault();
		    return(a);
		}

		// $('#addexcel').on('click', function(){
		// 	$("#fileinput").trigger('change');
		// });
		// $(document).on("change","#fileinput",function(){
		// 	console.log("fileinput-change");
		// 	var code=$(this).attr("code");
		// 	var file = $("#fileinput")[0].files[0];
		// 	var upload = new Upload(file);
		// 	upload.doUpload();
		// });

		//----AHAO-----
		// function fnExcelReport() {
		// 	var tab_text="<table border='2px'>";
		// 	var textRange; var j=0;
		// 	tab = document.getElementById('contenttable'); // id of table
		// 	//alert($(tab).find("thead tr").html());
		// 	var theader="";
		// 	$(tab).find("thead tr th").each(function(){
		// 		theader+="<td width=200><b>"+$(this).html()+"</b></td>";
		// 	});
		// 	tab_text+="<tr bgcolor='#FFFFFF'>"+theader+"</tr>";
		// 	for(j = 0 ; j < tab.rows.length ; j++) 
		// 	{     
		// 		tab_text+="<tr>"+tab.rows[j].innerHTML+"</tr>";
		// 		//tab_text=tab_text+"</tr>";
		// 	}

		// 	tab_text=tab_text+"</table>";
		// 	tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
		// 	tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
		// 	tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

		// 	var ua = window.navigator.userAgent;
		// 	var msie = ua.indexOf("MSIE "); 

		// 	if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
		// 	{
		// 		txtArea1.document.open("txt/html","replace");
		// 		txtArea1.document.write(tab_text);
		// 		txtArea1.document.close();
		// 		txtArea1.focus(); 
		// 		sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
		// 	}  
		// 	else                 //other browser not tested on IE 11
		// 		sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

		// 	return (sa);
		// }

		// $(document).on("click","#export",function(){
		// 	fnExcelReport();
		// });
//---------------------------------------------------
		   
	});
</script>