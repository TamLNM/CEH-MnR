<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?=base_url('assets/vendors/popper.js/dist/umd/popper.min.js');?>"></script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> -->

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
	.checkboxList{
		font-size: 0.85rem;
		list-style-type: none;
	    height: 8rem;
	    overflow: auto;
	    border-radius: 5px;
		border: 1px solid rgba(0,0,0,.15);
	}
	li{
		margin-top: 0.25rem;
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
				<div class="ibox-title">BÁO CÁO TỒN BÃI</div>
				<div class="button-bar-group">
					<button id="export" class="btn btn-outline-dark btn-sm btn-loading mr-1 mt-1 mb-1" 
                                            data-loading-text="<i class='la la-file'></i>Xuất Excel"
                                            title="Xuất Excel">
                        <span class="btn-icon"><i class="la la-file"></i>Xuất Excel</span>
                    </button> 
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
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mt-2">
									<div class="row mb-3">
										<label class="col-md-3 col-sm-3 col-xs-3 col-form-label" title="Ngày báo cáo">Ngày báo cáo</label>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<input id="txtDateIn" attrX="DateIn" class="form-control input" placeholder="" type="text" readonly>
										</div>
										<label class="col-md-2 col-sm-2 col-xs-2 col-form-label">Trạng thái</label>
										<div class="col-md-3 col-sm-8 col-xs-8">
											<select id="txtREPAIR_STATUS" attrX="REPAIR_STATUS"  data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="E">Estimate</option>
												<option value="A">Approval</option>
												<option value="R">Repair</option>
												<option value="C">Complete</option>
												<option value="X">Cancel</option>
											</select>
										</div>
									</div>
									<div class="row">
										<label class="col-md-3 col-sm-3 col-xs-3 col-form-label" title="Hãng khai thác">Hãng khai thác</label>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<select id="txtOprID" attrX="OprID"  data-width="100%" >
											<!-- class="selectpicker" data-style="btn-default btn-sm"> -->
												<option value="*" selected>*</option>
												<?php if(isset($cb_OprID) && count($cb_OprID) > 0) {$i = 1; ?>
													<?php foreach($cb_OprID as $item) {  ?>
														<option value="<?=$item['CusID'];?>"><?=$item['CusID'];?></option>
													<?php $i++; }  ?>
												<?php } ?>
											</select>
										</div>

										<label class="col-md-2 col-sm-2 col-xs-2 col-form-label">Kích cỡ</label>
										<div class="col-md-3 col-sm-3 col-xs-3">
											<select id="txtISO_SZTP" attrX="ISO_SZTP"  class="selectpicker" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="2">20</option>
												<option value="4">40</option>
												<option value="5">45</option>
											</select>
										</div>
									</div>
									<div class="row mt-3">
										<label class="col-md-3 col-sm-3 col-xs-3 col-form-label">Tình trạng cont</label>
										<div class="col-md-4 col-sm-4 col-xs-4">
											<select id="txtContCondition" attrX="ContCondition"  class="selectpicker" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="A">Grade A</option>
												<option value="B">Grade B</option>
												<option value="C">Grade C</option>
												<option value="D">Grade D</option>
												<option value="U">Grade U</option>
											</select>
										</div>

										<label class="col-md-2 col-sm-2 col-xs-2 col-form-label">Loại</label>
										<div class="col-md-3 col-sm-3 col-xs-3 mb-2">
											<select id="txtType" attrX="Type"  class="selectpicker" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="D">Dry</option>
												<option value="R">Refeer</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 mt-2">
									<div class="row mt-3">
										<!--
										<label class="col-md-4 col-sm-4 col-xs-4 col-form-label">Trạng thái</label>
										<div class="col-md-8 col-sm-8 col-xs-8">
											<select id="txtREPAIR_STATUS" attrX="REPAIR_STATUS"  class="selectpicker" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="E">Estimate</option>
												<option value="A">Approval</option>
												<option value="R">Repair</option>
												<option value="C">Complete</option>
												<option value="X">Cancel</option>
											</select>
										</div>
										-->
									</div>
								</div>
								<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 mt-2">
									<div class="row">
										<label class="col-md-4 col-sm-4 col-xs-4 col-form-label">Trạng thái</label>
                                       	<div class="col-md-8 col-sm-8 col-xs-8">
                                       		<ul class="checkboxList">
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" attrX="Estimate" checked="">
		                                                <span class="input-span"></span>Estimate
		                                            </label>
											   </li>
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" attrX="Approval" checked="">
		                                                <span class="input-span"></span>Approval
		                                            </label>
											   </li>
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" attrX="Repair" checked="">
		                                                <span class="input-span"></span>Repair
		                                            </label>
											   </li>
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" attrX="Complete" checked="">
		                                                <span class="input-span"></span>Complete
		                                            </label>
											   </li>
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" attrX="Cancel" checked="">
		                                                <span class="input-span"></span>Cancel
		                                            </label>
											   </li>
											</ul>
										</div>										
									</div>										
								</div> -->
								<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 mt-2">
									<div class="row">
										<label class="col-md-4 col-sm-4 col-xs-4 col-form-label">Yard</label>
                                       	<div class="col-md-8 col-sm-8 col-xs-8">
                                       		<ul class="checkboxList">
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" checked="">
		                                                <span class="input-span"></span>First
		                                            </label>
											   </li>
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" checked="">
		                                                <span class="input-span"></span>Second
		                                            </label>
											   </li>
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" checked="">
		                                                <span class="input-span"></span>Third
		                                            </label>
											   </li>
											   <li>
											   		<label class="checkbox checkbox-success">
		                                                <input type="checkbox" checked="">
		                                                <span class="input-span"></span>Fourth
		                                            </label>
											   </li>
											</ul>
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

		var parentMenuList 	= {};
		<?php if(isset($parentMenuList) && count($parentMenuList) >= 0){?>
			parentMenuList = <?=json_encode($parentMenuList);?>;
		<?php } ?>
		for (i = 0; i < parentMenuList.length; i++){
			if (parentMenuList[i]['MenuID'] == 'Report'){
				$('#' + parentMenuList[i]['MenuID']).addClass('active');
			}
			else{
				$('#' + parentMenuList[i]['MenuID']).removeClass();
			}
		}

		var dataTbl = tbl.newDataTable({
			scrollY: '55vh',
			configColumns: tableColumn,
			configTableMain: tableMain,
			order: [[ _columns.indexOf("STT"), 'asc' ]],
			paging: false,
            keys:true,
            autoFill: {
                focus: 'focus'
			},
			// buttons: [
			// 	'copy', 'csv', 'excel', 'pdf', 'print'
			// ],
            select: true,
            rowReorder: false
		});

		$('#tbl').on('shown.bs.modal', function(e){
			$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
		});

		$("#txtDateIn").datetimepicker({
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
		$('#txtDateIn').val(moment().format('YYYY-MM-DD HH:mm:ss'));

		$('#search').on('click', function(){
			tbl.dataTable().fnClearTable();
			var dataForm = GET_ALL_DATA_INPUT('#inputForm', 'attrX');
			console.log(dataForm);
			var saveBtn = $('#search');
			saveBtn.button('loading');
			$('.page-content.fade-in-up').blockUI();
			var fData = {
				DATA_FORM: dataForm,
				iAction: 'loadData'
			};
			$.ajax({ 
				url: '<?= site_url(md5('Report').'/'.md5('rpContainerStock'));?>',
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
		});

		$('#txtOprID, #txtREPAIR_STATUS, #txtISO_SZTP, #txtContCondition, #txtType').select2();

		function fnExcelReport() {
			var tab_text="<table border='2px'>";
			var textRange; var j=0;
			tab = document.getElementById('contenttable'); // id of table
			//alert($(tab).find("thead tr").html());
			var theader="";
			$(tab).find("thead tr th").each(function(){
				theader+="<td width=200><b>"+$(this).html()+"</b></td>";
			});
			tab_text+="<tr bgcolor='#FFFFFF'>"+theader+"</tr>";
			for(j = 0 ; j < tab.rows.length ; j++) 
			{     
				tab_text+="<tr>"+tab.rows[j].innerHTML+"</tr>";
				//tab_text=tab_text+"</tr>";
			}

			tab_text=tab_text+"</table>";
			tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
			tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
			tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

			var ua = window.navigator.userAgent;
			var msie = ua.indexOf("MSIE "); 

			if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
			{
				txtArea1.document.open("txt/html","replace");
				txtArea1.document.write(tab_text);
				txtArea1.document.close();
				txtArea1.focus(); 
				sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
			}  
			else                 //other browser not tested on IE 11
				sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

			return (sa);
		}

		$(document).on("click","#export",function(){
			fnExcelReport();
		});
	});
</script>