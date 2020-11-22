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
	.line{
		border-bottom: 1px solid rgba(0,0,0,.15); 
		padding-bottom: 0.5rem;
	}
</style>
<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<div class="ibox-head">
				<div class="ibox-title">THAY ĐỔI TRẠNG THÁI SỬA CHỮA CONTAINER</div>
				<div class="button-bar-group">
					<button id="save" class="btn btn-outline-primary btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Lưu dữ liệu" 
										title="Lưu dữ liệu">
						<span class="btn-icon"><i class="fa fa-save"></i>Lưu</span>
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
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="containerInfoTab2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Kích cỡ</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtSZTP" attrX="SZTP" attrR="" class="form-control input" placeholder="Size" type="text">
										</div>
									</div>
								</div>								
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="containerInfoTab3">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Trạng thái</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtCMSTATUS" attrX="CMSTATUS" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="containerInfoTab4">
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX" title="Hãng khai thác">Hãng khai thác</label>
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label labelX">Vị trí bãi</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtOPR" attrX="OPR" attrR="" class="form-control input" placeholder="" type="text">
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtYARDPOS" attrX="YARDPOS" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>								
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" id="containerInfoTab5">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Tình trạng</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtCONTCONDITION" attrX="CONTCONDITION" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="containerInfoTab6">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ngày vào bãi</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtGATEIN_DATE" attrX="GATEIN_DATE" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3" id="containerInfoTab7">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Ghi chú</label>
										<textarea id="txtREMARKS_CNTR" attrX="REMARKS_CNTR" attrR="" rows="4" cols="122"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0 mb-2">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row" style="font-weight: bolder; border-bottom: 1px solid rgba(0, 0, 0, .1)">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">THÔNG TIN SỬA CHỮA</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<i class="la la-angle-up" style="margin-top: 0.5rem; float: right;" id="repairInfoButton"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" id="repairInfoTab1">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Số lệnh</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtESTIMATENO" attrX="ESTIMATENO" attrR="" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<!--
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2" id="repairInfoTab2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Trạng thái cũ</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="mt-1 radio radio-info">
					                            <input type="radio"  name="ClassID" class="css-checkbox" value="1" />
					                            <span class="input-span"></span>Estimated
					                        </label>	
											<label class="mt-2 ml-4 radio radio-info">
					                            <input type="radio" checked name="ClassID" class="css-checkbox" value="2" />
					                         	<span class="input-span"></span>Approved
					                        </label>
					                        <label class="mt-2 ml-4 radio radio-info">
					                            <input type="radio" name="ClassID" class="css-checkbox" value="2" />
					                         	<span class="input-span"></span>Factory
					                        </label>
					                        <label class="mt-2 ml-4 radio radio-info">
					                            <input type="radio" name="ClassID" class="css-checkbox" value="2" />
					                         	<span class="input-span"></span>Complete
					                        </label>
					                        <label class="mt-2 ml-4 radio radio-info" >
					                            <input type="radio" name="ClassID" class="css-checkbox" value="2" />
					                         	<span class="input-span"></span>Cancel
					                        </label>
					                    </div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="line"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="repairInfoTab3">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
											<div class="row">
												<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX" style="color: red;">Trạng thái mới</label>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<input id="" class="form-control input" style="border-color: #FF5656" placeholder="" type="text">
												</div>
											</div>
										</div>
									</div>
								</div>
							-->
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="repairInfoTab5">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Estimated by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtESTIMATEBY" attrX="ESTIMATEBY" class="form-control input" placeholder="" type="text" autocomplete="off">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Estimated date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtESTIMATEDATE" attrX="ESTIMATEDATE" attrR="" type="text" placeholder="Estimated date" autocomplete="off">
												<span class="input-group-addon bg-white btn text-danger" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="repairInfoTab6">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Approval by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtAPPROVALBY" attrX="APPROVALBY" class="form-control input" placeholder="" type="text" autocomplete="off">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Approval date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtAPPRPVALDATE" attrX="APPRPVALDATE" attrR="" type="text" placeholder="Approval date" autocomplete="off">
												<span class="input-group-addon bg-white btn text-danger" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
								</div>								
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="repairInfoTab7">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Repair by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtREPAIRBY" attrX="REPAIRBY" class="form-control input" placeholder="" type="text" autocomplete="off">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Repair date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtREPAIRDATE" attrX="REPAIRDATE" attrR="" type="text" placeholder="Repair date" autocomplete="off">
												<span class="input-group-addon bg-white btn text-danger" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="repairInfoTab8">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Complete by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtCOMPLETEDBY" attrX="COMPLETEDBY" class="form-control input" placeholder="" type="text" autocomplete="off">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Complete date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtCOMPLETEDDATE" attrX="COMPLETEDDATE" attrR="" type="text" placeholder="Completed date" autocomplete="off">
												<span class="input-group-addon bg-white btn text-danger" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
								</div>			
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2" id="repairInfoTab8">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Cancel by</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtCANCELBY" attrX="CANCELBY" class="form-control input" placeholder="" type="text" autocomplete="off">
										</div>
									</div>
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Cancel date</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtCANCLEDATE" attrX="CANCLEDATE" attrR="" type="text" placeholder="Cancel date" autocomplete="off">
												<span class="input-group-addon bg-white btn text-danger" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
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
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {

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
       			for (i = 1; i <= 7; i++){
					$("#containerInfoTab" + i).hide();
				}
       		}
       		else{
				$(this).addClass('la la-angle-up');
       			for (i = 1; i <= 7; i++){
					$("#containerInfoTab" + i).show();
				}
       		}			
			containerInfoIdx++;
       	});

       	var repairInfoIdx = 1;
       	$('#repairInfoButton').on('click', function(){
       		$(this).removeClass();
       		if (repairInfoIdx % 2 == 1){
				$(this).addClass('la la-angle-down');
       			for (i = 1; i <= 8; i++){
					$("#repairInfoTab" + i).hide();
				}
       		}
       		else{
				$(this).addClass('la la-angle-up');
       			for (i = 1; i <= 8; i++){
					$("#repairInfoTab" + i).show();
				}
       		}			
			repairInfoIdx++;
		});
