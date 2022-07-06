<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>

	<!-- Global stylesheets -->
	<link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/core.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/components.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css/colors.css')}}" rel="stylesheet" type="text/css">
	{{-- copied file for search on select box --}}
	 <link rel="stylesheet" href="{{asset('assets/css/selectize.bootstrap3.min.css')}}" rel="stylesheet" type="text/css"> 

	{{-- /copied file for search on select box --}}
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script type="text/javascript" src="{{asset('assets/js/core/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/pages/datatables_sorting.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/pages/dashboard.js')}}"></script>

	<!-- /theme JS files -->
	{{-- Sweet Alert --}}
	<!-- <script src="http://selectize.github.io/selectize.js/"></script> -->
	<script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
	{{-- Sweet Alert --}}
	{{-- copied file for search on select box --}}
	<script src="{{asset('assets/js/selectize.min.js')}}" ></script>

	{{-- /copied file for search on select box --}}
	{{-- included for datatable --}}
	<script type="text/javascript" src="{{asset('assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/select2.min.js')}}"></script>
{{-- for invoice --}}
<script type="text/javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>
{{--  /for invoice--}}
{{-- /included for datatable --}}
<script type="text/javascript" src="{{asset('assets/js/pages/datatables_api.js')}}"></script>                 
	{{-- for invoice --}}
	<script type="text/javascript" src="{{asset('assets/js/pages/invoice_template.js')}}"></script>
	
	{{-- for invoice --}}
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			{{-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a> --}}
			<a class="navbar-brand" href="{{url('/dashboard')}}">Pak Golorious</a>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>


			<ul class="nav navbar-nav navbar-right">
			

				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						{{-- <img src="assets/images/placeholder.jpg" alt=""> --}}
						<span>{{Session::get('username')}}</span>
						<i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="{{url('/logoutuser')}}"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

				


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								
								<li class="active"><a href="{{url('/dashboard')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Employee</span></a>
									<ul>
										<li><a href="{{url('/employee/create')}}">Add Employee</a></li> 
										<li><a href="{{url('/employee')}}">Employees List</a></li> 
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-stack"></i> <span>Supplier</span></a>
									<ul>
										<li><a href="{{url('/supplier/create')}}">Add Supplier</a></li>
										<li><a href="{{url('/supplier')}}">Supplier List</a></li>
										<li><a href="{{url('/SupplierBalanceDetail')}}">Balance Detail</a></li>
										<li><a href="{{url('/supplier')}}">Balance Summary</a></li>
									</ul>
								</li>
								<li>
									<a href="#"><i class="icon-copy"></i> <span>Customer</span></a>
									<ul>
										<li><a href="{{url('/customer/create')}}">Add Customer</a></li>
										<li><a href="{{url('/customer')}}" id="layout2">Customers View</a></li>
									</ul>
								</li>
								{{-- <li>
									<a href="{{url('/warehouse/create')}}"><i class="icon-copy"></i> <span>Add Warehouse</span></a>
								
								</li> --}}

								<li>
									<a href="{{url('/category/create')}}"><i class="icon-droplet2"></i> <span>Add Product</span></a>
									
								</li>
								<li>
									<a href="#"><i class="icon-stack"></i> <span>Purchase</span></a>
									<ul>
										<li>
											<a href="{{url('/purchaseorder/create')}}"><span>Create PurchaseOrder</span></a>
										</li>
										<li>
											<a href="{{url('/purchaseorder')}}"><span>PurchaseOrder List</span></a>

										</li>
										<li><a href="{{url('/PayBillView')}}">Pay Bill</a></li>
										
									</ul>
								</li>
								
								<!-- /main -->

								<!-- Forms -->
								{{-- <li class="navigation-header"><span>Forms</span> <i class="icon-menu" title="Forms"></i></li> --}}
								<li>
									<a href="{{url('/inventory/create')}}"><i class="icon-pencil3"></i> <span>Add Inventory</span></a>
								
								</li>
								{{-- <li>
									<a href="{{url('/quotation/create')}}"><i class="icon-footprint"></i><span>Create Quotation</span></a>
								</li> --}}
								
								<li>
									<a href="#"><i class="icon-stack"></i> <span>Financial & Technical Offers</span></a>
									<ul>
										<li>
											<a href="{{url('/financialOfferView')}}"><span>Create Financial Offer</span></a>
										</li>
										<li>
											<a href="{{url('/getFinancialOffersList')}}"><span>View Financial Offfers</span></a>

										</li>
										<li>
											<a href="{{url('/geTechnicalOffersList')}}"><span>View Technical Offer</span></a>
										</li>
										
									</ul>
								</li>
								{{-- <li>
									<a href=""><i class="icon-stack2"></i> <span>Voucher</span></a>
									<ul>
										<li>
											<a href="{{url('/voucher')}}"><i class="icon-insert-template"></i><span>Cash Receipt Voucher</span></a>

										</li>
										<li>
											<a href="{{url('/payvoucher')}}"><i class="icon-insert-template"></i><span>Cash Payment Voucher</span></a>
										</li>
										
										<li>
											<a href="{{url('/general')}}"><i class="icon-insert-template"></i><span>General Voucher</span></a>
										</li>
										
									</ul>
								</li> --}}
								

								<!-- <li>
									<a href=""><i class="icon-stack2"></i> <span>Accounting</span></a>
									<ul>
										<li>
											<a href="{{url('/ViewNewSubAccountForm')}}"><i class="icon-insert-template"></i><span>Create New Account</span></a>

										</li>
										{{-- <li>
											<a href="{{url('/payvoucher')}}"><i class="icon-insert-template"></i><span>Cash Payment Voucher</span></a>
										</li> --}}
										{{-- <li>
											<a href="{{url('/getstocktransactionview')}}"><i class="icon-insert-template"></i><span>Stock out</span></a>
										</li> --}}
										<li>
											<a href="{{url('/generalvoucher')}}"><i class="icon-insert-template"></i><span>General Voucher</span></a>
										</li>
										
									</ul>
								</li> -->
								



								{{-- <li>
									<a href="{{url('/quotation')}}"><i class="icon-insert-template"></i><span>Quotation View</span></a>
								</li> --}}
								<li>
									<a href="{{url('/item')}}"><i class="icon-insert-template"></i><span>Item List</span></a>
								</li>
								{{-- <li>
									<a href="{{url('/invoice')}}"><i class="icon-insert-template"></i><span>Invoices View</span></a>
								</li> --}}
								{{-- <li>
									<a href="{{url('/print')}}"><i class="icon-insert-template"></i><span>Print Envelope</span></a>
								</li> --}}
								<li>
									<a href=""><i class="icon-stack2"></i> <span>Reports</span></a>
									<ul>
										<li>
											<a href="{{url('/ItemDetailedReport')}}"><i class="icon-insert-template"></i><span>ItemDetailedReport</span></a>

										</li>
			
										<li>
											<a href="{{url('/inventory')}}"><i class="icon-insert-template"></i><span>Inventory Lists</span></a>
										</li>
										{{-- <li>
											<a href="{{url('/getstocktransactionview')}}"><i class="icon-insert-template"></i><span>Stock out</span></a>
										</li> --}}
										<li>
											<a href="{{url('/getstockintransactionview')}}"><i class="icon-insert-template"></i><span>Stock in</span></a>
										</li>
										<li>
											<a href="{{url('/ledger/create')}}"><i class="icon-insert-template"></i><span>Ledger Debit</span></a>
										</li>
										<li>
											<a href="{{url('/getCreditDetailsFromLedger')}}"><i class="icon-insert-template"></i><span>Customer Ledger Credit</span></a>
										</li>
										<li>
											<a href="{{url('/getCreditDetailsbetweendates')}}"><i class="icon-insert-template"></i><span>Ledger Credit Report</span></a>
										</li>
										<li>
											<a href="{{url('/getCustomersRemaining')}}"><i class="icon-insert-template"></i><span>Customers Remaining</span></a>
										</li>
										<li>
											<a href="{{url('/getCustomerLedger')}}"><i class="icon-insert-template"></i><span>Indiviual Customer Ledger </span></a>
										</li>
									</ul>
								</li>
							<li>
							<a href="#"><i class="icon-stack2"></i> <span>Deliver Challan</span></a>
							<ul>
							{{-- <li>
							<a href="{{url('/Delivery/create')}}"><i class="fas fa-truck"></i></i><span>Dilevery Challan</span></a>
							</li> --}}
							<li>
							<a href="{{url('/Delivery')}}"><i class="fa fa-file-invoice"></i></i><span>Dilevery Records</span></a>
							</li>

									</ul>
								</li>

							<li>
								<a href="#"><i class="icon-stack2"></i> <span>Invoices</span></a>
								<ul>
									<li>
									<a href="{{url('/createInvoice')}}"><i class="fas fa-truck"></i></i><span>Create Invoice</span></a>
									</li>
									<li>
									<a href="{{url('/invoicesList')}}"><i class="fa fa-file-invoice"></i></i><span>Invoices List</span></a>
									</li>

								</ul>
							</li>
								<!-- /forms -->

								<li>
									<a href="{{url('/registeruser')}}"><i class="icon-droplet2"></i> <span>Create Account</span></a>
									
								</li>

							</ul>
							
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

            
			<!-- Main content -->
			<div class="content-wrapper">



				<!-- Content area -->
				<div class="content">


                    @yield('content')



					{{-- <!-- Footer -->
					<div class="footer text-muted">
						<!-- &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a> -->
					</div>
					<!-- /footer --> --}}

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
