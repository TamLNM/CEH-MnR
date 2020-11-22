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
	.containerButton{
		width: 1.75vw!important;
		height: 1.75vw!important;
	}
</style>
<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<div class="ibox-head">
				<div class="ibox-title">TRUY VẤN CONTAINER GIÁM ĐỊNH SỬA CHỮA</div>
				<div class="button-bar-group">
					<button id="search" class="btn btn-outline-warning btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Nạp dữ liệu"
										 	title="Nạp dữ liệu">
						<span class="btn-icon"><i class="ti-search"></i>Nạp dữ liệu</span>
					</button>
				</div>
			</div>

			<div class="ibox-body mt-0 pt-0 pb-0 bg-f9 border-e" id="inputForm">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row mt-2 mb-2">
										<label class="col-md-1 col-sm-1 col-xs-1 col-form-label labelX" style="font-weight: bold">Container</label>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<input id="txtCNTRNO" attrX="CNTRNO" attrY="CntrNo" class="form-control input" placeholder="Số cont" type="text">
										</div>

										<button id="backA" class="btn btn-outline-success btn-icon-only btn-circle btn-sm containerButton  ml-1">
											<i class="la la-download la-rotate-90"></i>
										</button>
										<button id="backO" class="btn btn-outline-success btn-icon-only btn-circle btn-sm containerButton  ml-1">
											<i class="la la-arrow-left"></i>
										</button>

										<div class="col-md-2 col-sm-2 col-xs-2 ml-4" style="border-left: 1px solid rgba(0,0,0,.15);">
											<input id="numberNext" class="form-control input" placeholder="" attrR="" type="text" value="... / ..." style="text-align: center;">
										</div>
										<!-- <label class="col-form-label labelX mr-2" style="width: 3rem; border-right: 1px solid rgba(0,0,0,.15);">of 10</label> -->

										<button id="nextO" class="btn btn-outline-success btn-icon-only btn-circle btn-sm containerButton  ml-1">
											<i class="la la-arrow-right"></i>
										</button>
										<button id="nextA" class="btn btn-outline-success btn-icon-only btn-circle btn-sm containerButton ml-1">
											<i class="la la-download la-rotate-270"></i>
										</button>
										
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
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label" >THÔNG TIN CONTAINER</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<i class="la la-angle-up" style="margin-top: 0.5rem; float: right;" id="containerInfoButton"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="containerInfoTab1">
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX" title="Hãng khai thác">Kích cỡ</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Trạng thái</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtSZTP" attrX="SZTP" attrY="ISO_SZTP" attrR="" class="form-control input" placeholder="Size" type="text">
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtCMSTATUS" attrX="CMSTATUS" attrY="CMStatus" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="containerInfoTab2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Hãng khai thác</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtOPR" attrX="OPR" attrY="OprID" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="containerInfoTab3">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Vị trí bãi</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtYARDPOS" attrX="YARDPOS" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="containerInfoTab4">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ngày vào bãi</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtGATEIN_DATE" attrX="GATEIN_DATE" attrY="DateIn" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>									
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs3" id="containerInfoTab5">
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
								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 mb-3" id="containerInfoTab6">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ghi chú</label>
										<textarea id="txtREMARKS_CNTR" attrX="REMARKS_CNTR" attrY="Note" attrR="" rows="4" cols="122"></textarea>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="containerInfoTab7">
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Box Status</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Box Comptd</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtBOXSTATUS" attrX="BOXSTATUS" class="form-control input" placeholder="" type="text">
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtBOXCOMPLETED_DATE" attrX="BOXCOMPLETED_DATE" class="form-control input" placeholder="" type="text">
										</div>										
									</div>
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX" title="Machinery Status">Machinery Status</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX" title="Machinery Status">Machinery Comptd</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtMACHINESTATUS" attrX="MACHINESTATUS" class="form-control input" placeholder=""type="text">
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
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Estimated by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input id="txtESTIMATEBY" attrX="ESTIMATEBY" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Estimated date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input class="form-control form-control-sm" id="txtESTIMATEDATE" attrX="ESTIMATEDATE" attrR="" type="text" placeholder="Estimated date">
										</div>
									</div>																	
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Approval by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input id="txtAPPROVALBY" attrX="APPROVALBY" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Approval date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input class="form-control form-control-sm" id="txtAPPRPVALDATE" attrX="APPRPVALDATE" attrR="" type="text" placeholder="Approval date">
										</div>
									</div>									
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2"  id="priceInfoTab3">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Repair by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input id="txtREPAIRBY" attrX="REPAIRBY" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Repair date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input class="form-control form-control-sm" id="txtREPAIRDATE" attrX="REPAIRDATE" attrR="" type="text" placeholder="Repair date">
										</div>
									</div>									
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab4">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Completed by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input id="txtCOMPLETEDBY" attrX="COMPLETEDBY" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Completed date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input class="form-control form-control-sm" id="txtCOMPLETEDDATE" attrX="COMPLETEDDATE" attrR="" type="text" placeholder="Completed date">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab5">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Cancel by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input id="txtCANCELBY" attrX="CANCELBY" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Cancel date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input class="form-control form-control-sm" id="txtCANCLEDATE" attrX="CANCLEDATE" attrR="" type="text" placeholder="Cancel date">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab6">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Trạng thái sửa chữa</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input id="txtREPAIR_STATUS" attrX="REPAIR_STATUS" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Số lệnh</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
										<input id="txtESTIMATENO" attrX="ESTIMATENO" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>									
								</div>
								<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 mb-2" id="priceInfoTab7">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ghi chú báo giá</label>
										<textarea id="txtDESCRIPTION_ESTIMATE" attrX="DESCRIPTION_ESTIMATE" rows="4" cols="107"></textarea>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="priceInfoTab8">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Age (năm sản xuất)</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
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
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label" >THÔNG TIN TÍNH CƯỚC</label>
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
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-2 mb-2" style="border-top: 1px solid rgba(0, 0, 0, .1)"  id="tariffInfoTab6">
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<label class="col-md-12 col-sm-12 col-xs-12 col-form-label ml-5" style="font-weight: bolder;">TỔNG CỘNG</label>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Hours</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtHours" class="form-control input" placeholder="" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Mate</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtMate" class="form-control input" placeholder="" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Labor</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtLabor" class="form-control input" placeholder="" type="text">
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="font-weight: bolder;">Total</label>
												<div class="col-md-8 col-sm-8 col-xs-8">
													<input id="txtTotal" class="form-control input" placeholder="" type="text">
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
					<div id="tablecontent">
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