//-------------------------------------------------

//-------------------PHONG---------------------------
		onoffReadonly();
		function onoffReadonly(){
			$('#inputForm').find('input[attrR], textarea[attrR]').each(function(){
				$(this).prop('readonly', true);
				// $(this).attr('readonly', true);
			});
		}

		$("#txtESTIMATEDATE, #txtAPPRPVALDATE, #txtREPAIRDATE, #txtCOMPLETEDDATE, #txtCANCLEDATE").datetimepicker({
			controlType: 'select',
			oneLine: true,
			// dateFormat: 'dd/mm/yy',
			dateFormat: 'yy-mm-dd',
			timeFormat: 'HH:mm:00',
			timeInput: true,
			onSelect: function () {
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


		var iFirst = 0;
		var iLast = 0;
		var iLoading = 0;
		var iArray = [];
		var iUser = '<?=$this->session->UserID;?>';

		$('#txtCNTRNO').keypress(function(e){
			var keycode = (e.which ? e.which : e.keyCode)
			if(keycode == 13){
				$('#numberNext').val('... / ...');
				iFirst = 0;
				iLast = 0;
				iLoading = 0;
				iArray = [];
				clear_INPUT();
				CNTRNO_KEYPRESS();
			};
		});

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
				url: '<?= site_url(md5('Tool').'/'.md5('tChangeRepairContainerStatus'));?>',
				success: function(dataGet){ 
					if(dataGet){
						console.log(dataGet);
						if (dataGet['iREPAIR']) { 
							toastr['success']('Load dữ liệu thành công!');
							iArray = dataGet['iREPAIR'];
							iFirst = 0;
							iLast = dataGet['iREPAIR'].length - 1;
							iLoading = iLast;
							// console.log((iFirst + 1).toString() +  ' / ' + (iLast + 1).toString());
							$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
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
			// $('#inputForm').attr("rowguid", arrs['ROWGUID']);
		}

		function clear_INPUT(){
			$("#inputForm").find("input, textarea").each(function(){
				if($(this).attr("attrX")!="CNTRNO")
					if($(this).attr('id')!="numberNext")
						$(this).val("");
			});
			// $('#inputForm').attr("rowguid", "");
			// $('#numberNext').val('... / ....');
		}

		$('#backA').on('click', function(){
			if (iLoading == iFirst) return;
			if (iArray[0]) {
				console.log('backA');
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
				console.log('backO');
				$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
				fillData_REPAIR(iArray[iLoading]);
			}
		});

		$('#nextA').on('click', function(){
			if (iLoading == iLast) return;
			if (iArray[iLast]) {
				console.log('nextA');
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
				console.log('nextO');
				$('#numberNext').val( (iLoading + 1).toString() +  ' / ' + (iLast + 1).toString() );
				fillData_REPAIR(iArray[iLoading]);
			}
		});

		$('#save').on('click', function(){ 
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
							saveData();
						}
					},
					cancel: {
						text: 'Hủy bỏ',
						btnClass: 'btn-default',
						keys: ['ESC']
					}
				}
			});
		});

		function saveData(){
			var dataForm = GET_ALL_DATA_INPUT('#inputForm', 'attrX');
			var fData = {
				DATA_FORM: dataForm,
				iAction: 'saveDATA'
			};
			postSave(fData);
		}

		function postSave(formData){
			var saveBtn = $('#save');
			saveBtn.button('loading');
			$('.page-content.fade-in-up').blockUI();
			$.ajax({ 
				url: '<?= site_url(md5('Tool').'/'.md5('tChangeRepairContainerStatus'));?>',
				dataType: 'json',
				data: formData,
				type: 'POST',
				success: function (data) {
					saveBtn.button('reset');
					$('.page-content.fade-in-up').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Cập nhật thành công!");
						return;
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

//---------------------------------------------------		   

	});
</script>