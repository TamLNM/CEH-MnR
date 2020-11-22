<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link href="<?=base_url('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet"/>
<meta http-equiv="content-type" content="text/plain; charset=UTF-8"/>
<style>
	.input{
		height: 28px; 
		font-size: 12px; 
		padding-left: 11px; 
		border-radius: 5px;
		max-width: 15rem;
		border: 1px solid rgba(0,0,0,.15);
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
	    height: 6.7rem!important;
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
	/* #select2-txtOPR-container {
		padding: 0rem 0.7rem!important;
	} */

	.autocomplete {
	  	position: relative;
	  	display: inline-block;
	}

	.autocomplete-items {
  		position: absolute;
  		border: 1px solid #d4d4d4;
  		border-bottom: none;
  		border-top: none;
  		z-index: 99;
  		/*position the autocomplete items to be the same width as the container:*/
  		top: 100%;
  		left: 0;
  		right: 0;
	}

	.autocomplete-items div {
	  	padding: 10px;
	  	cursor: pointer;
	  	background-color: #fff; 
	  	border-bottom: 1px solid #d4d4d4; 
		}

	/*when hovering an item:*/
	.autocomplete-items div:hover {
  		background-color: #e9e9e9; 
	}

	/*when navigating through the items using the arrow keys:*/
	.autocomplete-active {
  		background-color: DodgerBlue !important; 
  		color: #ffffff; 
	}
</style>
<div class="row">
	<div class="col-xl-12">
		<div class="ibox collapsible-box">
			<div class="ibox-head">
				<div class="ibox-title">BÁO CÁO GIÁM ĐỊNH SỬA CHỮA CONTAINER</div>
				<div class="button-bar-group">
					<button id="search" class="btn btn-outline-warning btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Nạp dữ liệu"
										 	title="Nạp dữ liệu">
						<span class="btn-icon"><i class="ti-search"></i>Nạp dữ liệu</span>
					</button>

					 <button id="advancedSearch" class="btn btn-outline-success btn-sm btn-loading mr-1" 
											data-loading-text="<i class='la la-spinner spinner'></i>Tìm kiếm nâng cao"
										 	title="Tìm kiếm nâng cao">
						<span class="btn-icon"><i class="ti-search"></i>Tìm kiếm nâng cao</span>
					</button>
					
					<button id="exportReport" class="btn btn-outline-dark btn-sm btn-loading mr-1 mt-1 mb-1" 
                                            data-loading-text="<i class='la la-file'></i>In báo cáo"
                                            title="In báo cáo">
                        <span class="btn-icon"><i class="la la-file"></i>In báo cáo</span>
                    </button> 

					<button id="export" class="btn btn-outline-dark btn-sm btn-loading mr-1 mt-1 mb-1" 
                                            data-loading-text="<i class='la la-file'></i>Xuất Excel"
                                            title="Xuất Excel">
                        <span class="btn-icon"><i class="la la-file"></i>Xuất Excel</span>
                    </button> 
				</div>
			</div>

			<form class="ibox-body mt-0 pt-0 pb-0 bg-f9 border-e" id="inputForm">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2 mt-2">
									<div class="row">
										<label class="col-md-2 col-sm-2 col-xs-2 col-form-label">Từ ngày đến ngày</label>		
			                            <div class="col-md-6 col-sm-6 col-xs-6">
											<input id="txtFormDate" class="input" attrX="FormDate" placeholder="Từ ngày" type="text" readonly>
											<input id="txtToDate" class="input" attrX="ToDate" placeholder="Đến ngày" type="text" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row ibox mb-0 border-e">								
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 mt-2">
									<div class="row">
										<label class="col-md-4 col-sm-4 col-xs-4 col-form-label">Hãng khai thác</label>		
										<div class="col-md-8 col-sm-8 col-xs-8">
											<select id="txtOPR" attrX="OPR" style="max-width: 11.4rem;" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<?php if(isset($cb_OprID) && count($cb_OprID) > 0) {$i = 1; ?>
													<?php foreach($cb_OprID as $item) {  ?>
														<option value="<?=$item['CusID'];?>"><?=$item['CusID'];?></option>
													<?php $i++; }  ?>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="row mt-2 mb-2">
										<label class="col-md-4 col-sm-4 col-xs-4 col-form-label">Trạng thái</label>		
										<div class="col-md-8 col-sm-8 col-xs-8">
											<select id="txtREPAIR_STATUS" attrX="REPAIR_STATUS" style="max-width: 11.4rem;" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="E">Estimate</option>
												<option value="A">Approval</option>
												<option value="R">Repair</option>
												<option value="C">Complete</option>
												<option value="X">Cancel</option>
											</select>
											<!-- <input id="" class="form-control input ml-4"   placeholder="" type="text"> -->
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mt-2">
									<div class="row">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Kích cỡ</label>		
										<div class="col-md-6 col-sm-6 col-xs-6">
											<select id="txtSZTP" attrX="SZTP"  data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="2">20</option>
												<option value="4">40</option>
												<option value="5">45</option>
											</select>
										</div>
									</div>
									<div class="row mt-2 mb-2">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Tình trạng cont</label>
			                            <div class="col-md-6 col-sm-6 col-xs-6">
											<select id="txtCONTCONDITION" attrX="CONTCONDITION" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="A">Grade A</option>
												<option value="B">Grade B</option>
												<option value="C">Grade C</option>
												<option value="D">Grade D</option>
												<option value="U">Grade U</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 mt-2">
									<div class="row mb-2">
										<label class="col-md-6 col-sm-6 col-xs-6 col-form-label" style="text-align: right;">Loại</label>		
										<div class="col-md-6 col-sm-6 col-xs-6">
											<select id="txtType" attrX="Type" data-width="100%" data-style="btn-default btn-sm">
												<option value="*" selected>*</option>
												<option value="D">Dry</option>
												<option value="R">Refeer</option>
											</select>
										</div>									
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pl-0 pr-0">
						<div class="ibox-body pt-1 pb-1 bg-f9">
							<div class="row ibox mb-0 border-e">								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2 mt-2">
									<div class="row">
										<label class="col-md-3 col-sm-3 col-xs-3 col-form-label">ĐTTT</label>
                                       	<div class="col-md-9 col-sm-9 col-xs-9">
                                       		<ul class="checkboxList">
											   <li>
													<label class="checkbox checkbox-success">
														<input type="checkbox" value="O" checked="">
														<span class="input-span"></span>Owner
													</label>
												</li>
												<li>
													<label class="checkbox checkbox-success">
														<input type="checkbox" value="D" checked="">
														<span class="input-span"></span>Depot
													</label>
												</li>
												<li>
													<label class="checkbox checkbox-success">
														<input type="checkbox" value="T" checked="">
														<span class="input-span"></span>Terminal
													</label>
												</li>
												<li>
													<label class="checkbox checkbox-success">
														<input type="checkbox" value="I" checked="">
														<span class="input-span"></span>Insurance
													</label>
												</li>
												<li>
													<label class="checkbox checkbox-success">
														<input type="checkbox" value="X" checked="">
														<span class="input-span"></span>Cancel
													</label>
												</li>
												<li>
													<label class="checkbox checkbox-success">
														<input type="checkbox" value="U" checked="">
														<span class="input-span"></span>User
													</label>
												</li>
												<li>
													<label class="checkbox checkbox-success">
														<input type="checkbox" value="F" checked="">
														<span class="input-span"></span>Free
													</label>
												</li>

											   <!-- <li>
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
											   </li> -->
											</ul>
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
					<div id="tablecontent" class="mt-2">
						<table id="contenttable" class="table table-striped display nowrap" cellspacing="0" style="max-width: 95%;">
							<thead>
								<th col-name="">STT</th>
								<th col-name="">Số Container</th>
								<th col-name="">Tình trạng</th>
								<th col-name="">Kích cỡ</th>
								<th col-name="">Hãng khai thác</th>
								<th col-name="">Ngày vào bãi</th>
								<th col-name="">Vị trí bãi</th>
								<th col-name="">Năm sản xuất</th>
								<th col-name="">Estimate Date</th>
								<th col-name="">Approval Date</th>
								<th col-name="">Repair Date</th>
								<th col-name="">Completed Date</th>
								<th col-name="">Cancel Date</th>
								<th col-name="">COM</th>
								<th col-name="">LOC</th>
								<th col-name="">DAM</th>
								<th col-name="">REP</th>
								<th col-name="">LENGTH</th>
								<th col-name="">WIDTH</th>
								<th col-name="">Quantity</th>
								<th col-name="">Hours</th>
								<th col-name="">Labor Cost</th>
								<th col-name="">MateCost</th>
								<th col-name="">Total</th>
							</thead>
							<tbody id="tablecontentTBody">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Advanced-search-modal --> 
<div class="modal fade" id="advanced-search-modal" tabindex="-1" role="dialog" aria-labelledby="groups-modalLabel-1" aria-hidden="true" data-whatever="id" style="padding-left: 10%; top: 150px">
	<div class="modal-dialog" role="document" style="min-width: 1000px!important">
		<div class="modal-content" style="border-radius: 4px">
			<div class="modal-header">
                <h5 class="modal-title text-secondary" style="font-weight: bold;" id="groups-modalLabel-1">TÌM KIẾM NÂNG CAO</h5>
            </div>
			<div class="modal-body">
				<div style="width: 100%; max-height: 1.6rem;" hidden>
					<label style="min-width: 31rem;  font-family: sans-serif, Arial; font-size: 13px; padding-left: 5px; font-weight: bold;">
						SỐ CONT
					</label>
					<label style="min-width: 31rem;  font-family: sans-serif, Arial; font-size: 13px;padding-left: 10px; font-weight: bold;">
						LIST CONT
					</label>
				</div>
				<div class="autocomplete">
					<input id="containerNoAdvSearch" 
					   placeholder="Nhập số cont"
					   hidden 
					   type="text"
					   style="min-width: 31rem; 
					   		  float: left;
					   		  font-family: sans-serif, Arial;
					   		  font-size: 13px;
					   		  color: #495057;
    						  background-color: #fff;
    						  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
					   		  padding: .35rem .75rem;
					   		  margin-right: 1rem;
					   		  border-radius: 4px!important;
    						  border: 1px solid #eee!important;">
    				<input id="containerNoListAdvSearch" 
					   placeholder="Nhập list cont" 
					   type="text"
					   style="min-width: 63rem; 
					   		  float: left;
					   		  font-family: sans-serif, Arial;
					   		  font-size: 13px;
					   		  color: #495057;
    						  background-color: #fff;
    						  transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
					   		  padding: .35rem .75rem;
					   		  border-radius: 4px!important;
    						  border: 1px solid #eee!important;">
					<button style="border: none; color: red; background-color: white; float: left; text-decoration: underline; margin-left: 5px; font-style: italic;" id="deleteAllAdvSearch">Xóa tất cả</button>
				</div>
				<div id="showChoosenContainerNoAutoComplete" style="margin-top: 10px!important; margin-bottom: -10px!important;"></div>
			</div>
			<div class="modal-footer">
				<div  style="margin: 0 auto!important;">
					<button class="btn btn-sm btn-rounded btn-gradient-blue btn-labeled btn-labeled-left btn-icon" id="advanced-search-button" data-dismiss="modal">
						<span class="btn-label"><i class="ti-search"></i></span>Nạp dữ liệu</button>
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


<div id='dataExportReport' hidden>
	<table id="reportTable">
		<tbody id="reportTableTBody">
			<tr>
				<td colspan="5" class="title">
					<img style="height: 45%; width: 30%" src="<?=base_url('assets/img/logoITC.png');?>">
				</td>
				<td colspan="5" style="text-align: right; padding-top: 5px;" class="title">
					Add: Nguyen Thi Tu Street, Phu Huu Ward, Dist. HCMC<br>
					Tel: 028 37315050; Fax: 028 373 15051
				</td>
			</tr>
			<tr style="margin-top: 2rem; margin-bottom: 2rem;">
				<td colspan="10" style="font-weight: bold; text-align: center; font-size: 1.25rem;" id="reportTitle">ESTIMATES/INVOICES OF REPAIR FOR GMD</td>
			</tr>
			<tr style="margin-top: 2rem; margin-bottom: 2rem;">
				<td colspan="10" style="text-align: center; font-size: 1rem;" id="reportTime">From 06/01/2016 To 06/01/2020</td>
			</tr>
			<tr style="height: 2.5rem;"></tr>
			<tr style="padding-top: 5rem; font-size: 13px;">
				<td colspan="5" style="text-align: center;">CURRENCY: USD</td>
				<td colspan="5" style="text-align: center;" id="laborCostPerHour">Labor Rate: 2.00/Hour</td>
			</tr>
		</tbody>
	</table>
	<table id="reportTable2" style="margin-top: 1rem; margin-left: 5px; margin-right: 5px; margin-bottom: 5rem;">
		<tbody id="reportTable2TBody">
			<!--
			<tr>
				<th class="tableTitle1">SQ</th>
				<th class="tableTitle1">DATE OF EST</th>
				<th class="tableTitle1">DATE GATE IN</th>
				<th class="tableTitle1">CONTAINER</th>
				<th class="tableTitle1">SIZE</th>
				<th class="tableTitle1">IT</th>
				<th class="tableTitle1">COMP CODE</th>
				<th class="tableTitle1">COMPONENT DETAILS</th>
				<th class="tableTitle1">LOC</th>
				<th class="tableTitle1">DAM CODE</th>
				<th class="tableTitle1">RP CODE</th>
				<th class="tableTitle1">LTH</th>
				<th class="tableTitle1">WDT</th>
				<th class="tableTitle1">QTY</th>
				<th class="tableTitle1">P</th>
				<th class="tableTitle1">HOURS</th>
				<th class="tableTitle1">LABOR COST</th>
				<th class="tableTitle1">MATERIAL COST</th>
				<th class="tableTitle1">TOTAL</th>
			</tr>


			<tr>
				<td rowspan="3" style="vertical-align: top">1</td>
				<td rowspan="3" style="vertical-align: top">2/18/2020</td>
				<td rowspan="3" style="vertical-align: top">1/20/2020</td>
				<td rowspan="3" style="vertical-align: top; font-weight: bold">GESU5756628</td>
				<td rowspan="3" style="vertical-align: top">4500</td>
				<td>1</td>
				<td>LBR</td>
				<td>LOCKING BAR ROD</td>
				<td>DB2N</td>
				<td>BT</td>
				<td>GS</td>
				<td></td>
				<td></td>
				<td>1</td>
				<td>O</td>
				<td>0.50</td>
				<td>1.0</td>
				<td>3.15</td>
				<td>4.15</td>
			</tr>
			<tr>
				<td>2</td>
				<td>FPP</td>
				<td>PLYWOOD PANEL</td>
				<td>BR23</td>
				<td>BR</td>
				<td>SN</td>
				<td>60</td>
				<td>120</td>
				<td>1</td>
				<td>O</td>
				<td>1.50</td>
				<td>3.0</td>
				<td>34.13</td>
				<td>37.13</td>
			</tr>
			<tr>
				<td>3</td>
				<td>FPP</td>
				<td>PLYWOOD PANEL</td>
				<td>BXXX</td>
				<td>LO</td>
				<td>RE</td>
				<td></td>
				<td></td>
				<td>30</td>
				<td>O</td>
				<td>1.05</td>
				<td>2.10</td>
				<td>10.71</td>
				<td>12.81</td>
			</tr>
			<tr style="color: red; font-weight: bold">
				<td colspan="15" style="text-align: right; font-weight: bolder; padding-right: 10px;">TOTAL</td>
				<td>3.05</td>
				<td>6.10</td>
				<td>47.99</td>
				<td>54.09</td>
			</tr>
			<tr>
				<td rowspan="4" style="vertical-align: top">2</td>
				<td rowspan="4" style="vertical-align: top">2/18/2020</td>
				<td rowspan="4" style="vertical-align: top">2/13/2020</td>
				<td rowspan="4" style="vertical-align: top; font-weight: bold">GMDU2152237</td>
				<td rowspan="4" style="vertical-align: top">2200</td>
				<td>1</td>
				<td>GTO</td>
				<td>Gasket,</td>
				<td>DB2N</td>
				<td>CU</td>
				<td>SN</td>
				<td>30</td>
				<td></td>
				<td>1</td>
				<td>O</td>
				<td>0.50</td>
				<td>1.0</td>
				<td>4.41</td>
				<td>5.41</td>
			</tr>
			<tr>
				<td>2</td>
				<td>GTO</td>
				<td>Gasket,</td>
				<td>DB3N</td>
				<td>CU</td>
				<td>SE</td>
				<td>15</td>
				<td></td>
				<td>1</td>
				<td>O</td>
				<td>0.50</td>
				<td>1.00</td>
				<td>1.00</td>
				<td>2.00</td>
			</tr>
			<tr>
				<td>3</td>
				<td>LBR</td>
				<td>Locking Bar Rod</td>
				<td>DB2N</td>
				<td>DT</td>
				<td>GS</td>
				<td></td>
				<td></td>
				<td>1</td>
				<td>O</td>
				<td>0.50</td>
				<td>1.00</td>
				<td>3.15</td>
				<td>4.15</td>
			</tr>
			<tr>
				<td>4</td>
				<td>CPJ</td>
				<td>Rear Corner Post J Bar</td>
				<td>DX4N</td>
				<td>DT</td>
				<td>GS</td>
				<td>60</td>
				<td></td>
				<td>2</td>
				<td>O</td>
				<td>3.90</td>
				<td>7.80</td>
				<td>23.10</td>
				<td>30.90</td>
			</tr>
			<tr style="color: red; font-weight: bold">
				<td colspan="15" style="text-align: right; font-weight: bolder; padding-right: 10px;">TOTAL</td>
				<td>0.50</td>
				<td>1.00</td>
				<td>4.41</td>
				<td>42.46</td>
			</tr>
		-->
		</tbody>
	</table>
</div>

<div id='dataExportEstimate' hidden>
	<table id="estimateTable">
		<tbody>
			<tr>
				<td colspan="5" class="title">
					<img style="height: 45%; width: 30%" src="<?=base_url('assets/img/logoITC1.png');?>">
				</td>
				<td colspan="5" style="text-align: right; padding-top: 5px;" class="title">
					Add: Nguyen Thi Tu Street, Phu Huu Ward, Dist. HCMC<br>
					Tel: 028 37315050; Fax: 028 373 15051
				</td>
			</tr>
			<tr style="margin-top: 2rem; margin-bottom: 2rem;">
				<td colspan="10" style="font-weight: bold; text-align: center; font-size: 1.25rem;">ESTIMATE OF REPAIRS</td>
			</tr>
			<tr>
				<td colspan="5" class="title"></td>
				<td colspan="5" class="title" style="text-align: right!important;">
					<b>UNIT #: TRLU6664447</b><br>
					ESTIMATE DATE: 27/01/2019&nbsp;ESTIMATE NO: 180127021
				</td>
			</tr>
			<tr>
				<td class="title2" colspan="2">UNIT OF MEASURE:</td>
				<td class="title2" colspan="2">CURRENCY: USD</td>
				<td class="title2" colspan="2">LABOR RATE: 2.00</td>
				<td class="title2" colspan="2">SIZE: 45G0</td>
				<td class="title2" colspan="2">LOC: SP-ITC</td>
			</tr>
		</tbody>
	</table>
	<table id="estimateTable2" style="margin-top: 1rem; margin-left: auto; margin-right: auto;">
		<tbody>
			<tr>
				<th class="tableTitle1">Item</th>
				<th class="tableTitle1">Comp Code</th>
				<th class="tableTitle2">Component Name</th>
				<th class="tableTitle1">Dam Code</th>
				<th class="tableTitle1">Loc</th>
				<th class="tableTitle1">Rep Code</th>
				<th class="tableTitle1">Length</th>
				<th class="tableTitle1">Width</th>
				<th class="tableTitle1">Qty</th>
				<th class="tableTitle1">P</th>
				<th class="tableTitle1">Hours</th>
				<th class="tableTitle1">Labour Code</th>
				<th class="tableTitle1">Meterial Cost</th>
				<th class="tableTitle2">Total Cost</th>
			</tr>
			<tr>
				<td>1</td>
				<td>PAA</td>
				<td>FRONT WALL PANEL</td>
				<td>DT</td>
				<td>LX6N</td>
				<td>GS</td>
				<td>120.00</td>
				<td>60.00</td>
				<td>1</td>
				<td>U</td>
				<td>1.85</td>
				<td>3.70</td>
				<td>11.16</td>
				<td>14.86</td>
			</tr>
			<tr>
				<td>2</td>
				<td>PAA</td>
				<td>FRONT WALL PANEL</td>
				<td>CU</td>
				<td>LX6N</td>
				<td>GW</td>
				<td>15.00</td>
				<td>-</td>
				<td>1</td>
				<td>U</td>
				<td>0.50</td>
				<td>1.00</td>
				<td>2.26</td>
				<td>3.26</td>
			</tr>
			<tr>
				<td>3</td>
				<td>GATO</td>
				<td>GASKET</td>
				<td>CU</td>
				<td>DB3N</td>
				<td>SN</td>
				<td>30.00</td>
				<td>-</td>
				<td>1</td>
				<td>U</td>
				<td>0.50</td>
				<td>1.00</td>
				<td>4.41</td>
				<td>5.41</td>
			</tr>
			<tr>
				<td style="height: 1.85rem;"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td style="border-right: none!important; font-weight: bolder">TOTAL<br>COVERAGE<br>DRAYAGE<br>PHOTO</td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td style="text-align: center; border-left: none; border-right: none">5.70<br><br><br></td>
				<td style="text-align: center; border-left: none; border-right: none">17.83<br><br><br></td>
				<td style="text-align: center; border-left: none">23.53<br><br><br></td>
			</tr>
			<tr>
				<td style="border-right: none!important;">COMMENT</td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeft'></td>
			</tr>
			<tr>
				<td colspan="3" class='noBorderRight'>
					MANUFACTURE DATE<br>
					APPROVAL DATE: 27/01/2018<br>
					COMPLETED DATE:<br><br>
				</td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td class='noBorderLeftRight'></td>
				<td colspan="3" class='noBorderLeftRight' style="font-weight: bolder;">
					OPPERATION TOTAL<br>
					CUSTOMER TOTAL<br>
					DISCOUNT<br>
					GRAND TOTAL<br>
				</td>
				<td style="font-weight: bolder; text-align: center!important; border-left: none; padding-right: 5px;">
					-<br>
					23.53<br><br>
					23.53
				</td>
			</tr>
			<tr style="border: none!important; height: 4rem; font-weight: bolder">
				<td colspan="4" style="border: none!important;">
					<u>APPROVAL PARTY</u>
				</td>
				<td colspan="4" style="border: none!important;">
					CUSTOMER
				</td>
				<td colspan="5" style="border: none!important;">
					SP-ITC REPAIR WORKSHOP
				</td>
			</tr>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		var tableMain = $('#contenttable').attr("tableX");
        var tableColumn = <?= $P_Columns ?>;
        var _columns = Load_GridHeader('contenttable', tableColumn);
		var tbl = $('#contenttable');
		var iUser = '<?=$this->session->UserID;?>';
		var exportReportTableSrc = '',
			containerList = [];

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
			"ordering": false,
			// order: [[ _columns.indexOf("STT"), 'asc' ]],
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

		tbl.editableTableWidget();

		$("#exportReport").on('click', function(e){
			if (exportReportTableSrc == ''){
				toastr['warning']('Vui lòng nạp dữ liệu để xuất báo cáo!');
				return;
			}

			$("#reportTable2TBody").html(exportReportTableSrc);

        	var w = window.open('BÁO CÁO GIÁM ĐỊNH SỬA CHỮA CONTAINER'),
            	headContent = document.getElementsByTagName('head')[0].innerHTML;

            w.document.write('<html><head>' + headContent + '<link rel="stylesheet" type="text/css" href="' + "<?=base_url('assets/css/quote_and_repair_css.css');?>" + '"></head><body style="background: rgb(204,204,204); font-family: "Times New Roman", Times, serif; background: rgb(204,204,204);"><page>');
            w.document.write($('#dataExportReport').html());
            w.document.write('</page></body></html>');
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
		$('#txtOPR, #txtREPAIR_STATUS, #txtSZTP, #txtCONTCONDITION, #txtType').select2();

		$('#search').on('click', function(){
			var xxxselected = [];
			$('.checkboxList input:checked').each(function() {
				xxxselected.push($(this).val());
			});

			tbl.dataTable().fnClearTable();
			var dataForm = GET_ALL_DATA_INPUT('#inputForm', 'attrX');
			dataForm['PAYERTYPE'] = xxxselected;
			console.log(dataForm);
			var saveBtn = $('#search');
			saveBtn.button('loading');
			$('.page-content.fade-in-up').blockUI();
			var fData = {
				DATA_FORM: dataForm,
				iAction: 'loadData'
			};
			$.ajax({ 
				url: '<?= site_url(md5('Report').'/'.md5('rpEstimateOfRepair'));?>',
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
						var laborCostPerHour = data[0]['LABOR_PRICE'];

						toastr["success"]("Nạp dữ liệu thành công!");
						//Load_Data_Grid('contenttable', _columns, data);
						
						$("#tablecontentTBody").html('');

						containerList.push(data[0]['CNTRNO']);

						var arrNumeric 		= [],
							currentContainerNo = data[0]['CNTRNO'],
							sumHours 		= [],
							sumLaborCost 	= [],
							sumMateCost 	= [],
							sumTotal		= [],
							summaryHours    = 0,
							summaryLaborCost= 0,
							summaryMateCost = 0,
							summaryTotal	= 0,
							idx 			= 1,
							STT 			= 1,
							eSTT 			= 1,	
							OPRData 		= data[0]['OPR'],
							laborCostPerHourValue   = data[0]['LABOR_PRICE'];

						arrNumeric[currentContainerNo] 	 = 1;
						sumHours[currentContainerNo] 	 = parseFloat(data[0]['HOURS']);
						sumLaborCost[currentContainerNo] = parseFloat(data[0]['LABOR_PRICE']);
						sumMateCost[currentContainerNo]  = parseFloat(data[0]['MATE_PRICE']);
						sumTotal[currentContainerNo] 	 = parseFloat(data[0]['TOTAL']);
						summaryHours 					+= parseFloat(data[0]['HOURS']);
						summaryLaborCost 				+= parseFloat(data[0]['LABOR_PRICE']);
						summaryMateCost					+= parseFloat(data[0]['MATE_PRICE']);
						summaryTotal					+= parseFloat(data[0]['TOTAL']);

						for (i = 1; i < data.length; i++){
							if (data[i]['CNTRNO'] != containerList[containerList.length - 1]){
								containerList.push(data[i]['CNTRNO']);
							}

							if (data[i]['LABOR_PRICE'] != laborCostPerHourValue){
								laborCostPerHour = '';
							}

							summaryHours	 += parseFloat(data[i]['HOURS']);
							summaryLaborCost += parseFloat(data[i]['LABOR_PRICE']);
							summaryMateCost	 += parseFloat(data[i]['MATE_PRICE']);
							summaryTotal	 += parseFloat(data[i]['TOTAL']);

							if (data[i]['CNTRNO'] == currentContainerNo){
								arrNumeric[currentContainerNo]++;
								sumHours[currentContainerNo] 	 += parseFloat(data[i]['HOURS']);
								sumLaborCost[currentContainerNo] += parseFloat(data[i]['LABOR_PRICE']);
								sumMateCost[currentContainerNo]  += parseFloat(data[i]['MATE_PRICE']);
								sumTotal[currentContainerNo] 	 += parseFloat(data[i]['TOTAL']);
							}
							else{
								currentContainerNo 				 = data[i]['CNTRNO'];
								arrNumeric[currentContainerNo] 	 = 1;
								sumHours[currentContainerNo] 	 = parseFloat(data[i]['HOURS']);
								sumLaborCost[currentContainerNo] = parseFloat(data[i]['LABOR_PRICE']);
								sumMateCost[currentContainerNo]  = parseFloat(data[i]['MATE_PRICE']);
								sumTotal[currentContainerNo] 	 = parseFloat(data[i]['TOTAL']);

								if (data[i]['OPR'] != OPRData){
									OPRData = '*';
								}
							}
						}

						var dataTableSrc = '',
							idxCheck     = 0,
							currentContainerNo,
							checkInsertSum = false;
								
						exportReportTableSrc = '';
						exportReportTableSrc += '<tr>';
							exportReportTableSrc += '<th class="tableTitle1">SQ</th>';
							exportReportTableSrc += '<th class="tableTitle1">DATE OF EST</th>';
							exportReportTableSrc += '<th class="tableTitle1">DATE GATE IN</th>';
							exportReportTableSrc += '<th class="tableTitle1">CONTAINER</th>';
							exportReportTableSrc += '<th class="tableTitle1">SIZE</th>';
							exportReportTableSrc += '<th class="tableTitle1">IT</th>';
							exportReportTableSrc += '<th class="tableTitle1">COMP CODE</th>';
							exportReportTableSrc += '<th class="tableTitle1">COMPONENT DETAILS</th>';
							exportReportTableSrc += '<th class="tableTitle1">LOC</th>';
							exportReportTableSrc += '<th class="tableTitle1">DAM CODE</th>';
							exportReportTableSrc += '<th class="tableTitle1">RP CODE</th>';
							exportReportTableSrc += '<th class="tableTitle1">LTH</th>';
							exportReportTableSrc += '<th class="tableTitle1">WDT</th>';
							exportReportTableSrc += '<th class="tableTitle1">QTY</th>';
							exportReportTableSrc += '<th class="tableTitle1">P</th>';
							exportReportTableSrc += '<th class="tableTitle1">HOURS</th>';
							exportReportTableSrc += '<th class="tableTitle1">LABOR COST</th>';
							exportReportTableSrc += '<th class="tableTitle1">MATERIAL COST</th>';
							exportReportTableSrc += '<th class="tableTitle1">TOTAL</th>';
						exportReportTableSrc += '</tr>';

						for (i = 0; i < data.length; i++){
							dataTableSrc += '<tr style="background-color: white!important;">';
							exportReportTableSrc += '<tr style="background-color: white!important;">';
								currentContainerNo = data[i]['CNTRNO'];

								if (idxCheck == 0){
									idx = 1;
								}
								idx++;

								if (idxCheck == 0){
									exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + eSTT++ + '</td>'; 
									exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['ESTIMATEDATE'] ? getDate(data[i]['ESTIMATEDATE']) : '') + '</td>'; 
									exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + getDate(data[i]['GATEIN_DATE']) + '</td>'; 
									exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['CNTRNO'] + '</td>'; 
									exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['SZTP'] + '</td>'; 

									dataTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + STT++ + '</td>';
									dataTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['CNTRNO'] + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['SZTP'] + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['OPR'] + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['CONTCONDITION'] + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + getDateTime(data[i]['GATEIN_DATE']) + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['ESTIMATENO'] + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['VENDOR_ID'] ? data[i]['VENDOR_ID'] : '') + '</td>';									
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + getDateTime(data[i]['ESTIMATEDATE']) + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>'  + (data[i]['APPRPVALDATE']  ? getDateTime(data[i]['APPRPVALDATE'])  : '') + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['REPAIRDATE']    ? getDateTime(data[i]['REPAIRDATE']) : '') + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['COMPLETEDDATE'] ? getDateTime(data[i]['COMPLETEDDATE']) : '') + '</td>';
									dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['CANCLEDATE']    ? getDateTime(data[i]['CANCLEDATE']) : '') + '</td>';
								}

								idxCheck++;

								if (i != data.length - 1){
									if (data[i+1]['CNTRNO'] != currentContainerNo){
										idxCheck = 0;
										checkInsertSum = true;
									}
								}
								else{
									checkInsertSum = true;
								}

								
								exportReportTableSrc += '<td style="text-align: center">' + (idx-1) + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['COMP_ID']   ? data[i]['COMP_ID']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + data[i]['COMP_NAME_EN'] + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['LOC_ID']   ? data[i]['LOC_ID']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['DAM_ID']   ? data[i]['DAM_ID']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['REP_ID']   ? data[i]['REP_ID']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['LENGTH']   ? data[i]['LENGTH']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['WIDTH']   ? data[i]['WIDTH']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['QUANTITY']   ? data[i]['QUANTITY']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['PAYERTYPE']   ? data[i]['PAYERTYPE']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['HOURS']   ? data[i]['HOURS']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['LABOR_PRICE']   ? data[i]['LABOR_PRICE']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['MATE_PRICE']   ? data[i]['MATE_PRICE']  : '') + '</td>';
								exportReportTableSrc += '<td style="text-align: center">' + (data[i]['TOTAL']   ? data[i]['TOTAL']  : '') + '</td>';


								dataTableSrc += '<td style="text-align: center">' + (data[i]['COMP_ID']   ? data[i]['COMP_ID']  : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['LOC_ID']    ? data[i]['LOC_ID']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['DAM_ID']    ? data[i]['DAM_ID'] : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['REP_ID']    ? data[i]['REP_ID']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['LENGTH']    ? data[i]['LENGTH']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['WIDTH']     ? data[i]['WIDTH']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['QUANTITY']  ? data[i]['QUANTITY']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['HOURS']     ? data[i]['HOURS']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['LABOR_PRICE']   ? data[i]['LABOR_PRICE']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['MATE_PRICE']    ? data[i]['MATE_PRICE']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['TOTAL']     ? data[i]['TOTAL']    : '') + '</td>';
								dataTableSrc += '<td style="text-align: center">' + (data[i]['PAYERTYPE'] ? data[i]['PAYERTYPE'] : '') + '</td>';
							dataTableSrc += '</tr>';


							if (checkInsertSum){
								exportReportTableSrc += '<tr style="color: red; background-color: white!important;">';
									exportReportTableSrc += '<td colspan="15" style="font-weight: bolder; text-align: right;">TOTAL</td>';
									exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumHours[currentContainerNo].toFixed(2) + '</td>';
									exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumLaborCost[currentContainerNo].toFixed(2) + '</td>';
									exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumMateCost[currentContainerNo].toFixed(2) + '</td>';
									exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumTotal[currentContainerNo].toFixed(2) + '</td>';
								exportReportTableSrc += '</tr>';


								dataTableSrc += '<tr style="color: red; background-color: white!important;">';
									dataTableSrc += '<td colspan="20" style="font-weight: bolder; text-align: right;">TỔNG</td>';
									dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumHours[currentContainerNo].toFixed(2) + '</td>';
									dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumLaborCost[currentContainerNo].toFixed(2) + '</td>';
									dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumMateCost[currentContainerNo].toFixed(2) + '</td>';
									dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumTotal[currentContainerNo].toFixed(2) + '</td>';
									dataTableSrc += '<td></td>';
								dataTableSrc += '</tr>';
								checkInsertSum = false;
							}
						}

						exportReportTableSrc += '<tr style="color: red; background-color: white!important;">';
							exportReportTableSrc += '<td colspan="15" style="font-weight: bolder; text-align: right;">SUMMARY</td>';
							exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryHours.toFixed(2) + '</td>';
							exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryLaborCost.toFixed(2) + '</td>';
							exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryMateCost.toFixed(2) + '</td>';
							exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryTotal.toFixed(2) + '</td>';
						exportReportTableSrc += '</tr>';

						dataTableSrc += '<tr style="color: red; background-color: white!important;">';
							dataTableSrc += '<td colspan="20" style="font-weight: bolder; text-align: right;">TỔNG CỘNG</td>';
							dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryHours.toFixed(2) + '</td>';
							dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryLaborCost.toFixed(2) + '</td>';
							dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryMateCost.toFixed(2) + '</td>';
							dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryTotal.toFixed(2) + '</td>';
						dataTableSrc += '</tr>';

						$("#tablecontentTBody").html('');
						$("#tablecontentTBody").html(dataTableSrc);

						$($.fn.dataTable.tables(true)).DataTable().columns.adjust();

						$('#reportTitle').html('');
						$('#reportTitle').html('ESTIMATES/INVOICES OF REPAIR FOR ' + OPRData);
						
						$('#laborCostPerHour').html('');
						$('#laborCostPerHour').html('Labor Rate: ' + laborCostPerHour + '/Hour');

						$('#reportTime').html('');
						$('#reportTime').html('From ' + getDateTime($('#txtFormDate').val()) + ' To ' + getDateTime($('#txtToDate').val()));

						$('#contenttable_info').html('');
						$('#contenttable_info').html('Số dòng: ' + containerList.length);

						autoComplete(document.getElementById("containerNoAdvSearch"), containerList);

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

		//EXCEL
		//-----AHIEU------
		var Upload = function (file) {
			this.file = file;
		};

		Upload.prototype.getType = function() {
			return this.file.type;
		};
		Upload.prototype.getSize = function() {
			return this.file.size;
		};
		Upload.prototype.getName = function() {
			return this.file.name;
		};
		Upload.prototype.doUpload = function () {
			var that = this;
			var formData = new FormData();

			// add assoc key values, this will be posts values
			formData.append("file", this.file, this.getName());
			formData.append("upload_file", true);

			$.ajax({
				type: "POST",
				url: "<?=site_url(md5('ExpertiseAndRepair') . '/' . md5('ajax_load_excel'));?>",
				xhr: function () {
					var myXhr = $.ajaxSettings.xhr();
					if (myXhr.upload) {
						myXhr.upload.addEventListener('progress', that.progressHandling, false);
					}
					return myXhr;
				},
				success: function (data) {
					var data=JSON.parse(data);
					console.log(data);
					return;
					$("#fileinput").val('');
					if(data.length>0)
					{
						var stt=$("#contenttable").DataTable().rows().count();
						$.each(data, function (k, v) {	
							stt++;
							var ite=[];
							ite[0]=stt;
							ite[1]=v[1];
							ite[2]=v[2];
							ite[3]=v[3];
							ite[4]=v[4];
							ite[5]=v[5];
							ite[6]=v[6];
							ite[7]=v[7];
							ite[8]=v[8];
							ite[9]=v[9];
							ite[10]=v[10];
							var addj=$("#contenttable").DataTable().row.add(ite).draw();	
							$(addj).addClass("editing");	
						});
					}
				},
				error: function (error) {
					// handle error
				},
				async: true,
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				timeout: 60000
			});
		};

		$(document).on(evClick,"#addexcel",function(){
			$("#fileinput").trigger(evClick);
		});

		$(document).on("change","#fileinput",function(){
			var code=$(this).attr("code");
			var file = $("#fileinput")[0].files[0];
			var upload = new Upload(file);
			upload.doUpload();
		});

		/* Export Excel */
		$('#export').on('click', function(){
			if (exportReportTableSrc == ''){
				toastr['warning']('Vui lòng nạp dữ liệu để xuất báo cáo!');
				return;
			}

			$("#reportTable2TBody").html(exportReportTableSrc);
			var dataSrc = '<html><head><style>#xxx th, #xxx td {border: 1px solid black; border-width: thin;} </style></head><body>';
			dataSrc += '<table>';
				dataSrc += '<tr rowspan="3">';
					dataSrc += '<td colspan="9" class="title">';
						dataSrc += '<img style="max-height: 50px; max-width: 75px;" src="<?=base_url('assets/img/logoITC.png');?>">';
					dataSrc += '</td>';
					dataSrc += '<td colspan="10" style="text-align: right; padding-top: 5px;" class="title">Add: Nguyen Thi Tu Street, Phu Huu Ward, Dist. HCMC<br>Tel: 028 37315050; Fax: 028 373 15051					</td>';
				dataSrc += '</tr>'
				dataSrc += '<tr style="margin-top: 2rem; margin-bottom: 2rem;">';
					dataSrc += '<td colspan="19" style="font-weight: bold; text-align: center; font-size: 1.25rem;" id="reportTitle">ESTIMATES/INVOICES OF REPAIR FOR GMD</td>';
				dataSrc += '</tr>';
				dataSrc += '<tr style="margin-top: 2rem; margin-bottom: 2rem;">';
					dataSrc += '<td colspan="19" style="text-align: center; font-size: 1rem;" id="reportTime">' + $('#reportTime').html() + '</td>';
				dataSrc += '</tr>';
				dataSrc += '<tr style="height: 2.5rem;"></tr>';
				dataSrc += '<tr style="padding-top: 5rem; font-size: 13px;">';
					dataSrc += '<td colspan="9" style="text-align: center;">CURRENCY: USD</td>'
					dataSrc += '<td colspan="10" style="text-align: center;" id="laborCostPerHour">' + $('#laborCostPerHour').html() + '</td>';
				dataSrc += '</tr>';
			dataSrc += "</table>";
			dataSrc += "<table id='xxx'>";
		    	dataSrc += exportReportTableSrc;
		    dataSrc += "</table></body></html>";
			//window.open('data:application/vnd.ms-excel,' +  encodeURIComponent(dataSrc));

			var data_type = 'data:application/vnd.ms-excel',
		    	a = document.createElement('a');
		   	a.href = data_type + ', ' + encodeURIComponent(dataSrc);
		    a.download = 'ESTIMATES/INVOICES OF REPAIR REPORT.xls';
	        a.click();
	        e.preventDefault();
		    return(a);
		});

		$('#advancedSearch').on('click', function(){
			if (exportReportTableSrc == ''){
				toastr['warning']('Vui lòng nạp dữ liệu để xuất báo cáo!');
				return;
			}
			$('#containerNoAdvSearch').val('');
			$('#containerNoListAdvSearch').val('');
			$('#advanced-search-modal').modal('show');
		});

		function autoComplete(inp, arr) {
		    /*the autocomplete function takes two arguments,
		    the text field element and an array of possible autocompleted values:*/
		    var currentFocus;
		    /*execute a function when someone writes in the text field:*/
		    inp.addEventListener("input", function(e) {
		        var a, b, i, val = this.value;
		        /*close any already open lists of autocompleted values*/
		        closeAllLists();
		        if (!val) {
		            return false;
		        }
		        currentFocus = -1;
		        /*create a DIV element that will contain the items (values):*/
		        a = document.createElement("DIV");
		        a.setAttribute("id", this.id + "autocomplete-list");
		        a.setAttribute("class", "autocomplete-items");
		        /*append the DIV element as a child of the autocomplete container:*/
		        this.parentNode.appendChild(a);
		        /*for each item in the array...*/
		        for (i = 0; i < arr.length; i++) {
		            /*check if the item starts with the same letters as the text field value:*/
		            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
		                /*create a DIV element for each matching element:*/
		                b = document.createElement("DIV");
		                /*make the matching letters bold:*/
		                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
		                b.innerHTML += arr[i].substr(val.length);
		                /*insert a input field that will hold the current array item's value:*/
		                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
		                /*execute a function when someone clicks on the item value (DIV element):*/
		                b.addEventListener("click", function(e) {
		                    /*insert the value for the autocomplete text field:*/
		                    //inp.value = this.getElementsByTagName("input")[0].value;

		                    var containerValue = this.getElementsByTagName("input")[0].value;

		                    if (!($('#tab' + containerValue).html() && 
		                    	$('#tab' + containerValue).html() != '')){
		                    	src = '<span id="tab' + containerValue + '"><label style="background-color: #0b4660; color: white; padding: 5px; border-radius: 10px; margin-left: 5px;">' + containerValue + '<i class="ti-close pl-2 pr-1 advSearchCloseLabel" id="' + containerValue +'"></i></label></span>';
		                    	$('#showChoosenContainerNoAutoComplete').append(src);
		                    	toastr['Thêm số']
		                    	inp.value = '';
		                    }
		                    else{
						       	//toastr['warning']('Đã tồn tại số cont ' + containerValue + '!');
		                    }

		                    /*close the list of autocompleted values,
		                    (or any other open lists of autocompleted values:*/
		                    closeAllLists();
		                });
		                a.appendChild(b);
		            }
		        }
		    });
		    /*execute a function presses a key on the keyboard:*/
		    inp.addEventListener("keydown", function(e) {
		        var x = document.getElementById(this.id + "autocomplete-list");
		        if (x) x = x.getElementsByTagName("div");
		        if (e.keyCode == 40) {
		            /*If the arrow DOWN key is pressed,
		            increase the currentFocus variable:*/
		            currentFocus++;
		            /*and and make the current item more visible:*/
		            addActive(x);
		        } else if (e.keyCode == 38) { //up
		            /*If the arrow UP key is pressed,
		            decrease the currentFocus variable:*/
		            currentFocus--;
		            /*and and make the current item more visible:*/
		            addActive(x);
		        } else if (e.keyCode == 13) {
		            /*If the ENTER key is pressed, prevent the form from being submitted,*/
		            e.preventDefault();
		            if (currentFocus > -1) {
		                /*and simulate a click on the "active" item:*/
		                if (x) x[currentFocus].click();
		            }
	                console.log(1);
		        }
		    });

		    function addActive(x) {
		        /*a function to classify an item as "active":*/
		        if (!x) return false;
		        /*start by removing the "active" class on all items:*/
		        removeActive(x);
		        if (currentFocus >= x.length) currentFocus = 0;
		        if (currentFocus < 0) currentFocus = (x.length - 1);
		        /*add class "autocomplete-active":*/
		        x[currentFocus].classList.add("autocomplete-active");
		    }

		    function removeActive(x) {
		        /*a function to remove the "active" class from all autocomplete items:*/
		        for (var i = 0; i < x.length; i++) {
		            x[i].classList.remove("autocomplete-active");
		        }
		    }

		    function closeAllLists(elmnt) {
		        /*close all autocomplete lists in the document,
		        except the one passed as an argument:*/
		        var x = document.getElementsByClassName("autocomplete-items");
		        for (var i = 0; i < x.length; i++) {
		            if (elmnt != x[i] && elmnt != inp) {
		                x[i].parentNode.removeChild(x[i]);
		            }
		        }
		    }
		    /*execute a function when someone clicks in the document:*/
		    document.addEventListener("click", function(e) {
		        closeAllLists(e.target);
		    });
		}
		
        $(document).on("click", ".advSearchCloseLabel",  function(){
			var id = $(this).context['id'];
			$('#tab' + id).remove();
		});

		function getContainerNoList(str){
			var CNTRNOList = [],
				idx 	   = 0;

			str.trim();
			for (i = 0; i < str.length; i++){
				if (str[i] == ' '){
					CNTRNOList.push(str.substring(idx, i));
					while (str[i++] == ' '){};
					idx = i-1;
					i--;
				}
			}
			CNTRNOList.push(str.substring(idx, str.length).trim());
			return(CNTRNOList);
		}

		$('#containerNoListAdvSearch').keydown(function(event) {
		  	if (event.which == 13 || event.keyCode == 13) {
		    	var CNTRNOList = getContainerNoList($('#containerNoListAdvSearch').val());

		    	for (i = 0; i < CNTRNOList.length; i++){
		    		if (CNTRNOList[i] != ''){
			    		if (containerList && containerList.length > 0){
							for (j = 0; j < containerList.length; j++){
								if (CNTRNOList[i].trim() == containerList[j]){
									if (!($('#tab' + CNTRNOList[i]).html() &&  
										$('#tab' + CNTRNOList[i]).html() != '')){
										var src = '<span id="tab' + CNTRNOList[i] + '"><label style="background-color: #0b4660; color: white; padding: 5px; border-radius: 10px; margin-left: 5px;">' + CNTRNOList[i] + '<i class="ti-close pl-2 pr-1 advSearchCloseLabel" id="' + CNTRNOList[i] +'"></i></label></span>';
						       			$('#showChoosenContainerNoAutoComplete').append(src);
						       			$('#containerNoAdvSearch').val('');
										$('#containerNoListAdvSearch').val('');
						       		}
						       		else{
						       			toastr['warning']('Đã tồn tại số cont ' + CNTRNOList[i] + '!');
						       		}
						       		j = containerList.length + 1;
								}
							}

							if (j == containerList.length){
					       		toastr['error']('Không tồn tại số cont: ' + CNTRNOList[i] + '!');
							}
						}
					}
		    	}

		    	$('#containerNoAdvSearch').val('');
		   	}
		});

		$('#advanced-search-button').on('click', function(){
			var xxxselected = [];
			$('.checkboxList input:checked').each(function() {
				xxxselected.push($(this).val());
			});

			var dataForm = GET_ALL_DATA_INPUT('#inputForm', 'attrX');
			dataForm['PAYERTYPE'] = xxxselected;
			var saveBtn = $('#advancedSearch');
			saveBtn.button('loading');
			$('.page-content.fade-in-up').blockUI();
			var fData = {
				DATA_FORM: dataForm,
				iAction: 'loadData'
			};
			$.ajax({ 
				url: '<?= site_url(md5('Report').'/'.md5('rpEstimateOfRepair'));?>',
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
						var arr = [];
						for (i = data.length - 1; i >= 0; i--){
							if (($('#tab' + data[i]['CNTRNO']).html() && $('#tab' + data[i]['CNTRNO']).html() != '')){
								arr.push(data[i]);
							}
						}

						if (arr && arr.length > 0){
							tbl.dataTable().fnClearTable();
							data = arr;

							var rowsNumeric = 1,
								laborCostPerHour = data[0]['LABOR_PRICE'];

							$("#tablecontentTBody").html('');
							var arrNumeric 		= [],
								currentContainerNo = data[0]['CNTRNO'],
								befContainerNo  = data[0]['CNTRNO'],
								sumHours 		= [],
								sumLaborCost 	= [],
								sumMateCost 	= [],
								sumTotal		= [],
								summaryHours    = 0,
								summaryLaborCost= 0,
								summaryMateCost = 0,
								summaryTotal	= 0,
								idx 			= 1,
								STT 			= 1,
								eSTT 			= 1,	
								OPRData 		= data[0]['OPR'],
								laborCostPerHourValue   = data[0]['LABOR_PRICE'];

							arrNumeric[currentContainerNo] 	 = 1;
							sumHours[currentContainerNo] 	 = parseFloat(data[0]['HOURS']);
							sumLaborCost[currentContainerNo] = parseFloat(data[0]['LABOR_PRICE']);
							sumMateCost[currentContainerNo]  = parseFloat(data[0]['MATE_PRICE']);
							sumTotal[currentContainerNo] 	 = parseFloat(data[0]['TOTAL']);
							summaryHours 					+= parseFloat(data[0]['HOURS']);
							summaryLaborCost 				+= parseFloat(data[0]['LABOR_PRICE']);
							summaryMateCost					+= parseFloat(data[0]['MATE_PRICE']);
							summaryTotal					+= parseFloat(data[0]['TOTAL']);

							for (i = 1; i < data.length; i++){
								if (data[i]['CNTRNO'] != befContainerNo){
									rowsNumeric++;
									befContainerNo = data[i]['CNTRNO'];
								}

								if (data[i]['LABOR_PRICE'] != laborCostPerHourValue){
									laborCostPerHour = '';
								}

								summaryHours	 += parseFloat(data[i]['HOURS']);
								summaryLaborCost += parseFloat(data[i]['LABOR_PRICE']);
								summaryMateCost	 += parseFloat(data[i]['MATE_PRICE']);
								summaryTotal	 += parseFloat(data[i]['TOTAL']);

								if (data[i]['CNTRNO'] == currentContainerNo){
									arrNumeric[currentContainerNo]++;
									sumHours[currentContainerNo] 	 += parseFloat(data[i]['HOURS']);
									sumLaborCost[currentContainerNo] += parseFloat(data[i]['LABOR_PRICE']);
									sumMateCost[currentContainerNo]  += parseFloat(data[i]['MATE_PRICE']);
									sumTotal[currentContainerNo] 	 += parseFloat(data[i]['TOTAL']);
								}
								else{
									currentContainerNo 				 = data[i]['CNTRNO'];
									arrNumeric[currentContainerNo] 	 = 1;
									sumHours[currentContainerNo] 	 = parseFloat(data[i]['HOURS']);
									sumLaborCost[currentContainerNo] = parseFloat(data[i]['LABOR_PRICE']);
									sumMateCost[currentContainerNo]  = parseFloat(data[i]['MATE_PRICE']);
									sumTotal[currentContainerNo] 	 = parseFloat(data[i]['TOTAL']);

									if (data[i]['OPR'] != OPRData){
										OPRData = '*';
									}
								}
							}

							var dataTableSrc = '',
								idxCheck     = 0,
								currentContainerNo,
								checkInsertSum = false;
									
							exportReportTableSrc = '';
							exportReportTableSrc += '<tr>';
								exportReportTableSrc += '<th class="tableTitle1">SQ</th>';
								exportReportTableSrc += '<th class="tableTitle1">DATE OF EST</th>';
								exportReportTableSrc += '<th class="tableTitle1">DATE GATE IN</th>';
								exportReportTableSrc += '<th class="tableTitle1">CONTAINER</th>';
								exportReportTableSrc += '<th class="tableTitle1">SIZE</th>';
								exportReportTableSrc += '<th class="tableTitle1">IT</th>';
								exportReportTableSrc += '<th class="tableTitle1">COMP CODE</th>';
								exportReportTableSrc += '<th class="tableTitle1">COMPONENT DETAILS</th>';
								exportReportTableSrc += '<th class="tableTitle1">LOC</th>';
								exportReportTableSrc += '<th class="tableTitle1">DAM CODE</th>';
								exportReportTableSrc += '<th class="tableTitle1">RP CODE</th>';
								exportReportTableSrc += '<th class="tableTitle1">LTH</th>';
								exportReportTableSrc += '<th class="tableTitle1">WDT</th>';
								exportReportTableSrc += '<th class="tableTitle1">QTY</th>';
								exportReportTableSrc += '<th class="tableTitle1">P</th>';
								exportReportTableSrc += '<th class="tableTitle1">HOURS</th>';
								exportReportTableSrc += '<th class="tableTitle1">LABOR COST</th>';
								exportReportTableSrc += '<th class="tableTitle1">MATERIAL COST</th>';
								exportReportTableSrc += '<thcu class="tableTitle1">TOTAL</th>';
							exportReportTableSrc += '</tr>';

							for (i = 0; i < data.length; i++){
								dataTableSrc += '<tr style="background-color: white!important;">';
								exportReportTableSrc += '<tr style="background-color: white!important;">';
									currentContainerNo = data[i]['CNTRNO'];

									if (idxCheck == 0){
										idx = 1;
									}
									idx++;

									if (idxCheck == 0){
										exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + eSTT++ + '</td>'; 
										exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['ESTIMATEDATE'] ? getDate(data[i]['ESTIMATEDATE']) : '') + '</td>'; 
										exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + getDate(data[i]['GATEIN_DATE']) + '</td>'; 
										exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['CNTRNO'] + '</td>'; 
										exportReportTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['SZTP'] + '</td>'; 

										dataTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + STT++ + '</td>';
										dataTableSrc += '<td  style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['CNTRNO'] + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['SZTP'] + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['OPR'] + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['CONTCONDITION'] + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + getDateTime(data[i]['GATEIN_DATE']) + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + data[i]['ESTIMATENO'] + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['VENDOR_ID'] ? data[i]['VENDOR_ID'] : '') + '</td>';									
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + getDateTime(data[i]['ESTIMATEDATE']) + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>'  + (data[i]['APPRPVALDATE']  ? getDateTime(data[i]['APPRPVALDATE'])  : '') + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['REPAIRDATE']    ? getDateTime(data[i]['REPAIRDATE']) : '') + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['COMPLETEDDATE'] ? getDateTime(data[i]['COMPLETEDDATE']) : '') + '</td>';
										dataTableSrc += '<td style="text-align: center" rowspan=' + arrNumeric[currentContainerNo] + '>' + (data[i]['CANCLEDATE']    ? getDateTime(data[i]['CANCLEDATE']) : '') + '</td>';
									}

									idxCheck++;

									if (i != data.length - 1){
										if (data[i+1]['CNTRNO'] != currentContainerNo){
											idxCheck = 0;
											checkInsertSum = true;
										}
									}
									else{
										checkInsertSum = true;
									}

									
									exportReportTableSrc += '<td style="text-align: center">' + (idx-1) + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['COMP_ID']   ? data[i]['COMP_ID']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + data[i]['COMP_NAME_EN'] + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['LOC_ID']   ? data[i]['LOC_ID']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['DAM_ID']   ? data[i]['DAM_ID']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['REP_ID']   ? data[i]['REP_ID']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['LENGTH']   ? data[i]['LENGTH']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['WIDTH']   ? data[i]['WIDTH']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['QUANTITY']   ? data[i]['QUANTITY']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['PAYERTYPE']   ? data[i]['PAYERTYPE']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['HOURS']   ? data[i]['HOURS']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['LABOR_PRICE']   ? data[i]['LABOR_PRICE']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['MATE_PRICE']   ? data[i]['MATE_PRICE']  : '') + '</td>';
									exportReportTableSrc += '<td style="text-align: center">' + (data[i]['TOTAL']   ? data[i]['TOTAL']  : '') + '</td>';


									dataTableSrc += '<td style="text-align: center">' + (data[i]['COMP_ID']   ? data[i]['COMP_ID']  : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['LOC_ID']    ? data[i]['LOC_ID']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['DAM_ID']    ? data[i]['DAM_ID'] : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['REP_ID']    ? data[i]['REP_ID']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['LENGTH']    ? data[i]['LENGTH']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['WIDTH']     ? data[i]['WIDTH']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['QUANTITY']  ? data[i]['QUANTITY']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['HOURS']     ? data[i]['HOURS']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['LABOR_PRICE']   ? data[i]['LABOR_PRICE']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['MATE_PRICE']    ? data[i]['MATE_PRICE']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['TOTAL']     ? data[i]['TOTAL']    : '') + '</td>';
									dataTableSrc += '<td style="text-align: center">' + (data[i]['PAYERTYPE'] ? data[i]['PAYERTYPE'] : '') + '</td>';
								dataTableSrc += '</tr>';


								if (checkInsertSum){
									exportReportTableSrc += '<tr style="color: red; background-color: white!important;">';
										exportReportTableSrc += '<td colspan="15" style="font-weight: bolder; text-align: right;">TOTAL</td>';
										exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumHours[currentContainerNo].toFixed(2) + '</td>';
										exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumLaborCost[currentContainerNo].toFixed(2) + '</td>';
										exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumMateCost[currentContainerNo].toFixed(2) + '</td>';
										exportReportTableSrc += '<td style="text-align: center; font-weight: bold">' + sumTotal[currentContainerNo].toFixed(2) + '</td>';
									exportReportTableSrc += '</tr>';


									dataTableSrc += '<tr style="color: red; background-color: white!important;">';
										dataTableSrc += '<td colspan="20" style="font-weight: bolder; text-align: right;">TỔNG</td>';
										dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumHours[currentContainerNo].toFixed(2) + '</td>';
										dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumLaborCost[currentContainerNo].toFixed(2) + '</td>';
										dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumMateCost[currentContainerNo].toFixed(2) + '</td>';
										dataTableSrc += '<td style="text-align: center; font-weight: bold">' + sumTotal[currentContainerNo].toFixed(2) + '</td>';
										dataTableSrc += '<td></td>';
									dataTableSrc += '</tr>';
									checkInsertSum = false;
								}
							}

							exportReportTableSrc += '<tr style="color: red; background-color: white!important;">';
								exportReportTableSrc += '<td colspan="15" style="font-weight: bolder; text-align: right;">SUMMARY</td>';
								exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryHours.toFixed(2) + '</td>';
								exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryLaborCost.toFixed(2) + '</td>';
								exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryMateCost.toFixed(2) + '</td>';
								exportReportTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryTotal.toFixed(2) + '</td>';
							exportReportTableSrc += '</tr>';

							dataTableSrc += '<tr style="color: red; background-color: white!important;">';
								dataTableSrc += '<td colspan="20" style="font-weight: bolder; text-align: right;">TỔNG CỘNG</td>';
								dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryHours.toFixed(2) + '</td>';
								dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryLaborCost.toFixed(2) + '</td>';
								dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryMateCost.toFixed(2) + '</td>';
								dataTableSrc += '<td style="text-align: center; font-weight: bolder">' + summaryTotal.toFixed(2) + '</td>';
							dataTableSrc += '</tr>';

							$("#tablecontentTBody").html('');
							$("#tablecontentTBody").html(dataTableSrc);
						}
						else{
							toastr['warning']('Không có dữ liệu cont để nạp!');
							return;
						}

						$($.fn.dataTable.tables(true)).DataTable().columns.adjust();

						$('#reportTitle').html('');
						$('#reportTitle').html('ESTIMATES/INVOICES OF REPAIR FOR ' + OPRData);
						
						$('#laborCostPerHour').html('');
						$('#laborCostPerHour').html('Labor Rate: ' + laborCostPerHour + '/Hour');

						$('#reportTime').html('');
						$('#reportTime').html('From ' + getDateTime($('#txtFormDate').val()) + ' To ' + getDateTime($('#txtToDate').val()));

						$('#contenttable_info').html('');
						$('#contenttable_info').html('Số dòng: ' + rowsNumeric);

						toastr["success"]("Nạp dữ liệu thành công!");
					}
					else {
						toastr["success"]("Không có dữ liệu!");
						return;
					}					
				},
				error: function(err){cu
					toastr["error"]("Error!");
					saveBtn.button('reset');
					$('.page-content.fade-in-up').unblock();
					console.log(err);
				}
			});
		});
		
		$('#deleteAllAdvSearch').on('click', function(){
			$('#containerNoAdvSearch').val('');
			$('#containerNoListAdvSearch').val('');
			$('#showChoosenContainerNoAutoComplete').html('');
		});

		//----AHAO-----
		// function fnExcelReport() {
		// 	var tab_text="<table border='2px'>";
		// 	var textRange; var j=0;
		// 	tab = document.getElementById('contenttable'); // id of table
		// 	//alert($(tab).find("thead tr").html());
		// 	var theader="";
		// 	$(tab).find("thead tr th").each(function(){
		// 		theader+="<td width=200><b>"+$(this).html()+"</b></td>";
		// 	});
		// 	tab_text+="<tr bgcolor='#FFFFFF'>"+theader+"</tr>";
		// 	for(j = 0 ; j < tab.rows.length ; j++) 
		// 	{     
		// 		tab_text+="<tr>"+tab.rows[j].innerHTML+"</tr>";
		// 		//tab_text=tab_text+"</tr>";
		// 	}

		// 	tab_text=tab_text+"</table>";
		// 	tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
		// 	tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
		// 	tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

		// 	var ua = window.navigator.userAgent;
		// 	var msie = ua.indexOf("MSIE "); 

		// 	if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
		// 	{
		// 		txtArea1.document.open("txt/html","replace");
		// 		txtArea1.document.write(tab_text);
		// 		txtArea1.document.close();
		// 		txtArea1.focus(); 
		// 		sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
		// 	}  
		// 	else                 //other browser not tested on IE 11
		// 		sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

		// 	return (sa);
		// }

		// $(document).on("click","#export",function(){
		// 	fnExcelReport();
		// });
	});
</script>

<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>