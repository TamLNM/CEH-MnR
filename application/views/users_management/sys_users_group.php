<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link href="<?=base_url('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet" />
<style>
	@media (max-width: 767px) {
		.f-text-right    {
			text-align: right;
		}
	}
	.no-pointer{
		pointer-events: none;
	}
	#contenttable_wrapper .dataTables_scroll #cell-context .dropdown-menu  .dropdown-item .sub-text{
		margin-left: 7px;
		font-size: 12px;
		font-style: italic;
	}
</style>
<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<i class="la la-angle-double-up dock-right"></i>
			<div class="ibox-head">
				<div class="ibox-title">QUẢN LÝ NHÓM NGƯỜI DÙNG</div>
				<div class="button-bar-group mr-3">
					<button id="addrow" class="btn btn-outline-success btn-sm mr-1" 
										title="Thêm dòng mới">
						<span class="btn-icon"><i class="fa fa-plus"></i>Thêm dòng</span>
					</button>

					<button id="save" class="btn btn-outline-primary btn-sm mr-1"
										data-loading-text="<i class='la la-spinner spinner'></i>Lưu dữ liệu"
										title="Lưu dữ liệu">
						<span class="btn-icon"><i class="fa fa-save"></i>Lưu</span>
					</button>

					<button id="delete" class="btn btn-outline-danger btn-sm mr-1" 
										data-loading-text="<i class='la la-spinner spinner'></i>Xóa dòng"
										title="Xóa những dòng đang chọn">
						<span class="btn-icon"><i class="fa fa-trash"></i>Xóa dòng</span>
					</button>
				</div>
			</div>
			<div class="row ibox-footer border-top-0">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<table id="contenttable" class="table table-striped display nowrap" cellspacing="0" style="width: 99.5%">
						<thead>
						<tr>
							<th class="editor-cancel" col-name="STT">STT</th>
							<th col-name="rowguid">rowguid</th>
							<th col-name="YardID">YardID</th>
							<th col-name="GroupUserID">Mã nhóm</th>
							<th col-name="GroupName">Tên nhóm</th>
						</tr>
						</thead>
						<tbody>
							<?php if(count($sysGroupUsersList) > 0) {
								  		$i = 1; ?>
								<?php foreach($sysGroupUsersList as $item){  ?>									
									<tr>
										<td col-name="STT"><?=$i;?></td>
										<td col-name="rowguid"><?=$item['rowguid'];?></td>
										<td col-name="YardID"><?=$item['YardID'];?></td>
										<td col-name="GroupUserID"><?=$item['GroupUserID'];?></td>
										<td col-name="GroupUserName"><?=$item['GroupUserName'];?></td>				
									</tr>
									<?php $i++; }  ?>
							<?php } ?>			
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
						<input id="rowsNumeric" class="col-md-6 col-sm-6 col-xs-6 form-control form-control-sm border-e" placeholder="Số dòng" type="number" value="1" min="1">
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
		var _columns 		= ["STT", "rowguid", "YardID", "GroupUserID", "GroupUserName"],
			tbl 	 		= $("#contenttable"),
			parentMenuList 	= {},
			sysGroupUsersList 	= {};

		<?php if(isset($sysGroupUsersList) && count($sysGroupUsersList) >= 0){?>
			sysGroupUsersList = <?=json_encode($sysGroupUsersList);?>;
		<?php } ?>

		<?php if(isset($parentMenuList) && count($parentMenuList) >= 0){?>
			parentMenuList = <?=json_encode($parentMenuList);?>;
		<?php } ?>

		for (i = 0; i < parentMenuList.length; i++){
			if (parentMenuList[i]['MenuID'] == 'Users_Management'){
				$('#' + parentMenuList[i]['MenuID']).addClass('active');
			}
			else{
				$('#' + parentMenuList[i]['MenuID']).removeClass();
			}
		}
		
		var dataTbl = tbl.newDataTable({
			scrollY: '28vw',
			columnDefs: [
				{ type: "num", className: "text-center", targets: _columns.indexOf('STT') },
				{ className: "text-center", targets: _columns.getIndexs(['GroupUserID', 'GroupUserName'])},
				{ className: "hiden-input", targets: _columns.getIndexs(['rowguid', 'YardID'])},
			],
			order: [[ _columns.indexOf('STT'), 'asc' ]],
			paging: false,
            keys:true,
            autoFill: {
                focus: 'focus'
            },
            select: true,
            rowReorder: false,
            arrayColumns: _columns,
		});
		tbl.editableTableWidget();

		/* Add new row event */
		var numCount = 0;
		
		$('#addrow').on('click', function(){
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

       	/* Save button event */
		$('#save').on('click', function(){
            if(tbl.DataTable().rows( '.addnew, .editing' ).data().toArray().length == 0){
            	$('.toast').remove();
            	toastr["info"]("Không có dữ liệu thay đổi!");
            }else{

            	var newData = tbl.getAddNewData();

				for (i = 0; i < newData.length; i++){
					if (!newData[i]['GroupUserID']){
						toastr['error']("Vui lòng nhập Mã nhóm!");
						return;
					}
					else{
						for (j = 0; j < sysGroupUsersList.length; j++){
							if (newData[i]['GroupID'] == sysGroupUsersList[j]['GroupID']){
								toastr['error']("Đã tồn tại Mã nhóm: " + newData[i]['GroupID']);
								return;
							}
						}	
					}		

					if (!newData[i]['GroupUserName']){
						toastr['error']("Vui lòng nhập Tên cho Mã nhóm: " + newData[i]['GroupID'] + "!");
						return;
					}
				}

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


        /* Save functions */
        function saveData(){        	
			var newData = tbl.getAddNewData();

			if(newData.length > 0){
				for (i = 0; i < newData.length; i++){
					delete newData[i].rowguid;
				}

				var fnew = {
					'action': 'add',
					'data': newData
				};
				postSave(fnew);
			}

			var editData = tbl.getEditData();
			if(editData.length > 0){
				var fedit = {
					'action': 'edit',
					'data': editData
				};
				postSave(fedit);
			}
		}

		function postSave(formData){
			var saveBtn = $('#save');
			saveBtn.button('loading');
        	$('.ibox.collapsible-box').blockUI();

			$.ajax({
                url: "<?=site_url(md5('Users_Management') . '/' . md5('umSysUsersGroup'));?>",
                dataType: 'json',
                data: formData,
                type: 'POST',
                success: function (data) {
                    if(data.deny) {
                        toastr["error"](data.deny);
                        return;
                    }

                    if(formData.action == 'edit'){
                    	toastr["success"]("Cập nhật thành công!");
                    	tbl.DataTable().rows( '.editing' ).nodes().to$().removeClass("editing");
                    }

                    if(formData.action == 'add'){
                    	toastr["success"]("Thêm mới thành công!");
                    	tbl.DataTable().rows( '.addnew' ).nodes().to$().removeClass("addnew");
                    	tbl.updateSTT(_columns.indexOf("STT"));
                    }

                    saveBtn.button('reset');
        			$('.ibox.collapsible-box').unblock();
        			location.reload();
                },
                error: function(err){
                	toastr["error"]("Error!");
                	saveBtn.button('reset');
                	$('.ibox.collapsible-box').unblock(); 
                	console.log(err);
                }
            });
		}

		/* Delete rows */
		$('#delete').on('click', function(){
			if(tbl.getSelectedRows().length == 0){
            	$('.toast').remove();
            	toastr["info"]("Vui lòng chọn các dòng dữ liệu để xóa!");
            }
            else{
            	tbl.confirmDelete(function(data){
            		postDel(data);
            	});
            }
		});

		function postDel(data){
			var delData = data.map(p=>p[_columns.indexOf("rowguid")]);

			var fdel = {
					'action': 'delete',
					'data': delData
				};

			$.ajax({
                url: "<?=site_url(md5('Users_Management') . '/' . md5('umSysUsersGroup'));?>",
                dataType: 'json',
                data: fdel,
                type: 'POST',
                success: function (data) {
                    if(data.deny) {
                        toastr["error"](data.deny);
                        return;
                    }

                    tbl.DataTable().rows('.selected').remove().draw(false); // Delete row in table
                	tbl.updateSTT(_columns.indexOf("STT"));
               		toastr["success"]("Xóa dữ liệu thành công!");
               		location.reload();
                },
                error: function(err){
                	toastr["error"]("Error!");
                	console.log(err);
                }
            });
		}
	});
</script>
<script src="<?=base_url('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js');?>"></script>
