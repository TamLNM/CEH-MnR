<!DOCTYPE html>
<html lang="en">
<head>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title><?=$title;?></title>
    <!--    favicon-->
    <link rel="icon" href="<?=base_url('assets/img/icons/favicon.ico');?>" type="image/ico">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?=base_url('assets/vendors/jquery-ui/jquery-ui.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/vendors/line-awesome/css/line-awesome.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/vendors/themify-icons/css/themify-icons.css');?>" rel="stylesheet" />

    <link href="<?=base_url('assets/vendors/jquery-confirm/jquery-confirm.min.css');?>" rel="stylesheet" />

    <!-- PLUGINS STYLES-->
    <link href="<?=base_url('assets/vendors/dataTables/datatables.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/vendors/dataTables/jquery.dataTables.min.css');?>" rel="stylesheet" />
    <!--    DATATABLES SCROLL-->
    <link href="<?=base_url('assets/vendors/dataTables/scroller.dataTables.min.css');?>" rel="stylesheet" />

    <link href="<?=base_url('assets/vendors/toastr/toastr.min.css');?>" rel="stylesheet" type="text/css" />

    <!--    CUSTOMIZE FOR DATATABLES-->
    <link href="<?=base_url('assets/css/custom.datatables.css');?>" rel="stylesheet" />

    <!-- THEME STYLES-->
    <link href="<?=base_url('assets/css/main.min.css');?>" rel="stylesheet" />
    <link href="<?=base_url('assets/css/ro2.css');?>" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
	
	<!-- CORE PLUGINS-->
    <script src="<?=base_url('assets/vendors/popper.js/dist/umd/popper.min.js');?>"></script>
    
    <script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/jquery/dist/jquery2-1-4.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/jquery-ui/jquery-ui.js');?>"></script>
    <script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/metisMenu/dist/metisMenu.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/jquery-validation/dist/jquery.validate.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/jquery-confirm/jquery-confirm.min.js');?>"></script>

    <script src="<?=base_url('assets/vendors/moment/min/moment.min.js');?>"></script>
    
    <script src="<?=base_url('assets/js/contextmenu.js');?>"></script>

    <link href="<?=base_url('assets/vendors/datetimepicker/jquery-ui-timepicker-addon.css');?>" rel="stylesheet" />
    <script src="<?=base_url('assets/vendors/datetimepicker/jquery-ui-timepicker-addon.js');?>"></script>

    <!--    custom for eblling js-->
    <script src="<?=base_url('assets/js/ro2.js');?>"></script>
    <script src="<?=base_url('assets/js/datatables.ext.js');?>"></script>
    
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?=base_url('assets/vendors/dataTables/datatables.min.js');?>"></script>

    <!--    TABLES SCROLL-->
    <script src="<?=base_url('assets/vendors/dataTables/dataTables.scroller.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vendors/dataTables/extensions/key_table.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vendors/dataTables/extensions/mindmup-editabletable.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vendors/dataTables/extensions/numeric-input-example.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vendors/dataTables/extensions/autofill.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vendors/dataTables/extensions/scroller.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vendors/dataTables/extensions/select.min.js');?>"></script>
    <script type="text/javascript" src="<?=base_url('assets/vendors/dataTables/extensions/buttons.min.js');?>"></script>

    <!-- Toastr js -->
    <script src="<?=base_url('assets/vendors/toastr/toastr.min.js');?>"></script>

    <!-- Loader -->
    <script src="<?=base_url('assets/vendors/loaders/blockui.min.js');?>"></script>
    <script src="<?=base_url('assets/vendors/loaders/progressbar.min.js');?>"></script>

    <!-- Socket -->
    <script src="<?=base_url('/sockets/node_modules/socket.io-client/dist/socket.io.js');?>"></script>

    <script type="text/javascript">
        var socket = io.connect('https://demororo.cehsoft.com/');
    </script>
	
	<link href="<?=base_url('assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css');?>" rel="stylesheet" />

    <link href="<?=base_url('assets/vendors/select2/dist/css/select2.min.css');?>" rel="stylesheet" />
    <script type="text/javascript" src="<?=base_url('assets/vendors/select2/dist/js/select2.full.min.js');?>"></script>

	<style>
		@media (max-width: 767px) {
			.f-text-right    {
				text-align: right;
			}
		}
		.no-pointer{
			pointer-events: none;
		}

		input[type="text"]:focus{
			background-color: #f6fcff;
		}
		.top-bar{
			position: relative;
			background-color: white;
			height: 45px;
			margin: 0;
		}
		.right-btn-group{
			position: absolute;
			top: 7px;
			right: 10px;
		
		}
		.mainTittle{
			color: white;
			font-size: 1.25vw;
			margin-top: 0;
			margin-bottom: 0;
			padding-top: 10px;
			height: 100%;
   			display: table;
   			width: 100%;
   			background-color: #207b99;
   			position: relative;
			height: 45px;
		}
		.btn{
			margin-right: 15px;
		}
		.user-info{
			position: absolute;
			top: 7px;
			left: 47%!important;
			font-size: 18px;
			color: #005b7f;
		}
		.screen-name{
			position: absolute;
			top: 70px;
			left: 43%;
			font-size: 50%;
			color: #ffffff;
		}
		.body-content{
			position: relative;
			top: 0.6rem;
			left: 0%;
			right: 0%
		}
		.buttonGroup{
			margin-left: auto!important;
			margin-right: auto!important;
		}
		.button-search{ 
			font-family: Times New Roman; 
			border-radius: 5px; 
			height: 2rem; 
			width: 6.5vw; 
			border: white solid 1px; 
			color: white; 
			background-color: #207b99; 
			margin-top: 0.8rem;
			margin-left: 10px;
		}
		.input{
			height: 28px; 
			font-size: 12px; 
			padding-left: 11px; 
			border-radius: 5px!important;
			width: 49%;
			border: 1px solid rgba(0,0,0,.15);
		}
		.input2{
			height: 28px; 
			font-size: 12px; 
			padding-left: 11px; 
			border-radius: 5px!important;
			width: 100%;
			border: 1px solid rgba(0,0,0,.15);
		}
	</style>
