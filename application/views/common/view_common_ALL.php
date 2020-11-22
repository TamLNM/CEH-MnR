<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.dataTable tbody tr,.dataTable tbody td{
	height:21px!important;
}
</style>

<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<div class="ibox-head">
				<div class="ibox-title"><?= $P_Title ?></div>
				<div class="button-bar-group">
					<button id="search" class="btn btn-outline-warning btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Nạp dữ liệu"
										 	title="Nạp dữ liệu">
						<span class="btn-icon"><i class="ti-search"></i>Nạp dữ liệu</span>
					</button>
					<!--
					<button id="addrow" class="btn btn-outline-success btn-sm mr-1" title="Thêm dòng mới">
						<span class="btn-icon"><i class="fa fa-plus"></i>Thêm dòng</span>
					</button>
					-->
					<button id="save" class="btn btn-outline-primary btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Lưu dữ liệu" 
										title="Lưu dữ liệu">
						<span class="btn-icon"><i class="fa fa-save"></i>Lưu</span>
					</button>
					<!--
					<button id="delete" class="btn btn-outline-danger btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Xóa dữ liệu" 
										title="Xóa những dòng đang chọn">
						<span class="btn-icon"><i class="fa fa-trash"></i>Xóa dòng</span>
					</button>
				-->
				</div>
			</div>
			<div class="row ibox-body">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive mt-1">
					<div id="tablecontent">
						<table id="contenttable" 
							tableX="<?= $P_Table ?>"
							class="table table-striped display nowrap" 
							cellspacing="0" style="width: 99.8%">
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
			DELETE: 'DELETE'
		});
		tbl.editableTableWidget();

		var parentMenuList 	= {};

		<?php if(isset($parentMenuList) && count($parentMenuList) >= 0){?>
			parentMenuList = <?=json_encode($parentMenuList);?>;
		<?php } ?>

		for (i = 0; i < parentMenuList.length; i++){
			if (parentMenuList[i]['MenuID'] == 'Common'){
				$('#' + parentMenuList[i]['MenuID']).addClass('active');
			}
			else{
				$('#' + parentMenuList[i]['MenuID']).removeClass();
			}
		}

		$('#tbl').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});

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

       	$("#rowsNumeric").keydown(function(event) {
		  	if (event.which == 189) {
		    	event.preventDefault();
		   	}
		});


//-------------------PHONG---------------------------
		$('#contenttable_btnDelete').on('click', function(){ 
			if( tbl.getSelectedRows().length == 0 ){
            	$('.toast').remove();
            	toastr["info"]("Vui lòng chọn các dòng dữ liệu để xóa!");
            }
            else {
				tbl.confirmDelete(function(data){
            		postDel();
            	});

            }
		});

		function postDel(){
			$('.ibox.collapsible-box').blockUI();
			var delBtn = $('#contenttable_btnDelete');
			delBtn.button('loading');

			var delData = data.map(p=>p[_columns.indexOf("")]);

			var formdata = {
				'action': 'delete',
				TableName: tableMain,
				'data': delData,
			};
			$.ajax({
				url: "<?=site_url(md5('Common') . '/' . md5('view_ALL_Delete'));?>",
				dataType: 'json',
				data: formdata,
				type: 'POST',
				success: function (data) {
					delBtn.button('reset');
					$('.ibox.collapsible-box').unblock();
					if (data.iStatus == 'Success') {
						toastr["success"]("Xóa thành công!");
						tbl.DataTable().rows('.selected').remove().draw(false);
					}
					else if (data.iStatus=='Fail') {
						toastr["error"](data.iMess);
						return;
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

		$('#search').on('click', function(){ 
			tbl.dataTable().fnClearTable();
			var actBtn = $( this );
			actBtn.button('loading');
			var fData = {
				TableName: tableMain
			};
			$.ajax ({ 
				url: "<?=site_url(md5('Common') . '/' . md5('view_ALL_Load'));?>",
				dataType: 'json',
                data: fData,
                type: 'POST',
                success: function (data) {  
                	Load_Data_Grid('contenttable', _columns, data);
                    actBtn.button('reset');
        			return;
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
				if(!tbl.validate_required()) return;
            	$.confirm({
		            title: 'Thông báo!',
		            type: 'orange',
		            icon: 'fa fa-warning',
		            content: 'Tất cả các thay đổi sẽ được lưu lại!\nTiếp tục?',
		            buttons: {
		                ok: {
		                    text: 'Xác nhận lưu',
		                    btnClass: 'btn-warning',
		                    keys: ['Enter'],
		                    action: function(){
		                        function_Save();
		                    }
		                },
		                cancel: {
		                    text: 'Hủy bỏ',
		                    btnClass: 'btn-default',
		                    keys: ['ESC']
		                }
		            }
		        });
            };
		});

		function function_Save(){  
			var newData = tbl.getAddNewData();
			if(newData.length > 0){
				var fnew = {
					'action': 'add',
					'P_Table': tableMain,
					'dataTable': newData
				};
				function_postSave(fnew);
			};

			var editData = tbl.getEditData();
			if(editData.length > 0){
				var fedit = {
					'action': 'edit',
					'P_Table': tableMain,
					'dataTable': editData
				};
				function_postSave(fedit);
			};
		}

		function function_postSave(formData) {
			// console.log(formData);
			// return;
			var saveBtn = $('#save');
			saveBtn.button('loading');
        	$('.ibox.collapsible-box').blockUI();
			$.ajax ({
                url: "<?=site_url(md5('Common') . '/' . md5('view_ALL_Save'));?>",
                dataType: 'json',
                data: formData,
                type: 'POST',
                success: function (data) {
                    if(data.iStatus == "Fail") {
                        toastr["error"](data.deny);
                    }
                    else {
                    	if(formData.action == 'edit'){
	                    	toastr["success"]("Cập nhật thành công!");
	                    	tbl.DataTable().rows( '.editing' ).nodes().to$().removeClass("editing");
	                    };

	                    if(formData.action == 'add'){
	                    	toastr["success"]("Thêm mới thành công!");
	                    	tbl.DataTable().rows( '.addnew' ).nodes().to$().removeClass("addnew");
	                    	tbl.updateSTT(_columns.indexOf("STT"));
	                    };
                    };
                    saveBtn.button('reset');
        			$('.ibox.collapsible-box').unblock();
        			return;
                },
                error: function(err){
                	toastr["error"]("Error!");
                	saveBtn.button('reset');
                	$('.ibox.collapsible-box').unblock();
                	console.log(err);
                }
            });
		}

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

//---------------------------------------------------
	});
</script>