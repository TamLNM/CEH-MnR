<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="<?=base_url('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet" />
<style>
	.labelContent{
		width: 6vw;
		margin-top: 0.4rem;
	}
	.inputContent{
		border-radius: 6px; 
		margin-left: 1rem; 
		padding-left: 7px; 
		border-color: rgba(0, 0, 0, .1); 
		border-width: 1px; 
		height: 2rem; 
		width: 10vw;
		font-size: 0.95rem;
	}
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
	.select2-selection__arrow {
		top: 13px!important;
	}
	.select2-selection__rendered {
		padding: 0rem 0.7rem!important;
	}
</style>
<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<div class="ibox-head">
				<div class="ibox-title">DANH SÁCH CONTAINER GIÁM ĐỊNH</div>
				<div class="button-bar-group">
					<button id="search" class="btn btn-outline-warning btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Nạp dữ liệu"
										 	title="Nạp dữ liệu">
						<span class="btn-icon"><i class="ti-search"></i>Nạp dữ liệu</span>
					</button>
				</div>
			</div>
			<form class="ibox-body mt-0 pt-0 pb-0 bg-f9 border-e" id="inputForm">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Truy vấn</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtFormDate" attrX="FormDate" attrR="" type="text" placeholder="Từ ngày" readonly>
												<span class="input-group-addon bg-white btn text-danger" title="Bỏ chọn ngày" style="padding: 0 .5rem"><i class="fa fa-times"></i></span>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<div class="input-group">
												<input class="form-control form-control-sm" id="txtToDate" attrX="ToDate" attrR="" type="text" placeholder="Đến ngày" readonly>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 mb-2">
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2">
											<div class="mt-4">
												<label class="mt-1 radio radio-info">
					                                <input type="radio"  name="iCMStatus" class="css-checkbox" value="*" />
					                                <span class="input-span"></span>Tất cả
					                            </label>	
												<label class="mt-2 ml-3 radio radio-info">
					                                <input type="radio" checked name="iCMStatus" class="css-checkbox" value="S" />
					                             	<span class="input-span"></span>Trên bãi
					                            </label>
					                            <label class="mt-2 ml-3 radio radio-info">
					                                <input type="radio" name="iCMStatus" class="css-checkbox" value="D" />
					                             	<span class="input-span"></span>Đã rời
					                            </label>
					                        </div>
					                    </div>
					                </div>
								</div>

								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2">
									<div class="row">
											<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Container</label>
											<div class="col-md-12 col-sm-12 col-xs-12">
												<input id="txtCNTRNO" attrX="CNTRNO" class="form-control input" placeholder="Số cont" type="text">
											</div>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											<div class="row">
												<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Hãng khai thác</label>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<select id="txtOPR" attrX="OPR" data-width="100%" data-style="btn-default btn-sm">
														<option value="*" selected>*</option>
														<?php if(isset($cb_OprID) && count($cb_OprID) > 0) {$i = 1; ?>
															<?php foreach($cb_OprID as $item) {  ?>
																<option value="<?=$item['CusID'];?>"><?=$item['CusID'];?></option>
															<?php $i++; }  ?>
														<?php } ?>
													</select>
													<!-- <input id="txtOPR" attrX="OPR" class="form-control input" placeholder="" type="text"> -->
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Kích cỡ</label>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<select id="txtSZTP" attrX="SZTP" data-width="100%" data-style="btn-default btn-sm">
														<option value="*" selected>*</option>
														<option value="2">20</option>
														<option value="4">40</option>
														<option value="5">45</option>
													</select>
													<!-- <input id="txtSZTP" attrX="SZTP" attrY="ISO_SZTP" class="form-control input" placeholder="Size" type="text"> -->
												</div>
											</div>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
											<div class="row">
												<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Tình trạng</label>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<select id="txtCONTCONDITION" attrX="CONTCONDITION" data-width="100%" data-style="btn-default btn-sm">
														<option value="*" selected>*</option>
														<option value="C">Grade C</option>
														<option value="D">Grade D</option>
														<option value="U">Grade U</option>
													</select>
													<!-- <input id="txtCONTCONDITION" attrX="CONTCONDITION" class="form-control input" placeholder="" type="text"> -->
												</div>
											</div>
										</div>
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											<div class="row">
												<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Số lệnh</label>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<input id="txtESTIMATENO" attrX="ESTIMATENO" class="form-control input" placeholder="Số lệnh" type="text">
												</div>
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
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