</head>
<body style="background-color: #f2f4f8;">
	<div class="col-xl-12 top-bar">
		<div class="row">
			<div class="left-btn-group col-9" style="text-align: center;">
				<div class="row">
					<div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 mainTittle"><b>GATE INSPECTOR</b></div>
					<div class="col-xl-10 col-lg-10 col-md-9 col-sm-9">
						<div class="row form-group" style="margin-left: auto; margin-right: auto;">
							<label style="margin-top: 1em; margin-right: 1rem; margin-left: auto; font-weight: bold">PinCode</label>
							<div style="margin-top: 0.8em; width: 7.5vw;">
								<input id="" style="height: 28px; padding-left: 11px; border-radius: 5px; border: solid 1px #eee" placeholder="Pin code" type="text">
							</div>
							<label style="margin-top: 1em; margin-left: 1rem;; margin-right: 1rem; font-weight: bold">Container</label>
							<div style="margin-top: 0.8em; width: 7.5vw;">							
								<input id="" style="height: 28px; padding-left: 11px; border-radius: 5px; border: solid 1px #eee" placeholder="Số container" type="text">
							</div>
							<button id="" class="button-search">
								<p style="font-style: italic; margin-top: auto; margin-bottom: auto">Nạp dữ liệu</p>
							</button>
							<!--
							<button id="" style="font-family: Times New Roman; 
												border-radius: 5px;
												height: 2rem; 
												width: 4.5vw; 
												border: #207b99 solid 1px; 
												color: #207b99; 
												margin-top: 0.8rem;
												background-color: white;
												margin-left: 10px;">
								<p style="margin-top: auto; margin-bottom: auto">CLEAR</p>
							</button>
							<button id="estimated_container_list" style="font-family: Times New Roman; 
												border-radius: 5px;
												height: 2rem; 
												width: 12vw; 
												border: #207b99 solid 1px; 
												color: #207b99; 
												margin-top: 0.8rem;
												background-color: white;
												margin-right: auto;
												margin-left: 10px;">
								<p style="margin-top: auto; margin-bottom: auto">DS CONT GIÁM ĐỊNH</p>
							</button>
							-->
							<button title="clear" class="btn btn-sm btn-danger btn-icon-only btn-circle btn-air" style="margin-left: 100px; margin-top: 3px;"><i class="las la-broom"></i></button>
							<button id="estimated_container_list" title="Danh sách Cont giám định" class="btn btn-sm btn-success btn-icon-only btn-circle btn-air" style="margin-left: 5px; margin-top: 3px;"><i class="ti-list"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="right-btn-group col-3">
				<div style="float: right;">
					<ul id="right-out" class="nav navbar-toolbar">
                    	<li class="dropdown dropdown-user">
							<a id="user-info" class="nav-link dropdown-toggle link" style="font-size: 1vw; padding-right: 0; color: #207b99; ">
		                	Người dùng: &ensp;<span id="user_fullname"><?=$this->session->userdata('FullName');?></span>
		                	<span id="user_name" style="display: none;"><?=$this->session->userdata('UserID');?></span>
		            		</a>
		            	</li>
 						<li>
				           <a id="alogout" class="d-flex align-items-center ml-2" title="Đăng xuất" href="<?=site_url(md5('user') . '/' . md5('logout'));?>" style="margin-top: 0.75rem; height: 1.25vw"><i class="ti-shift-right" style="color: #207b99"></i></a>
		            	</li>
		            </ul>		
				</div>
			</div>		
		</div>
	</div>
	<div class="body-content">
		<div class="col-xl-12" style="background-color: #f2f4f8; font-size: 0.95rem">
			<div class="ibox collapsible-box">
				<form class=" mt-0 pt-0 pb-0" style="background-color: #f2f4f8;" id="inputForm">
					<div class="row mt-3">
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" style="background-color: #f2f4f8;" >
							<div class="pt-0 pb-0"  style="padding: 5px 7.5px 5px 15px;">
								<div class="row ibox pb-0 " id="xxx">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
										<div class="row" style="text-align: center; background-color: #207b99; color: #ffffff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">	
												<label class="col-md-12 col-sm-6 col-xs-6 col-form-label">
													<b>THÔNG TIN CONTAINER</b>
												</label>
										</div>
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Hãng khai thác</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Kích cỡ/ISO</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>										
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">F/E</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Trọng lượng</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>		
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Loại hàng</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Vị trí bãi</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>		
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Niêm chì</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Niêm chì 1</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>				
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Nhiệt độ</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Vent/Vent Unit</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>		
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Class/UNNo</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">OOG</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="width: 45%; height: 28px; font-size: 12px; padding-left: 11px; float: left;" class="form-control" placeholder="" type="text">
														<label style="float: left; margin-left: 5px; margin-right: 5px;">-</label>

														<input id="" style="width: 45%; height: 28px; font-size: 12px; padding-left: 11px; float: left;" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>				
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" style="background-color: #f2f4f8;" >
							<div class="pt-0 pb-0"  style="padding: 5px 7.5px 5px 7.5px;">
								<div class="row ibox pb-0 border-e" id="yyy">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
										<div class="row" style="text-align: center; background-color: #207b99; color: #ffffff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">	
												<label class="col-md-12 col-sm-6 col-xs-6 col-form-label">
													<b>THÔNG TIN LỆNH</b>
												</label>
										</div>
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Phương án</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Hạn lệnh</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>									
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">BK/BL</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Hạn điện</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>		
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Số xe</label>
													<label class="col-md-6 col-sm-6 col-xs-6 col-form-label">Số Remooc</label>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
													<div class="col-md-6 col-sm-6 col-xs-6">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>				
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Tàu/Chuyến</label>
													<div class="col-md-12 col-sm-12 col-xs-12">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>	
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Ghi chú lệnh</label>
													<div class="col-md-12 col-sm-12 col-xs-12">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>		
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;" hidden="">
												<div class="row form-group">											
												</div>
											</div>
										</div>				
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12" style="background-color: #f2f4f8;" >
							<div class="pt-0 pb-0"  style="padding: 5px 15px 5px 7.5px;">
								<div class="row ibox pb-0 border-e" id="zzz">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-2">
										<div class="row" style="text-align: center; background-color: #207b99; color: #ffffff; border-top-left-radius: 5px; border-top-right-radius: 5px; border-bottom-left-radius: 0; border-bottom-right-radius: 0;">	
												<label class="col-md-12 col-sm-6 col-xs-6 col-form-label">
													<b>THÔNG TIN KIỂM TRA</b>
												</label>
										</div>
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Tình trạng vỏ</label>				
													<div class="col-md-12 col-sm-12 col-xs-12">
														<input id="" style="height: 28px; font-size: 12px; padding-left: 11px" class="form-control" placeholder="" type="text">
													</div>
												</div>
											</div>
										</div>		
										<div class="row" style="height: 130px;">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Tình trạng container</label>	
													<div class="col-md-12 col-sm-12 col-xs-12">
														<textarea id="" style="border: 1px solid #eee; border-radius: 5px; width: 100%" rows="5" cols="50"></textarea>
													</div>
												</div>
											</div>
										</div>																
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-1" style="height: 55px;">
												<div class="row form-group">
													<button id="" style="font-size: 1.25rem; 
																font-family: Times New Roman; 
																border-radius: 5px; 
																height: 3rem; 
																width: 15vw; 
																border: white solid 1px; 
																color: white; 
																background-color: #207b99; 
																margin-top: 0.8rem;
																margin-left: auto;
																margin-right: 12.5px;">
													XÁC NHẬN</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>			
					</div>
				</form>	
			</div>
		</div>
	</div>