<script type="text/javascript">
	$(document).ready(function () {
		var tableMain = $('#contenttable').attr("tableX");
        var tableColumn = <?= $P_Columns ?>;
        var _columns = Load_GridHeader('contenttable', tableColumn);
		var tbl = $('#contenttable');
		var iUser = '<?=$this->session->UserID;?>';

//-------------------TAM---------------------------
		var parentMenuList 	= {},

		<?php if(isset($parentMenuList) && count($parentMenuList) >= 0){?>
			parentMenuList = <?=json_encode($parentMenuList);?>;
		<?php } ?>

		for (i = 0; i < parentMenuList.length; i++){
			if (parentMenuList[i]['MenuID'] == 'Tool'){
				$('#' + parentMenuList[i]['MenuID']).addClass('active');
			}
			else{
				$('#' + parentMenuList[i]['MenuID']).removeClass();
			}
		}

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
       			for (i = 1; i <= 11; i++){
					$("#priceInfoTab" + i).hide();
				}
       		}
       		else{
				$(this).addClass('la la-angle-up');
       			for (i = 1; i <= 11; i++){
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
		onoffReadonly();
		function onoffReadonly(){
			$('#inputForm').find('input, textarea').each(function(){
				if ($(this).attr('attrX') != "CNTRNO")
					$(this).prop('readonly', true);
			});
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
		$('#tbl').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});

		var iFirst = 0;
		var iLast = 0;
		var iLoading = 0;
		var iArray = [];
		var iArray_details = [];

		$('#txtCNTRNO').keypress(function(e){
			var keycode = (e.which ? e.which : e.keyCode)
			if(keycode == 13){
				$('#numberNext').val('... / ...');
				iFirst = 0;
				iLast = 0;
				iLoading = 0;
				iArray = [];
				iArray_details = []
				clear_INPUT();
				CNTRNO_KEYPRESS();
			};
		});

		function clear_INPUT(){
			$("#inputForm").find("input, textarea").each(function(){
				if($(this).attr("attrX")!="CNTRNO")
					if($(this).attr('id')!="numberNext")
						$(this).val("");
			});
			tbl.dataTable().fnClearTable();
			// $('#inputForm').attr("rowguid", "");
			// $('#numberNext').val('... / ....');
		}

		function CNTRNO_KEYPRESS(){
			var iCntrNo = $('#txtCNTRNO').val().trim();
			if(iCntrNo.length == 11 ){
				loadDataInput(iCntrNo);
			}
			else {
				toastr['error']('Nhập sai định dạng số Container');
				$(this).focus();
				return;
			};
		}

		function loadDataInput(iCntrNo){
			var dataSend = {
				CNTRNO: iCntrNo,
				iAction: 'loadDataInput'
			};
			$.ajax({ 
				type: 'POST',
				dataType: 'json',
				data: dataSend,
				url: '<?= site_url(md5('Tool').'/'.md5('tQueryExpertiseAndRepairContainer'));?>',
				success: function(dataGet){ 
					if(dataGet){
						console.log(dataGet);
						if (dataGet['iREPAIR']) { 
							toastr['success']('Load dữ liệu thành công!');
							iArray = dataGet['iREPAIR'];
							iFirst = 0;
							iLast = dataGet['iREPAIR'].length - 1;
							iLoading = iLast;
							$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
							if (dataGet['REPAIR_DETAILS']) {
								iArray_details = dataGet['REPAIR_DETAILS'];
							}
							fillData_REPAIR(dataGet['iREPAIR'][iLoading]);
							return;
						}
						else {
							toastr['success']('Không có dữ liệu!');
							$('#numberNext').val('... / ....');
							return;
						}
					}
					else {
						toastr['success']('Không có dữ liệu!');
						$('#numberNext').val('... / ....');
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

		var sumALL = ( iiReturn, iiCurrent) => parseFloat(iiReturn) + parseFloat(iiCurrent);
		function fillData_REPAIR(arrs){
			clear_INPUT();
			$('#inputForm').find('input[attrX], textarea').each(function(){
				switch ($(this).attr('attrX')) {
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
					default:
						$(this).val(arrs[$(this).attr('attrX')]);
						break;
				}
			});
			if (iArray_details) {
				var xyztt = iArray_details.filter(p=>p.CNTRNO == arrs['CNTRNO'] && p.ESTIMATENO == arrs['ESTIMATENO']);
				if (xyztt) {
					$('#txtHours').val(xyztt.map(p=>p.HOURS).reduce(sumALL));
					$('#txtLabor').val(xyztt.map(p=>p.LABOR_PRICE).reduce(sumALL))
					$('#txtMate').val(xyztt.map(p=>p.MATE_PRICE).reduce(sumALL))
					$('#txtTotal').val(xyztt.map(p=>p.TOTAL).reduce(sumALL))
					Load_Data_Grid('contenttable', _columns, xyztt);
				}
			}
		}

		$('#backA').on('click', function(){
			if (iLoading == iFirst) return;
			if (iArray[0]) {
				iLoading = iFirst;
				$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
				fillData_REPAIR(iArray[iFirst]);
			}
		});

		$('#backO').on('click', function(){
			iLoading = iLoading - 1;
			if (iLoading < iFirst) {
				iLoading = 0;
				return;
			}

			if (iArray[iLoading]) {
				$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
				fillData_REPAIR(iArray[iLoading]);
			}
		});

		$('#nextA').on('click', function(){
			if (iLoading == iLast) return;
			if (iArray[iLast]) {
				iLoading = iLast;
				$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
				fillData_REPAIR(iArray[iLast]);
			}
		});

		$('#nextO').on('click', function(){
			iLoading = iLoading + 1;
			if (iLoading > iLast) {
				iLoading = iLast;
				return;
			}

			if (iArray[iLoading]) {
				$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
				fillData_REPAIR(iArray[iLoading]);
			}
		});
	});
</script>