<!-- Add more row modal --> 
<div class="modal fade" id="add-row-modal" tabindex="-1" role="dialog" aria-labelledby="groups-modalLabel-1" aria-hidden="true" data-whatever="id" style="padding-left: 14%; top: 200px">
	<div class="modal-dialog" role="document" style="width: 300px!important">
		<div class="modal-content" style="border-radius: 4px">
			<div class="modal-body">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row form-group">
						<label class="col-md-4 col-sm-4 col-xs-4 col-form-label" style="text-align: right; margin-right: 5px">Số dòng</label>
						<input id="rowsNumeric" class="col-md-6 col-sm-6 col-xs-6 form-control form-control-sm border-e" placeholder="Số dòng" type="number" value="1" min="0">
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

<script type="text/javascript">
	$(document).ready(function () {
		var tableMain = $('#contenttable').attr("tableX");
        var tableColumn = <?= $P_Columns ?>;
        var _columns = Load_GridHeader('contenttable', tableColumn);
		var tbl = $('#contenttable');
		var iUser = '<?=$this->session->UserID;?>';
		var xxx = '<?= site_url();?>/';
		console.log(xxx);

		var	parentMenuList 	= {};
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

		$('#tbl').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});
		
//-------------------PHONG---------------------------

		$("#txtFormDate, #txtToDate").datetimepicker({
			controlType: 'select',
			oneLine: true,
			// dateFormat: 'dd/mm/yy',
			dateFormat: 'yy-mm-dd',
			timeFormat: 'HH:mm:00',
			timeInput: true,
			// autoclose: true,
			onSelect: function () {
				/* Do nothing */
			}	
		});
		$('#txtFormDate').val(moment().subtract(7, 'day').format('YYYY-MM-DD HH:mm:ss'));
		$('#txtToDate').val(moment().format('YYYY-MM-DD HH:mm:ss'));
		

		$('#search').on('click', function(){
			tbl.dataTable().fnClearTable();
			var dataForm = GET_ALL_DATA_INPUT('#inputForm', 'attrX');
			dataForm['CMStatus'] = $('input[name="iCMStatus"]:checked').val();
			if (dataForm.FormDate && dataForm.ToDate) {
				var saveBtn = $('#search');
				saveBtn.button('loading');
				$('.page-content.fade-in-up').blockUI();
				var fData = {
					DATA_FORM: dataForm,
					iAction: 'loadData'
				};
				$.ajax({ 
					url: '<?= site_url(md5('ExpertiseAndRepair').'/'.md5('erExpertiseContainerList'));?>',
					dataType: 'json',
					data: fData,
					type: 'POST',
					success: function (data) {
						saveBtn.button('reset');
						$('.page-content.fade-in-up').unblock();
						if(data.deny) {
							toastr["error"](data.deny);
							return;
						};
						if (data && data.length > 0) {
							toastr["success"]("Nạp dữ liệu thành công!");
							Load_Data_Grid('contenttable', _columns, data);
						}
						else {
							toastr["success"]("Không có dữ liệu!");
							return;
						}
					},
					error: function(err){
						toastr["error"]("Error!");
						saveBtn.button('reset');
						$('.page-content.fade-in-up').unblock();
						console.log(err);
					}
				});
			}
		});

		$(document).on('dblclick', '#contenttable > tbody tr', function(){
			var dtC = tbl.DataTable(); 
			var iCntrNo = dtC.cell($(this), _columns.indexOf('CNTRNO')).data(),
				iEstimateNo = dtC.cell($(this), _columns.indexOf('ESTIMATENO')).data(),
				iRowguid = dtC.cell($(this), _columns.indexOf('MASTER_ROWGUID')).data();
			var DATA_FORM = {
				'CNTRNO': iCntrNo,
				'ESTIMATENO': iEstimateNo,
				'MASTER_ROWGUID': iRowguid,
				iAction: 'xxxx'
			};
			// console.log(DATA_FORM);
			// window.open("<?= site_url();?>/<?= md5('ExpertiseAndRepair')."/".md5('erQuoteAndRepair') ?>");
			XYZT(DATA_FORM);
		});

		function XYZT(DATA_FORM){
			var mapForm = document.createElement("form");
				mapForm.target = "Map";
				mapForm.method = "POST"; // or "post" if appropriate
				mapForm.action = "<?= site_url();?>/<?= md5('ExpertiseAndRepair')."/".md5('erQuoteAndRepair') ?>";

				var mapInput = document.createElement("input");
				mapInput.type = "text";
				mapInput.name = "DT";
				mapInput.value = JSON.stringify(DATA_FORM);
				mapForm.appendChild(mapInput);

				document.body.appendChild(mapForm);

				map = window.open("", "Map");

			if (map) {
				mapForm.submit();
			} else {
				alert('You must allow popups for this map to work.');
			}
		}
		
		$('#txtOPR, #txtSZTP, #txtCONTCONDITION').select2();
//---------------------------------------------------
	});
</script>