</body>

<div class="modal fade" id="estimated-container-modal" tabindex="-1" role="dialog" aria-labelledby="groups-modalLabel-1" aria-hidden="true" data-whatever="id" style="padding-left: auto; padding-right: auto;">
    <div class="modal-dialog" role="document" style="min-width: 60vw!important;">
        <div class="modal-content" style="border-radius: 10px!important;">
            <div class="modal-header">
                <h5 class="modal-title text-gradient-peach" id="groups-modalLabel-1" style="color: #207b99"><b>DANH SÁCH CONTAINER GIÁM ĐỊNH</b></h5>
				<button id="export" class="btn btn-outline-dark btn-sm btn-loading mr-1 mt-1 mb-1" 
                                            data-loading-text="<i class='la la-file'></i>Xuất Excel"
                                            title="Xuất Excel">
                        <span class="btn-icon"><i class="la la-file"></i>Xuất Excel</span>
                </button> 
            </div>
            <div class="modal-body" style="padding: 0 10px 0 10px!important;">    
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0" style="border-bottom: solid 1px #eee">
					<div class="row mb-0 ml-1 mr-1">
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
							<div class="row">
								<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Truy vấn</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input id="txtFormDate" class="input" attrX="FormDate" placeholder="Từ ngày" type="text" readonly>
									<input id="txtToDate" class="input" attrX="ToDate" placeholder="Đến ngày" type="text" readonly>
								</div>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mb-2">
							<div class="row">
								<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Container</label>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input id="" class="input2" attrX="" placeholder="Số container" type="text" readonly>
								</div>
								
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
							<div class="row">
								<label class="col-md-12 col-sm-12 col-xs-12 col-form-label">Phương án</label>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<select id="qqq" attrX="" style="width: 100%; border: 1px solid rgba(0,0,0,.15); height: 28px; border-radius: 5px;" data-width="100%" data-style="btn-default btn-sm">
										<option value="*" selected>*</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6">
									<button id="" style="background-color: #207b99; color: white; background-color: #207b99; border-radius: 5px; border: 1px solid #207b99; width: 100%; font-family: Times New Roman;"><i>Nạp dữ liệu</i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0 pr-0">
					<div style="margin-left: 10px; margin-right: 10px; margin-top: 5px;">
		            	<table id="tbl_estimated_container" class="table table-striped display nowrap" cellspacing="0" style="width: 98.5%;">
							<thead>
								<tr>
									<th class="editor-cancel" col-name="STT">STT</th>
									<th col-name="">Container</th>
									<th col-name="">Pincode</th>
									<th col-name="">Số lệnh</th>
									<th col-name="">Hãng tàu</th>
									<th col-name="">Kích cỡ</th>
									<th col-name="">Phương án</th>
									<th col-name="">Người thực hiện</th>
									<th col-name="">Ngày giám định</th>
									<th col-name="">Tình trạng vỏ</th>
									<th col-name="">Tình trạng container</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="inqrbox">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Qr Code</h4>
					</div>
					<div class="modal-body" id="print_box" style="position: static">
						<div id="interactive" class="viewport"></div>
						<div class="error"></div>
					</div>
					<div class="modal-footer">
					<button id="print_btn" type="button" class="btn btn-primary pull-left" data-dismiss="modal">In</button>				
						<button type="button" class="btn btn-primary" data-dismiss="modal">Đóng</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->


