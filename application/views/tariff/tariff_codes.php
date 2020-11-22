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
	.ibox .ibox-body {
		padding: 17px 17px 5px;
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
				<div class="ibox-title">BIỂU CƯỚC</div>
				<div class="button-bar-group">
					<button id="search" class="btn btn-outline-warning btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Nạp dữ liệu"
										 	title="Nạp dữ liệu">
						<span class="btn-icon"><i class="ti-search"></i>Nạp dữ liệu</span>
					</button>
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
							<div class="row ibox mb-0 border-e" style="padding-bottom: 10px">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Nhóm biểu cước</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<select id="txtGROUP_TRF_ID" attrX="GROUP_TRF_ID" data-width="100%" data-style="btn-default btn-sm">
												<option value="" selected>*</option>
												<?php if(isset($cb_GroupTRFID) && count($cb_GroupTRFID) > 0) {$i = 1; ?>
													<?php foreach($cb_GroupTRFID as $item) {  ?>
														<option value="<?=$item['GROUP_TRF_ID'];?>"><?=$item['GROUP_TRF_ID'];?></option>
													<?php $i++; }  ?>
												<?php } ?>
											</select>
											<!-- <input id="txtGROUP_TRF_ID" attrX="GROUP_TRF_ID" class="form-control input" placeholder="" type="text"> -->
										</div>
									</div>
								</div>
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Mã bộ phận cont</label>
										<div class="col-md-12 col-sm-12 col-xs-12"> 
											<select id="txtCOMP_ID" attrX="COMP_ID" data-width="100%" data-style="btn-default btn-sm">
												<option value="" selected>*</option>
												<?php if(isset($cb_Component) && count($cb_Component) > 0) {$i = 1; ?>
													<?php foreach($cb_Component as $item) {  ?>
														<option value="<?=$item['COMP_ID'];?>"><?=$item['COMP_ID'];?></option>
													<?php $i++; }  ?>
												<?php } ?>
											</select>
											<!-- <input id="txtCOMP_ID" attrX="COMP_ID" class="form-control input" placeholder="" type="text"> -->
										</div>
									</div>
								</div>								
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Mã sửa chữa</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<select id="txtREP_ID" attrX="REP_ID" data-width="100%" data-style="btn-default btn-sm">
												<option value="" selected>*</option>
												<?php if(isset($cb_Repair) && count($cb_Repair) > 0) {$i = 1; ?>
													<?php foreach($cb_Repair as $item) {  ?>
														<option value="<?=$item['REP_ID'];?>"><?=$item['REP_ID'];?></option>
													<?php $i++; }  ?>
												<?php } ?>
											</select>
											<!-- <input id="txtREP_ID" attrX="REP_ID" class="form-control input" placeholder="" type="text"> -->
										</div>
									</div>
								</div>
								<!-- <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="display:  none">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Mã vị trí</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtLOC_ID" attrX="LOC_ID" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
									<div class="row">
										<label class="col-md-12 col-sm-12 col-xs-12 col-form-label labelX">Diễn giải</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input id="txtDESCRIPTION" attrX="DESCRIPTION" class="form-control input" placeholder="" type="text">
										</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="row ibox-body">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<table id="contenttable" tableX="<?= $P_Table ?>" class="table table-striped display nowrap pl-1 pr-1" cellspacing="0" style="width: 99.8%">
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
//------------------------------ TAM ------------------------------------------
		var parentMenuList 	= {};
		<?php if(isset($parentMenuList) && count($parentMenuList) >= 0){?>
			parentMenuList = <?=json_encode($parentMenuList);?>;
		<?php } ?>
		for (i = 0; i < parentMenuList.length; i++){
			if (parentMenuList[i]['MenuID'] == 'Tariff'){
				$('#' + parentMenuList[i]['MenuID']).addClass('active');
			}
			else{
				$('#' + parentMenuList[i]['MenuID']).removeClass();
			}
		}
//-----------------------------------------------------------------------------

	//---------------------------------------------- ADD_ROW --------------------------------------------------------
		var sumNumRows = 0;
        $("#apply-add-row").on("click", function(){
			var tblTemp = $('#add-row-modal').attr("cusTable");
			if (typeof(tblTemp) == "undefined" || tblTemp == "") {
				$("#add-row-modal").modal("hide");
				return;
			}


			tblTemp = $(tblTemp);
        	numRows = parseInt($('#rowsNumeric').val()); // Numeric of new rows user added
        	sumNumRows += numRows;
        	if (numRows == 1){
        		tblTemp.newRow();
        		// rowsExist = tblTemp.DataTable().rows().nodes().length;
				// for (i = 0; i < rowsExist; i++){
				// 	cell = tblTemp.find("tbody tr:eq(" + i + ") td:eq(0)");
				// 	tblTemp.DataTable().cell(cell).data(i+1).draw(false);
				// }
			}
			else {
				for (i = 0; i < numRows; i++){ 
					tblTemp.newRow();
				}
				// numRowsExist = tblTemp.DataTable().rows().nodes().length;
				// numRowHasAddNewClass = 0;
				// index = 1;
				// for (i = numRowsExist - 1; i >= 0 ; i--){
				// 	var crRow = tblTemp.find("tbody tr:eq("+i+")");
				// 	if(crRow.hasClass("addnew"))
				// 		numRowHasAddNewClass++;
				// 	else{
				// 		cell = tblTemp.find("tbody tr:eq(" + i + ") td:eq(0)");
			    //     	tblTemp.DataTable().cell(cell).data(sumNumRows + index).draw(false);
			    //     	index++;
				// 	}
				// }
				// tblTemp.newMoreRows(numRows, numRowHasAddNewClass);
			}
       	});

        $("#add-row-modal").bind('keypress', function(e) {
       		if(e.which == 13){
				var tblTemp = $('#add-row-modal').attr("cusTable");
				if (typeof(tblTemp) == "undefined" || tblTemp == "") {
					$("#add-row-modal").modal("hide");
					return;
				}
				tblTemp = $(tblTemp);
	       		numRows = parseInt($('#rowsNumeric').val()); // Numeric of new rows user added
	        	sumNumRows += numRows;
	        	if (numRows == 1){
	        		tblTemp.newRow();
	        		rowsExist = tblTemp.DataTable().rows().nodes().length;
					for (i = 0; i < rowsExist; i++){
						cell = tblTemp.find("tbody tr:eq(" + i + ") td:eq(0)");
						tblTemp.DataTable().cell(cell).data(i+1).draw(false);
					}
				}
				else{
					numRowsExist = tblTemp.DataTable().rows().nodes().length;
					numRowHasAddNewClass = 0;
					index = 1;
					for (i = numRowsExist - 1; i >= 0 ; i--){
						var crRow = tblTemp.find("tbody tr:eq("+i+")");
						if(crRow.hasClass("addnew"))
							numRowHasAddNewClass++;
						else{
							cell = tblTemp.find("tbody tr:eq(" + i + ") td:eq(0)");
				        	tblTemp.DataTable().cell(cell).data(sumNumRows + index).draw(false);
				        	index++;
						}
					}
					tblTemp.newMoreRows(numRows, numRowHasAddNewClass);
				}
				$("#add-row-modal").modal("hide");
			}
		});

		$("#rowsNumeric").keydown(function(event) {
		  	if (event.which == 189) {
		    	event.preventDefault();
		   	}
		});
	//---------------------------------------------------------------------------------------------------------------

//----------------------------- PHONG ----------------------------------------
		var tableMain = $('#contenttable').attr("tableX");
		var tableColumn = <?= $P_Columns ?>;
        var _columns = Load_GridHeader('contenttable', tableColumn);
		var tbl = $('#contenttable');

		var dataTbl = tbl.newDataTable({
			configColumns: tableColumn,
			configTableMain: tableMain,
			scrollY: '55vh',
			// order: [[ _columns.indexOf("STT"), 'asc' ]],
			paging: false,
            keys: true,
            autoFill: {
                focus: 'focus'
			},
            select: true,
            buttons: [],
			rowReorder: false,
		});
		tbl.initComplete({
			ADD: 'ADD',
			DELETE: 'DELETE'
		});
		tbl.editableTableWidget();

		tbl.on("change", "input[type='checkbox']", function(e){
			var inp = $(this);
			if(inp.is(":checked")){
				inp.prop("checked", true);
				inp.attr("checked","true");
				inp.val(1);
			}else{
				inp.prop("checked", false);
				inp.removeAttr("checked");
				inp.val(0);
			}
			if(!$(this).closest("tr").hasClass("addnew"))
				$(this).closest("tr").addClass("editing");
			tbl.DataTable().cell( inp.closest("td") ).data( inp.closest("td").html() ).draw(false);
		});

		$('#search').on('click', function(){ 
			tbl.dataTable().fnClearTable();
			var actBtn = $( this );
			actBtn.button('loading');
			var fData = {
				DATA_FORM: GET_ALL_DATA_INPUT('#inputForm', 'attrX'),
				iAction: 'loadData'
			};
			$.ajax ({ 
				url: "<?=site_url(md5('Tariff') . '/' . md5('ctTariffCodes'));?>",
				dataType: 'json',
                data: fData,
				type: 'POST',
				success: function (data) {
					console.log(data);
					actBtn.button('reset');
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
                	actBtn.button('reset');
                	console.log(err);
                }
			})
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
			var newData = tbl.getAddNewData();
			var editData = tbl.getEditData();
			Array.prototype.push.apply(newData,editData);
			var fData = {
				DATA_DETAILS: newData,
				iAction: 'saveDATA'
			};
			postSave(fData);
		}

		function postSave(formData){
			var saveBtn = $('#save');
			saveBtn.button('loading');
			$('.page-content.fade-in-up').blockUI();
			$.ajax({ 
				url: '<?= site_url(md5('Tariff').'/'.md5('ctTariffCodes'));?>',
				dataType: 'json',
				data: formData,
				type: 'POST',
				success: function (data) {
					saveBtn.button('reset');
					$('.page-content.fade-in-up').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Lưu thành công!");
						tbl.DataTable().rows( '.editing' ).nodes().to$().removeClass("editing");
						tbl.DataTable().rows( '.addnew' ).nodes().to$().removeClass("addnew");
						// if (formData['DATA_FORM'].ESTIMATENO == "") {
						// 	$('#txtESTIMATENO').val(data.iESTIMATENO);
						// }
						// if (data.REPAIR_DETAILS) {
						// 	tbl.dataTable().fnClearTable();
						// 	Load_Data_Grid('contenttable', _columns, data['REPAIR_DETAILS']);
						// }
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

		$('#contenttable_btnDelete').on('click', function () {
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

			var delBtn = $('#delete');
			delBtn.button('loading');
			var formdata = {
				'iAction': 'deleteDATA',
				'DATA_DETAILS': rows
			};
			$.ajax({
				url: "<?=site_url(md5('Tariff') . '/' . md5('ctTariffCodes'));?>",
				dataType: 'json',
				data: formdata,
				type: 'POST',
				success: function (data) {
					delBtn.button('reset');
					$('.ibox.collapsible-box').unblock();
					// console.log(data);
					// return;
					if (data.iStatus == 'Success') {
						toastr["success"]("Xóa thành công!");
						console.log(data.success);
						tbl.DataTable().rows('.selected').remove().draw(false);
						tbl.updateSTT( _columns.indexOf( "STT" ) );
						// if(data.success && data.success.length > 0){ 
						// 	// var afterDelete = false;
						// 	// for (var i = 0; i < data.success.length; i++) { 
						// 	// 	afterDelete = true;
						// 	// 	var indexes = tbl.filterRowIndexes(  tbl.find("tr th").length-1, deletedUnitCode);
        				// 	// 	tbl.DataTable().rows( indexes ).remove().draw( false );
        				// 	// 	toastr["success"]( data.success[i] );
						// 	// }
						// 	// if (afterDelete) {
						// 	// 	tbl.updateSTT( _columns.indexOf( "STT" ) );
						// 	// }
						// }
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

		$('#txtGROUP_TRF_ID').on('change', function(val){
			$('th[col-name="GROUP_TRF_ID"]').attr('default-value', $(this).val());
		});
		$('#txtCOMP_ID').on('change', function(val){
			$('th[col-name="COMP_ID"]').attr('default-value', $(this).val());
		});
		$('#txtREP_ID').on('change', function(val){
			$('th[col-name="REP_ID"]').attr('default-value', $(this).val());
		});

		// $( "input[class='selectpicker']" ).change(function() {
		// 	console.log($(this));
		// 	console.log($(this).val());
		// // Check input( $( this ).val() ) for validity here
		// });

		
		$('#txtREP_ID, #txtCOMP_ID, #txtGROUP_TRF_ID').select2();

//----------------------------------------------------------------------------
	});
</script>