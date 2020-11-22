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
	.cntnNo{
		border-radius: 6px; 
		margin-left: 1rem; 
		padding-left: 7px; 
		border-color: rgba(0, 0, 0, .1); 
		border-width: 1px; 
		height: 2rem; 
		width: 29.5vw;
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
	th{
		font-size: 0.95rem;
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
				<div class="ibox-title">XÁC NHẬN APPROVAL</div>
				<div class="button-bar-group">
   					<button id="search" class="btn btn-outline-warning btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Nạp dữ liệu"
										 	title="Nạp dữ liệu">
						<span class="btn-icon"><i class="ti-search"></i>Nạp dữ liệu</span>
					</button>
					<!--<button id="addrow" class="btn btn-outline-success btn-sm mr-1" title="Thêm dòng mới">
						<span class="btn-icon"><i class="fa fa-plus"></i>Thêm dòng</span>
					</button>-->
					<button id="save" class="btn btn-outline-primary btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Lưu dữ liệu" 
										title="Lưu dữ liệu">
						<span class="btn-icon"><i class="fa fa-save"></i>Lưu</span>
					</button>
				</div>
			</div>
			<form class="ibox-body mt-0 pt-0 pb-0 bg-f9 border-e" id="inputForm">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Truy vấn</label>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtFormDate" class="input" attrX="FormDate" placeholder="Từ ngày" type="text" readonly>
											<input id="txtToDate" class="input" attrX="ToDate" placeholder="Đến ngày" type="text" readonly>
										</div>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
									<div class="row">
										<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											<div class="row">
												<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Container</label>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<input id="txtCNTRNO" attrX="CNTRNO" class="form-control input" placeholder="Số cont" type="text">
												</div>
											</div>
										</div>
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
												<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Tình trạng	</label>
												<div class="col-md-12 col-sm-12 col-xs-12">
													<select id="txtCONTCONDITION" attrX="CONTCONDITION" data-width="100%" data-style="btn-default btn-sm">
														<option value="*" selected>*</option>
														<option value="A">Grade A</option>
														<option value="B">Grade B</option>
														<option value="C">Grade C</option>
														<option value="D">Grade D</option>
														<option value="U">Grade U</option>
													</select>
													<!-- <input id="txtCONTCONDITION" attrX="CONTCONDITION" class="form-control input" placeholder="" type="text"> -->
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
					<div id="tablecontent" class="mt-1">
						<table id="contenttable"  tableX="<?= $P_Table ?>" class="table table-striped display nowrap" cellspacing="0" style="width: 99.8%">
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

<script type="text/javascript">
	$(document).ready(function () {
		var tableMain = $('#contenttable').attr("tableX");
        var tableColumn = <?= $P_Columns ?>;
        var _columns = Load_GridHeader('contenttable', tableColumn);
		var tbl = $('#contenttable');
		var iUser = '<?=$this->session->UserID;?>';
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
		tbl.initComplete({
			ADD: 'ADD',
		});
		tbl.editableTableWidget();

		$('#tbl').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});

		$("#txtFormDate, #txtToDate").datetimepicker({
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
		$('#txtFormDate').val(moment().subtract(7, 'day').format('YYYY-MM-DD HH:mm:ss'));
		$('#txtToDate').val(moment().format('YYYY-MM-DD HH:mm:ss'));
		
		$('#search').on('click', function(){
			tbl.dataTable().fnClearTable();
			var dataForm = GET_ALL_DATA_INPUT('#inputForm', 'attrX');
			if (dataForm.FormDate && dataForm.ToDate) {
				var saveBtn = $('#search');
				saveBtn.button('loading');
				$('.page-content.fade-in-up').blockUI();
				var fData = {
					DATA_FORM: dataForm,
					iAction: 'loadData'
				};
				$.ajax({ 
					url: '<?= site_url(md5('ExpertiseAndRepair').'/'.md5('erApprovalConfirm'));?>',
					dataType: 'json',
					data: fData,
					type: 'POST',
					success: function (data) {
						console.log(data);
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

		$('#save').on('click', function(){
			if(tbl.DataTable().rows( '.addnew, .editing' ).data().toArray().length == 0) {
            	$('.toast').remove();
            	toastr["info"]("Không có dữ liệu thay đổi!");
			}
			else {
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
			}
		});
		function saveData(){
			var editData = tbl.getEditData();

			var fData = {
				DATA_DETAILS: editData,
				iAction: 'saveDATA'
			};
			postSave(fData);
		}
		function postSave(formData){
			var saveBtn = $('#save');
			saveBtn.button('loading');
			$('.page-content.fade-in-up').blockUI();
			$.ajax({ 
				url: '<?= site_url(md5('ExpertiseAndRepair').'/'.md5('erApprovalConfirm'));?>',
				dataType: 'json',
				data: formData,
				type: 'POST',
				success: function (data) {
					saveBtn.button('reset');
					$('.page-content.fade-in-up').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Cập nhật thành công!");
						tbl.DataTable().rows( '.editing' ).nodes().to$().removeClass("editing");
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
//-------------------------------------------------

		// $('#editor-input').on('change', function(e){
		// 	console.log("editor");
		// 	var colIdx = tbl.find('td.focus').index();
		// 	switch (colIdx) { 
		// 		case _columns.indexOf("CNTRNO"):
		// 			// console.log('editor');
		// 			break;
		// 		default: break;
		// 	};
		// });

		// tbl.on('change', 'td', function(e){
		// 	console.log('change td');
		// 	return;
		// 	var colidx = $(this).index();
		// 	switch (colidx) {
		// 		case _columns.indexOf("CNTRNO"):
		// 			console.log('change td');
		// 			// clearTimeout(gridTimeOut);
		// 			// gridTimeOut = setTimeout(function(){ onChangeMain( $( e.target )); tbl.DataTable().draw(false); }, 70);
		// 			// onChangeMain( $( e.target ) );
		// 			// tbl.DataTable().draw(false);
		// 			break;
		// 		default: break;
		// 	}
		// });

		// tbl.bind("paste", 'td', function(e, f){
		// 	console.log(e);
		// 	console.log($(this));
		// 	// return;
		// 	// var colidx = $(this).index();
		// 	// console.log(colidx);
		// 	// console.log('paste td');
		// 	var pastedData = e.originalEvent.clipboardData.getData('text');
		// 	console.log(pastedData);
		// } );
		$('#txtOPR, #txtSZTP, #txtCONTCONDITION').select2();
	});
</script>