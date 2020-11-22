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
				<div class="ibox-title">PHÂN QUYỀN</div>
				<div class="button-bar-group mr-3">
					<button id="save" class="btn btn-outline-primary btn-sm mr-1"
										data-loading-text="<i class='la la-spinner spinner'></i>Lưu dữ liệu"
										title="Lưu dữ liệu">
						<span class="btn-icon"><i class="fa fa-save"></i>Lưu</span>
					</button>
				</div>
			</div>
			<div class="ibox-body pt-0 pb-0 bg-f9 border-e">
				<div class="row ibox mb-0 border-e pb-1 pt-3">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
								<div class="row form-group">
									<label class="col-md-2 col-sm-2 col-xs-2 col-form-label">Nhóm</label>
									<div class="col-md-8 col-sm-8 col-xs-8 input-group input-group-sm">
										<select id="GroupUserID" class="selectpicker" data-width="100%" data-style="btn-default btn-sm" title="--  Chọn nhóm người dùng --">
											<?php if(count($sysGroupUsersList) > 0) { ?>
												<?php foreach($sysGroupUsersList as $item) {?>
														<option value="<?=$item['GroupUserID']?>"><?=$item['GroupUserName'];?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
								<div class="row form-group">
									<label class="col-md-4 col-sm-4 col-xs-4 col-form-label">Người dùng</label>
									<div class="col-md-8 col-sm-8 col-xs-8">
										<select id="UserID" class="selectpicker" data-width="100%" data-style="btn-default btn-sm" title="-- Chọn người dùng --">
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
								<div class="row form-group">
									<label class="col-md-2 col-sm-2 col-xs-2 col-form-label">Mục</label>
									<div class="col-md-8 col-sm-8 col-xs-8">
										<select id="Parent_MenuAct" class="selectpicker" data-width="100%" data-style="btn-default btn-sm" title="-- Chọn mục --">	
											<?php if(count($sysMenuList) > 0) { ?>
												<?php foreach($sysMenuList as $item) {?>
													<?php if (!($item['ParentID'])){ ?>
														<option value="<?=$item['rowguid']?>"><?=$item['MenuName'];?></option>
													<?php }?>
												<?php }?>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row ibox-footer border-top-0">
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<table id="contenttable" class="table table-striped display nowrap" cellspacing="0" style="width: 99.5%">
						<thead>
						<tr>
							<th class="editor-cancel" col-name="STT" style="max-width: 10%">STT</th>
							<th col-name="MenuAct" class="editor-cancel">Chi tiết</th>
							<th col-name="CheckAll" class="editor-cancel data-type-checkbox">Tất cả</th>
							<th col-name="View" class="editor-cancel data-type-checkbox">Xem</th>
							<th col-name="Insert" class="editor-cancel data-type-checkbox">Thêm</th>
							<th col-name="Edit" class="editor-cancel data-type-checkbox">Sửa</th>
							<th col-name="Delete" class="editor-cancel data-type-checkbox">Xóa</th>
							<th col-name="GroupMenuID" class="editor-cancel data-type-checkbox"></th>
							<th col-name="GroupMenuName" class="editor-cancel data-type-checkbox"></th>
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

<script type="text/javascript">
	$(document).ready(function(){
		var tbl 			= $("#contenttable"),
			_columns 		= ["STT", "MenuID", "All", "View", "Insert", "Edit", "Delete", "GroupMenuID", "GroupMenuName"],
			sysPermissionList = {},
			parentMenuList 	= {},
			sysUsersList 	= {},
			menuActList 	= {};


		/* Load data from Job-mode-table */
		<?php if(isset($sysMenuList) && count($sysMenuList) >= 0){?>
			sysMenuList = <?= json_encode($sysMenuList);?>;
		<?php } ?>

		<?php if(isset($sysPermissionList) && count($sysPermissionList) >= 0){?>
			sysPermissionList = <?= json_encode($sysPermissionList);?>;
		<?php } ?>

		<?php if(isset($menuActList) && count($menuActList) >= 0){?>
			menuActList = <?= json_encode($menuActList);?>;
		<?php } ?>

		<?php if(isset($parentMenuList) && count($parentMenuList) >= 0){?>
			parentMenuList = <?=json_encode($parentMenuList);?>;
		<?php } ?>

		<?php if(isset($sysUsersList) && count($sysUsersList) >= 0){?>
			sysUsersList = <?=json_encode($sysUsersList);?>;
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
			scrollY: '50vh',
			columnDefs: [
				{ type: "num", className: "text-center", targets: _columns.indexOf('STT')},		
				{ className: "text-center", targets: _columns.getIndexs(["MenuID", "All", "View", "Insert", "Edit", "Delete" ])},
				{ className: "hiden-input", targets: _columns.getIndexs(["GroupMenuID", "GroupMenuName"])},
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

		tbl.on('change', 'tbody tr td input[type="checkbox"]', function(e){
        	var inp = $(e.target);
        		

        	crCell = inp.closest('td');
        	crRow = inp.closest('tr');

        	var row		= crCell[0]["_DT_CellIndex"].row,
				col 	= _columns.indexOf("MenuID"),
				clickCol = crCell[0]["_DT_CellIndex"].column,
				crCell  = tbl.find("tbody tr:eq(" + (row) + ") td:eq(" + col + ")").first(),
				MenuID  = tbl.DataTable().cell(crCell).data();

			MenuID = MenuID.substring(parseInt(MenuID.indexOf('value="')) + 7, MenuID.length);
			MenuID = MenuID.substring(0, MenuID.indexOf('"'));

        	if(inp.is(":checked")){
        		inp.attr("checked", "");
        		inp.val("1");

        		switch (clickCol){
        			case _columns.indexOf('All'):
		        		$('#ckbAllOf' + MenuID).val(1);
		        		$('#ckbAllOf' + MenuID).prop('checked', 'checked');
		        		$('#ckbViewOf' + MenuID).val(1);
		        		$('#ckbViewOf' + MenuID).prop('checked', 'checked');
		        		$('#ckbInsertOf' + MenuID).val(1);
		        		$('#ckbInsertOf' + MenuID).prop('checked', 'checked');
		        		$('#ckbEditOf' + MenuID).val(1);
		        		$('#ckbEditOf' + MenuID).prop('checked', 'checked');
		        		$('#ckbDeleteOf' + MenuID).val(1);
		        		$('#ckbDeleteOf' + MenuID).prop('checked', 'checked');
        			case _columns.indexOf('Insert'):
						if ($('#ckbViewOf' + MenuID).prop('checked') &&
							$('#ckbEditOf' + MenuID).prop('checked') &&
							$('#ckbDeleteOf' + MenuID).prop('checked'))
						{
		        			$('#ckbAllOf' + MenuID).prop('checked', 'checked');
		        			$('#ckbAllOf' + MenuID).val(1);
						}
        				break;
        			case _columns.indexOf('Edit'):
        				if ($('#ckbViewOf' + MenuID).prop('checked') &&
							$('#ckbInsertOf' + MenuID).prop('checked') &&
							$('#ckbDeleteOf' + MenuID).prop('checked'))
        				{
		        			$('#ckbAllOf' + MenuID).prop('checked', 'checked');
		        			$('#ckbAllOf' + MenuID).val(1);
						}
        				break;
        			case _columns.indexOf('Delete'):
						if ($('#ckbViewOf' + MenuID).prop('checked') &&
							$('#ckbInsertOf' + MenuID).prop('checked') &&
							$('#ckbEditOf' + MenuID).prop('checked'))
						{
		        			$('#ckbAllOf' + MenuID).prop('checked', 'checked');
		        			$('#ckbAllOf' + MenuID).val(1);
						}
        				break;
        			default: 
        				break;
        		}
        	}	 	
        	else{
        		inp.removeAttr("checked");
        		inp.val("0");

        		switch (clickCol){
        			case _columns.indexOf('All'):
						$('#ckbAllOf' + MenuID).val(0);
		        		$('#ckbAllOf' + MenuID).prop('checked', '');
		        		$('#ckbViewOf' + MenuID).val(0);
		        		$('#ckbViewOf' + MenuID).prop('checked', '');
		        		$('#ckbInsertOf' + MenuID).val(0);
		        		$('#ckbInsertOf' + MenuID).prop('checked', '');
		        		$('#ckbEditOf' + MenuID).val(0);
		        		$('#ckbEditOf' + MenuID).prop('checked', '');
		        		$('#ckbDeleteOf' + MenuID).val(0);
		        		$('#ckbDeleteOf' + MenuID).prop('checked', '');
        				break;
        			case _columns.indexOf('View'):
        			case _columns.indexOf('Insert'):
        			case _columns.indexOf('Edit'):
        			case _columns.indexOf('Delete'):
        				$('#ckbAllOf' + MenuID).prop('checked', '');
		        		$('#ckbAllOf' + MenuID).val(0);
        				break;
        		}
			}

        	var eTable = tbl.DataTable();
        	eTable.cell(crCell).data(crCell.html()).draw(false);
        	if(!crRow.hasClass("addnew")){
	        	eTable.row(crRow).nodes().to$().addClass("editing");
        	}
        });

		$('#Parent_MenuAct').empty();
		for (i = 0; i < parentMenuList.length; i++){
			var rData = parentMenuList[i];
			$('#Parent_MenuAct').append("<option value='" + rData['rowguid'] +"'> " + rData['MenuName'] + "</option>");
		}
		$('.selectpicker').selectpicker('refresh');

		$("#GroupUserID, #UserID, #Parent_MenuAct").on('change', function(){
			var GroupUserID	 = $("#GroupUserID").val(),
				currentID    = $(this).attr('id'),
				formData 	 = {
					'action': 'view',
					'child_action': 'load_user_list',
					'ParentID': $("#Parent_MenuAct").val(),
					'GroupUserID': GroupUserID,
				};

			if (currentID == 'Parent_MenuAct'){
				if (!GroupUserID){
					toastr['error']("Vui lòng chọn nhóm cần phân quyền!");
					return;
				}
			}

			$.ajax({
				url: "<?=site_url(md5('Users_Management') . '/' . md5('umSysPermission'));?>",
				dataType: 'json',
				data: formData,
				type: 'POST',
				success: function (data) {
					console.log(data);
					/* Load data for list box: UserID */
		        	if (data.list.length > 0){
						if (currentID == 'GroupUserID'){
							$('#UserID').empty();
			        		for (i = 0; i < data.list.length; i++){
				        		var rData = data.list[i];
				        		$('#UserID').append("<option value='" + rData['UserID'] +"'> " + rData['UserName'] + "</option>");
				        	}
				        	$('.selectpicker').selectpicker('refresh');
			        	}
		        	}

					/* Load table content */
		        	if (data.menuList.length > 0){
		        		var rows = [],
		        			index = 1,
		        			groupMenuID = '',
		        			groupMenuName = '';

		        		for (i = 0; i < data.menuList.length; i++){
							var rData = data.menuList[i], r = [];
							if (rData['ParentID']){
								if ((rData['ParentID'] == $('#Parent_MenuAct').val() || 
									!($('#Parent_MenuAct').val()))){	
									$.each(_columns, function(idx, colname){
										var val = "";
										switch(colname){
											case "STT": 
												val = index++; 
												break;
											case "MenuID":
												val = '<input class="hiden-input" value="'+ rData['MenuID']  +'">' + rData['MenuName'];
												break;
											case "View":
												val = '<label class="checkbox checkbox-success"><input id="ckbViewOf' + rData['MenuID'] + '" type="checkbox" value="0"><span class="input-span"></span></label>';
												break;
											case "Insert":
												val = '<label class="checkbox checkbox-success"><input id="ckbInsertOf' + rData['MenuID'] + '" type="checkbox" value="0"><span class="input-span"></span></label>';
												break;
											case "Edit":
												val = '<label class="checkbox checkbox-success"><input id="ckbEditOf' + rData['MenuID'] + '" type="checkbox" value="0"><span class="input-span"></span></label>';
												break;
											case "Delete":
												val = '<label class="checkbox checkbox-success"><input id="ckbDeleteOf' + rData['MenuID'] + '" type="checkbox" value="0"><span class="input-span"></span></label>';
												break;
											case "All":
												val = '<label class="checkbox checkbox-success"><input id="ckbAllOf' + rData['MenuID'] + '" type="checkbox" value="0"><span class="input-span"></span></label>';
												break;	
											case "GroupMenuID":
												val = groupMenuID;
												break;
											case "GroupMenuName":
												val = groupMenuName;											
												break;
											default:
												break;
												
										}
										r.push(val);
									});
									rows.push(r);
								}
							}
							else{
								if ((rData['rowguid'] == $('#Parent_MenuAct').val() || 
									!($('#Parent_MenuAct').val()))){	
									r.push('<span class="removeCell"></span>');								
									r.push('<input class="hiden-input tittleMenu" value="'+ rData['MenuID']  +'"><b>' + rData['MenuName'] + '</b>');
									r.push('<span class="removeCell"></span>');
									r.push('<span class="removeCell"></span>');
									r.push('<span class="removeCell"></span>');
									r.push('<span class="removeCell"></span>');
									r.push('<span class="removeCell"></span>');
									r.push('<span class="removeCell"></span>');
									r.push('<span class="removeCell"></span>');
									r.push('<span class="removeCell"></span>');
									rows.push(r);

									groupMenuID = rData['MenuID'];
									groupMenuName = rData['MenuName'];
								}
							}
						}
						tbl.dataTable().fnClearTable();
			        	if(rows.length > 0){
							tbl.dataTable().fnAddData(rows);
			        	}

			        	$('.tittleMenu').closest('td').attr('colspan', 9);
  						$('.removeCell').closest('td').remove();
		        	}

		        	/* Load value by table SYS_PERMISSION */
		        	if (data.sysPermissionList.length > 0){
		        		var userData 	= [];
		        		for (i = 0; i < data.sysPermissionList.length; i++){
		        			var rData 		= data.sysPermissionList[i],
		        				count 		= 0;

		        			if (rData['GroupUserID'] == GroupUserID){	        	
			        			if (rData['UserID'] == $('#UserID').val()){
			        				userData.push(rData);
			        			}
			        			else if (!(rData['UserID'])){
									if (rData['IsAddNew'] == 1){
				        				$('#ckbInsertOf' + rData['MenuID']).prop('checked', 'checked');
				        				$('#ckbInsertOf' + rData['MenuID']).val(1);
				        				count++;
				        			}


				        			if (!rData['UserID']){
					        			if (rData['IsDelete'] == 1){
					        				$('#ckbDeleteOf' + rData['MenuID']).prop('checked', 'checked');
					        				$('#ckbDeleteOf' + rData['MenuID']).val(1);
					        				count++;
					        			}

					        			if (rData['IsModify'] == 1){
					        				$('#ckbEditOf' + rData['MenuID']).prop('checked', 'checked');
					        				$('#ckbEditOf' + rData['MenuID']).val(1);
					        				count++;
					        			}

					        			if (rData['IsView'] == 1){
					        				$('#ckbViewOf' + rData['MenuID']).prop('checked', 'checked');
					        				$('#ckbViewOf' + rData['MenuID']).val(1);
					        				count++;
					        			}

					        			if (count == 4){
					        				$('#ckbAllOf' + rData['MenuID']).prop('checked', 'checked');
					        				$('#ckbAllOf' + rData['MenuID']).val(1);
					        			}
			        				}
				        		}
			        		}
		        		}

		        		if ($('#UserID').val()){
			        		if (userData.length > 0){
			        			for (idx = 0; idx < userData.length; idx++){
									var rData  = userData[idx],
										menuID = rData['MenuID'],
										count  = 0;
										
									$('#ckbInsertOf' + menuID).prop('checked', '');
									$('#ckbInsertOf' + menuID).val(0);
									$('#ckbEditOf' 	 + menuID).prop('checked', '');
									$('#ckbEditOf'   + menuID).val(0);
									$('#ckbDeleteOf' + menuID).prop('checked', '');
									$('#ckbDeleteOf' + menuID).val(0);
									$('#ckbViewOf'   + menuID).prop('checked', '');
									$('#ckbViewOf' 	 + menuID).val(0);
									$('#ckbAllOf'    + menuID).prop('checked', '');
									$('#ckbAllOf' 	 + menuID).val(0);

									if (rData['IsAddNew'] == 1){
				        				$('#ckbInsertOf' + menuID).prop('checked', 'checked');
				        				$('#ckbInsertOf' + menuID).val(1);
				        				count++;
				        			}

				        			if (rData['IsDelete'] == 1){
				        				$('#ckbDeleteOf' + menuID).prop('checked', 'checked');
				        				$('#ckbDeleteOf' + menuID).val(1);
				        				count++;
				        			}

				        			if (rData['IsModify'] == 1){
				        				$('#ckbEditOf' + menuID).prop('checked', 'checked');
				        				$('#ckbEditOf' + menuID).val(1);
				        				count++;
				        			}

				        			if (rData['IsView'] == 1){
				        				$('#ckbViewOf' + menuID).prop('checked', 'checked');
				        				$('#ckbViewOf' + menuID).val(1);
				        				count++;
				        			}

				        			if (count == 4){
				        				$('#ckbAllOf' + menuID).prop('checked', 'checked');
				        				$('#ckbAllOf' + menuID).val(1);
				        			}							
								}
							}
		        		}
		        	}                    
				},
				error: function(err){
					toastr['error'](err);
					console.log(err);

				},
			});
		});

		$('#save').on('click', function(){
			if(tbl.DataTable().rows('.editing' ).data().toArray().length == 0){
            	$('.toast').remove();
            	toastr["info"]("Không có dữ liệu thay đổi!");
            }
            else{
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

        function saveData(){        	
        	var tableData = tbl.getEditData();
			if(tableData.length > 0){
				var editData = [];

				for (i = 0; i < tableData.length; i++){
					var objData = {
						'GroupUserID': $('#GroupUserID').val() ?  $('#GroupUserID').val() : '',
						'UserID'	 : $('#UserID').val() ? $('#UserID').val() : '',
						'GroupMenuID': tableData[i]['GroupMenuID'],
						'GroupMenuName': tableData[i]['GroupMenuName'],
						'MenuID'	 : tableData[i]['MenuID'],
						'IsView'	 : $('#ckbViewOf' 	+ tableData[i]['MenuID']).val(),
						'IsAddNew'	 : $('#ckbInsertOf' + tableData[i]['MenuID']).val(),
						'IsModify' 	 : $('#ckbEditOf' 	+ tableData[i]['MenuID']).val(),
						'IsDelete' 	 : $('#ckbDeleteOf' + tableData[i]['MenuID']).val(),
					}
					editData.push(objData);
				}

				var fEdit = {
					'action': 'edit',
					'data': editData,
				};
				postSave(fEdit);
			}
        }

        function postSave(formData){
			var saveBtn = $('#save');
			saveBtn.button('loading');
        	$('.ibox.collapsible-box').blockUI();

			$.ajax({
                url: "<?=site_url(md5('Users_Management') . '/' . md5('umSysPermission'));?>",
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
                    	location.reload();
                    }

                    saveBtn.button('reset');
        			$('.ibox.collapsible-box').unblock();
                },
                error: function(err){
                	toastr["error"]("Error!");
                	saveBtn.button('reset');
                	$('.ibox.collapsible-box').unblock(); 
                	console.log(err);
                }
            });
		}

	});
</script>

<script src="<?=base_url('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js');?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>