<script type="text/javascript">
    $(document).ready(function () {
    	var tblEstimatedContainer = $('#tbl_estimated_container'),
    		_estimatedContainerColumns = ['STT', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];

    	var dataTbl = tblEstimatedContainer.newDataTable({
			scrollY: '55vh',
			columnDefs: [
				{ type: "num", className: "text-center", targets: _estimatedContainerColumns.indexOf('STT') },
				{ className: "text-center", targets: _estimatedContainerColumns.getIndexs(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'])},
			],
			order: [[ _estimatedContainerColumns.indexOf('STT'), 'asc' ]],
			paging: false,
			keys: true,
            autoFill: {
                focus: 'focus'
            },
            select: true,
            rowReorder: false,
            arrayColumns: _estimatedContainerColumns
		});

    	$('#estimated_container_list').on('click', function(){
    		$('#estimated-container-modal').modal('show');
    	});

    	$("#yyy, #zzz").css("height", $("#xxx").height());
		//$('#qqq').select2();
	
        $('[data-action="reloadUI"]').on('click', function (e) {
            var block = $(this).attr('data-reload-target');
            $(block).block({ 
                message: '<i class="la la-spinner spinner"></i>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait',
                    'box-shadow': '0 0 0 1px #ddd'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'none'
                }
            });
        });
    });
</script>
</html>

<script src="<?=base_url('assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js');?>"></script>

<script>
    var resizefunc = [];

    $.extend( true, $.fn.dataTable.defaults, {
        language: {
            info: "Số dòng: _TOTAL_",
            emptyTable: "------------ Không có dữ liệu hiển thị ------------",
            infoFiltered: "(trên _MAX_ dòng)",
            infoEmpty: "Số dòng: 0",
            search: '<span>Tìm:</span> _INPUT_',
            zeroRecords:    "------------ Không có dữ liệu được tìm thấy ------------",
            sThousands: ",",
            sDecimal: ".",
            select: {
                rows: {
                    _: "Đã chọn %d dòng",
                    0: ""
                }
            }
        },
        search: {
            regex: true
        },
        info: true,
        orderClasses: false,
        paging: false,
        scrollY: 419,
        scrollX: true,
        lengthChange: false,
        scrollCollapse: false,
        deferRender: true,
        processing: true,
        autoWidth: true,
        dom: '<"datatable-header"fl<"datatable-info-right"Bip>><"datatable-scroll-wrap"t>',
        buttons: [
            {extend: 'selectAll', text: 'Chọn tất cả', className: 'btn btn-xs btn-default'},
            {extend: 'selectNone', text: 'Bỏ chọn', className: 'btn btn-xs btn-default'}
        ],
        destroy: true
    });
</script>
