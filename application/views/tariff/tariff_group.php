<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="<?=base_url('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet" />
<style>
	#contenttable1_wrapper .dataTables_filter .form-control{
		width: 15vw;	
	}
	#contenttable2_wrapper .dataTables_filter .form-control{
		width: 4.5vw;	
	}
	.btn-group-xs>.btn, .btn-xs {
    	padding: 5px 3px;
    }
</style>
<input id = 'editor-input2' style="display: none" ></input>
<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<div class="ibox-head">
				<div class="ibox-title">NHÓM BIỂU CƯỚC</div>
				<div class="button-bar-group">
					<button id="save" class="btn btn-outline-primary btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Lưu dữ liệu" 
										title="Lưu dữ liệu">
						<span class="btn-icon"><i class="fa fa-save"></i>Lưu</span>
					</button>

				</div>
			</div>
			<div class="row ibox-body">
				<div class="col-md-8 col-sm-8 col-xs-8 table-responsive">
					<table id="contenttable" tableX="<?= $P_Table ?>" class="table table-striped display nowrap pl-1 pr-1" cellspacing="0" style="width: 99.8%">
						<thead>
							<tr>
								
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>					
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 table-responsive">
					<table id="contenttable2" tableX="<?= $P_Table ?>" class="table table-striped display nowrap pl-1 pr-1" cellspacing="0" style="width: 99.8%">
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
		var tableMain = $('#contenttable').attr("tableX");
		var tableColumn = <?= $P_Columns ?>;
		var tableColumn_2 = <?= $P_Columns_2 ?>;
        var _columns = Load_GridHeader('contenttable', tableColumn);
		var tbl = $('#contenttable');
		
		var _columns2 = Load_GridHeader('contenttable2', tableColumn_2);
		var tbl2 = $('#contenttable2');
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
        		rowsExist = tblTemp.DataTable().rows().nodes().length;
				for (i = 0; i < rowsExist; i++){
					cell = tblTemp.find("tbody tr:eq(" + i + ") td:eq(0)");
					tblTemp.DataTable().cell(cell).data(i+1).draw(false);
				}
			}
			else {
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
            select: {
            	style: 'single',
            	info: false,
            },
            buttons: [],
			rowReorder: false,
		});
		tbl.initComplete({
			REFRESH: 'REFRESH',
			ADD: 'ADD',
			DELETE: 'DELETE'
		});
		tbl.editableTableWidget();
		$('#tbl').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});

		var dataTbl2 = tbl2.newDataTable({
			configColumns: tableColumn_2,
			configTableMain: tableMain,
			scrollY: '55vh',
			// order: [[ _columns2.indexOf("STT"), 'asc' ]],
			paging: false,
            keys: true,
			select: true,
			buttons: [],
            rowReorder: false
		});
		tbl2.initComplete({
			ADD: 'ADD',
			DELETE: 'DELETE'
		});
		tbl2.editableTableWidget({editor : $('#editor-input2')});
		$('#tbl2').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});

		$('#contenttable_btnSearch').on('click', function(){ 
			tbl.dataTable().fnClearTable();
			tbl2.dataTable().fnClearTable();
			var actBtn = $( this );
			actBtn.button('loading');
			var fData = {
				iAction: 'loadData'
			};
			$.ajax ({ 
				url: "<?=site_url(md5('Tariff') . '/' . md5('ctTariffGroup'));?>",
				dataType: 'json',
                data: fData,
				type: 'POST',
				success: function (data) {
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

		// var curGroupID = "";
		// var curLabor = 0;
		var curRowIdx = -1;
		$(document).on('click','#contenttable tbody tr', function() {
			if ($(this).hasClass('x-row-selected')) return;
			$('.x-row-selected').removeClass('x-row-selected');
			$(this).addClass('x-row-selected');
			tbl2.dataTable().fnClearTable();
			LoadDataDetails();
		});

		function LoadDataDetails(){
			var fData = {
				DATA_MAIN: tbl.getRowFocusData(),
				iAction: 'loadDetails'
			};
			$.ajax ({ 
				url: "<?=site_url(md5('Tariff') . '/' . md5('ctTariffGroup'));?>",
				dataType: 'json',
                data: fData,
				type: 'POST',
				success: function (data) {
					if(data.deny) {
						toastr["error"](data.deny);
						return;
					};
					if (data && data.length > 0) {
						toastr["success"]("Nạp dữ liệu thành công!");
						Load_Data_Grid('contenttable2', _columns2, data);
					}
					else {
						toastr["success"]("Không có dữ liệu!");
						return;
					}
				},
                error: function(err){
                	toastr["error"]("Error!");
                	console.log(err);
                }
			})
		}

		$('#save').on('click', function(){
			var mainData = tbl.getRowFocusData();
			if(tbl2.DataTable().rows( '.addnew, .editing' ).data().toArray().length == 0) {
            	$('.toast').remove();
            	toastr["info"]("Không có dữ liệu thay đổi!");
			}
			else {
				if (mainData && mainData.length > 0) {
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
									saveData(mainData);
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
				else {
					toastr["success"]("Không có dữ liệu!");
				}
			}
		});

		function saveData(mainData){
			var newData = tbl2.getAddNewData();
			var editData = tbl2.getEditData();
			Array.prototype.push.apply(newData,editData);
			var fData = {
				DATA_MAIN: mainData,
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
				url: '<?= site_url(md5('Tariff').'/'.md5('ctTariffGroup'));?>',
				dataType: 'json',
				data: formData,
				type: 'POST',
				success: function (data) {
					saveBtn.button('reset');
					$('.page-content.fade-in-up').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Lưu thành công!");
						// tbl.DataTable().rows( '.editing' ).nodes().to$().removeClass("editing");
						// tbl.DataTable().rows( '.addnew' ).nodes().to$().removeClass("addnew");
						tbl2.DataTable().rows( '.editing' ).nodes().to$().removeClass("editing");
						tbl2.DataTable().rows( '.addnew' ).nodes().to$().removeClass("addnew");

						if (data.cantInsert && data.cantInsert.length >0) {
							for (var i = 0; i < data.cantInsert.length; i++) { 
								// var indexes = tbl2.filterRowIndexes(  tbl2.find("tr th").length-1, deletedUnitCode);
        						// tbl.DataTable().rows( indexes ).remove().draw( false );
        						toastr["error"]( data.cantInsert[i] );
							}
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

		$('#contenttable_btnDelete').on('click', function () {
			var mainData = tbl.getRowFocusData();
			if (mainData && mainData.length > 0) { 
				postDel(mainData);
			}
			else {
				toastr["success"]("Vui lòng chọn dòng để xóa!");
			}
		});
		function postDel(rows) {
			$('.ibox.collapsible-box').blockUI();

			var delBtn = $('#contenttable_btnDelete');
			delBtn.button('loading');
			var formdata = {
				'iAction': 'deleteDATA_MAIN',
				'DATA_MAIN': rows
			};
			$.ajax({
				url: "<?=site_url(md5('Tariff') . '/' . md5('ctTariffGroup'));?>",
				dataType: 'json',
				data: formdata,
				type: 'POST',
				success: function (data) {
					delBtn.button('reset');
					$('.ibox.collapsible-box').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Xóa thành công!");
						tbl2.dataTable().fnClearTable();
						tbl.DataTable().rows('.x-row-selected').remove().draw(false);
						// tbl.updateSTT( _columns.indexOf( "STT" ) );
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

		$('#contenttable2_btnDelete').on('click', function () {
			var mainData = tbl.getRowFocusData();
			if (mainData && mainData.length > 0) { 
				if(tbl2.getSelectedRows().length == 0) {
					$('.toast').remove();
					toastr["info"]("Vui lòng chọn các dòng dữ liệu để xóa!");
				}
				else {
					tbl2.confirmDelete_News( function(selectedData){
						postDel_2(mainData, selectedData);
					});
				}
			}
			else {
				toastr["success"]("Vui lòng chọn dòng để xóa!");
			}
		});

		function postDel_2(mainData, selectedData) {
			$('.ibox.collapsible-box').blockUI();

			var delBtn = $('#contenttable2_btnDelete');
			delBtn.button('loading');
			var formdata = {
				'iAction': 'deleteDATA_DETAILS',
				'DATA_MAIN': mainData,
				'DATA_DETAILS': selectedData
			};
			
			$.ajax({
				url: "<?=site_url(md5('Tariff') . '/' . md5('ctTariffGroup'));?>",
				dataType: 'json',
				data: formdata,
				type: 'POST',
				success: function (data) {
					delBtn.button('reset');
					$('.ibox.collapsible-box').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Xóa thành công!");
						tbl2.DataTable().rows('.selected').remove().draw(false);
						tbl2.updateSTT( _columns.indexOf( "STT" ) );
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

//----------------------------------------------------------------------------		
	});
</script>