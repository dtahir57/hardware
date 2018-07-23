<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>@yield('admin-title')</title>
	<meta name="description" content="Winkle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Winkle Admin, Winkleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link href="{{ asset('bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
	<!-- Data table CSS -->
	<link href="{{ asset('bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- Toast CSS -->
	<link href="{{ asset('bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">
	
	<!-- Morris Charts CSS -->
    <link href="{{ asset('bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- bootstrap-select CSS -->
	<link href="{{ asset('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>	
	
	
	<!-- vector map CSS -->
	<link href="{{ asset('vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}">
	
	<!-- Custom CSS -->
	<link href="{{ asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active navbar-top-light" id="app">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="{{ asset('images/logo.png')}}" style="width: 100% auto; height: 50px;" alt="brand"/>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="ti-align-left"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="ti-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="ti-more"></i></a>
				<form id="search_form" role="search" class="top-nav-search collapse pull-left">
					<div class="input-group">
						<input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
						<span class="input-group-btn">
						<button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="ti-search"></i></button>
						</span>
					</div>
				</form>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li>
						<a id="open_right_sidebar" href="#"><i class="ti-settings  top-nav-icon"></i></a>
					</li>
					<li class="dropdown app-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-view-grid top-nav-icon"></i></a>
						<ul class="dropdown-menu app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
							<li>
								<div class="app-nicescroll-bar">
									<ul class="app-icon-wrap pa-10">
										<li>
											<a href="weather.html" class="connection-item">
											<i class="zmdi zmdi-cloud-outline txt-info"></i>
											<span class="block">weather</span>
											</a>
										</li>
										<li>
											<a href="inbox.html" class="connection-item">
											<i class="zmdi zmdi-email-open txt-success"></i>
											<span class="block">e-mail</span>
											</a>
										</li>
										<li>
											<a href="calendar.html" class="connection-item">
											<i class="zmdi zmdi-calendar-check txt-primary"></i>
											<span class="block">calendar</span>
											</a>
										</li>
										<li>
											<a href="vector-map.html" class="connection-item">
											<i class="zmdi zmdi-map txt-danger"></i>
											<span class="block">map</span>
											</a>
										</li>
										<li>
											<a href="chats.html" class="connection-item">
											<i class="zmdi zmdi-comment-outline txt-warning"></i>
											<span class="block">chat</span>
											</a>
										</li>
										<li>
											<a href="contact-card.html" class="connection-item">
											<i class="zmdi zmdi-assignment-account"></i>
											<span class="block">contact</span>
											</a>
										</li>
									</ul>
								</div>	
							</li>
							<li>
								<div class="app-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> more </a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown full-width-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-align-center top-nav-icon"></i></a>
						<ul class="dropdown-menu mega-menu pa-0" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
							<li class="product-nicescroll-bar row">
								<ul class="pa-20">
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="index.html"><div class="pull-left"><i class="ti-dashboard  mr-20"></i><span class="right-nav-text">Analytical</span></div><div class="clearfix"></div></a>
										<a href="index2.html"><div class="pull-left"><i class="ti-money  mr-20"></i><span class="right-nav-text">Cryptocurrency</span></div><div class="pull-right"><span class="label label-success">Hot</span></div><div class="clearfix"></div></a>
										<a href="profile.html"><div class="pull-left"><i class="ti-briefcase  mr-20"></i><span class="right-nav-text">Profile</span></div><div class="clearfix"></div></a>
									</li>
									<li class="col-md-3 col-xs-6 col-menu-list">
										<a href="javascript:void(0);">
											<div class="pull-left">
												<i class="ti-shopping-cart  mr-20"></i><span class="right-nav-text">E-Commerce</span>
											</div>	
											<div class="pull-right"><i class="ti-angle-down"></i></div>
											<div class="clearfix"></div>
										</a>
										<hr class="light-grey-hr ma-0"/>
										<ul>
											<li>
												<a href="e-commerce.html">Dashboard</a>
											</li>
											<li>
												<a href="product.html">Products</a>
											</li>
											<li>
												<a href="product-detail.html">Product Detail</a>
											</li>
											<li>
												<a href="add-products.html">Add Product</a>
											</li>
											<li>
												<a href="product-orders.html">Orders</a>
											</li>
											<li>
												<a href="product-cart.html">Cart</a>
											</li>
											<li>
												<a href="product-checkout.html">Checkout</a>
											</li>
										</ul>
									</li>
									<li class="col-md-6 col-xs-12 preview-carousel">
										<a href="javascript:void(0);"><div class="pull-left"><span class="right-nav-text">latest products</span></div><div class="clearfix"></div></a>
										<hr class="light-grey-hr ma-0"/>
										<div class="product-carousel owl-carousel owl-theme text-center">
											<a href="#">
												<img src="../img/chair.jpg" alt="chair">
												<span>Circle chair</span>
											</a>
											<a href="#">
												<img src="../img/chair2.jpg" alt="chair">
												<span>square chair</span>
											</a>
											<a href="#">
												<img src="../img/chair3.jpg" alt="chair">
												<span>semi circle chair</span>
											</a>
											<a href="#">
												<img src="../img/chair4.jpg" alt="chair">
												<span>wooden chair</span>
											</a>
											<a href="#">
												<img src="../img/chair2.jpg" alt="chair">
												<span>square chair</span>
											</a>								
										</div>
									</li>
								</ul>
							</li>	
						</ul>
					</li>
					<li class="dropdown alert-drp">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="ti-bell top-nav-icon"></i><span class="top-nav-icon-badge">5</span></a>
						<ul  class="dropdown-menu alert-dropdown" data-dropdown-in="bounceIn" data-dropdown-out="bounceOut">
							<li>
								<div class="notification-box-head-wrap">
									<span class="notification-box-head pull-left inline-block">notifications</span>
									<a class="txt-danger pull-right clear-notifications inline-block" href="javascript:void(0)"> clear all </a>
									<div class="clearfix"></div>
									<hr class="light-grey-hr ma-0"/>
								</div>
							</li>
							<li>
								<div class="streamline message-nicescroll-bar">
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-green">
												<i class="ti-briefcase "></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">
												New subscription created</span>
												<span class="inline-block font-11  pull-right notifications-time">2pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Your customer subscribed for the basic plan. The customer will pay $25 per month.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-yellow">
												<i class="zmdi zmdi-trending-down"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-warning">Server #2 not responding</span>
												<span class="inline-block font-11 pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Some technical error occurred needs to be resolved.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-blue">
												<i class="zmdi zmdi-email"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">2 new messages</span>
												<span class="inline-block font-11  pull-right notifications-time">4pm</span>
												<div class="clearfix"></div>
												<p class="truncate"> The last payment for your G Suite Basic subscription failed.</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="sl-avatar">
												<img class="img-responsive" src="../img/avatar.jpg" alt="avatar"/>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications">Sandy Doe</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
											</div>
										</a>	
									</div>
									<hr class="light-grey-hr ma-0"/>
									<div class="sl-item">
										<a href="javascript:void(0)">
											<div class="icon bg-red">
												<i class="zmdi zmdi-storage"></i>
											</div>
											<div class="sl-content">
												<span class="inline-block capitalize-font  pull-left truncate head-notifications txt-danger">99% server space occupied.</span>
												<span class="inline-block font-11  pull-right notifications-time">1pm</span>
												<div class="clearfix"></div>
												<p class="truncate">consectetur, adipisci velit.</p>
											</div>
										</a>	
									</div>
								</div>
							</li>
							<li>
								<div class="notification-box-bottom-wrap">
									<hr class="light-grey-hr ma-0"/>
									<a class="block text-center read-all" href="javascript:void(0)"> read all </a>
									<div class="clearfix"></div>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="../img/user1.png" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							<li>
								<a href="#"><i class="zmdi zmdi-card"></i><span>my balance</span></a>
							</li>
							<li>
								<a href="inbox.html"><i class="zmdi zmdi-email"></i><span>Inbox</span></a>
							</li>
							<li>
								<a href="#"><i class="zmdi zmdi-settings"></i><span>Settings</span></a>
							</li>
							<li class="divider"></li>
							<li class="sub-menu show-on-hover">
								<a href="#" class="dropdown-toggle pr-0 level-2-drp"><i class="zmdi zmdi-check text-success"></i> available</a>
								<ul class="dropdown-menu open-left-side">
									<li>
										<a href="#"><i class="zmdi zmdi-check text-success"></i><span>available</span></a>
									</li>
									<li>
										<a href="#"><i class="zmdi zmdi-circle-o text-warning"></i><span>busy</span></a>
									</li>
									<li>
										<a href="#"><i class="zmdi zmdi-minus-circle-outline text-danger"></i><span>offline</span></a>
									</li>
								</ul>	
							</li>
							<li class="divider"></li>
							<li>
								<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<hr/>
				</li>
				<li>
					<a class="{{(Request::is('home')? 'active': '')}}" href="{{ route('home') }}">
						<div class="pull-left">
							<i class="ti-dashboard  mr-20"></i>
							<span class="right-nav-text">Analytical</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@if(auth::user()->can('View_Category'))
				<li>
					<a class="{{(Request::is('admin/categories')? 'active': '')}}
							  {{(Request::is('admin/categories/create')? 'active': '')}}
							  {{(Request::is('admin/categories/'.request()->route('id').'/edit')? 'active': '')}}" href="{{ route('category.index') }}">
						<div class="pull-left">
							<i class="ti-tag  mr-20"></i>
							<span class="right-nav-text">Categories</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@endif
				@if(auth::user()->can('View_Product'))
				<li>
					<a class="{{(Request::is('admin/products')? 'active': '')}}
							  {{(Request::is('admin/products/create')? 'active': '')}}" href="{{ route('product.index') }}">
						<div class="pull-left">
							<i class="ti-package  mr-20"></i>
							<span class="right-nav-text">Products</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@endif
				@if(auth::user()->can('View_Manufacturer'))
				<li>
					<a class="{{(Request::is('admin/manufacturers')? 'active': '')}}
							  {{(Request::is('admin/manufacturers/create')? 'active': '')}}
							  {{(Request::is('admin/manufacturers/'.request()->route('id').'/edit')? 'active': '')}}" href="{{ route('manufacturer.index') }}">
						<div class="pull-left">
							<i class="ti-ruler-pencil mr-20"></i>
							<span class="right-nav-text">Manufacturers</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@endif
				@if(auth::user()->can('View_Attribute'))
				<li>
					<a class="{{(Request::is('admin/attributes')? 'active': '')}}
							  {{(Request::is('admin/attributes/create')? 'active': '')}}
							  {{(Request::is('admin/attributes/'.request()->route('id').'/edit')? 'active': '')}}" href="{{ route('attribute.index') }}">
						<div class="pull-left">
							<i class="ti-panel mr-20"></i>
							<span class="right-nav-text">Attributes</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@endif
				@if(auth::user()->can('View_Tag'))
				<li>
					<a class="{{(Request::is('admin/tags')? 'active': '')}}
							  {{(Request::is('admin/tags/create')? 'active': '')}}
							  {{(Request::is('admin/tags/'.request()->route('id').'/edit')? 'active': '')}}" href="{{ route('tag.index') }}">
						<div class="pull-left">
							<i class="ti-tag mr-20"></i>
							<span class="right-nav-text">Tags</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@endif
				@if(auth::user()->can('View_Badge'))
				<li>
					<a class="{{(Request::is('admin/badges')? 'active': '')}}
							  {{(Request::is('admin/badges/create')? 'active': '')}}
							  {{(Request::is('admin/badges/'.request()->route('id').'/edit')? 'active': '')}}" href="{{ route('badge.index') }}">
						<div class="pull-left">
							<i class="ti-medall mr-20"></i>
							<span class="right-nav-text">Badges</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@endif
				@if(auth::user()->can('View_Unit'))
				<li>
					<a class="{{(Request::is('admin/units')? 'active': '')}}
							  {{(Request::is('admin/units/create')? 'active': '')}}
							  {{(Request::is('admin/units/'.request()->route('id').'/edit')? 'active': '')}}" href="{{ route('unit.index') }}">
						<div class="pull-left">
							<i class="ti-clip mr-20"></i>
							<span class="right-nav-text">Units</span>
						</div>
						<div class="clearfix"></div>
					</a>
				</li>
				@endif
				<li>
					<a class="{{ (Request::is('admin/permissions')? 'active': '') }}
							  {{ (Request::is('admin/permissions/create')? 'active': '') }}
							  {{ (Request::is('admin/permissions/'.request()->route('id').'/edit')? 'active': '') }}
							  {{ (Request::is('admin/roles')? 'active': '') }}
							  {{ (Request::is('admin/roles/create')? 'active': '') }}
							  {{ (Request::is('admin/roles/'.request()->route('id').'/edit')? 'active': '') }}
							  {{ (Request::is('admin/users')? 'active': '') }}
							  {{ (Request::is('admin/users/create')? 'active': '') }}
							  {{ (Request::is('admin/users/'.request()->route('id').'/edit')? 'active': '') }}" href="javascript:void(0);" data-toggle="collapse" data-target="#user_management"><div class="pull-left"><i class="ti-user  mr-20"></i><span class="right-nav-text">User Management</span></div><div class="pull-right"><i class="ti-angle-down"></i></div><div class="clearfix"></div></a>
					<ul id="user_management" class="collapse collapse-level-1">
						<li>
							<a class="{{ (Request::is('admin/permissions')? 'active-page': '') }}
									  {{ (Request::is('admin/permissions/create')? 'active-page': '') }}
									  {{ (Request::is('admin/permissions/'.request()->route('id').'/edit')? 'active-page': '') }}" href="{{ route('permission.index') }}">Permissions</a>
						</li>
						<li>
							<a class="{{ (Request::is('admin/roles')? 'active-page': '') }}
									  {{ (Request::is('admin/roles/create')? 'active-page': '') }}
									  {{ (Request::is('admin/roles/'.request()->route('id').'/edit')? 'active-page': '') }}" href="{{ route('role.index') }}">Roles</a>
						</li>
						<li>
							<a class="{{ (Request::is('admin/users')? 'active-page': '') }}
									  {{ (Request::is('admin/users/create')? 'active-page': '') }}
									  {{ (Request::is('admin/users/'.request()->route('id').'/edit')? 'active-page': '') }}" href="{{ route('user.index') }}">Users</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		<div class="fixed-sidebar-right">
			<ul class="right-sidebar">
				<li>
					<div  class="tab-struct custom-tab-1">
						<ul role="tablist" class="nav nav-tabs" id="right_sidebar_tab">
							<li class="active" role="presentation"><a aria-expanded="true"  data-toggle="tab" role="tab" id="chat_tab_btn" href="#chat_tab">chat</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="messages_tab_btn" role="tab" href="#messages_tab" aria-expanded="false">messages</a></li>
							<li role="presentation" class=""><a  data-toggle="tab" id="todo_tab_btn" role="tab" href="#todo_tab" aria-expanded="false">todo</a></li>
						</ul>
						<div class="tab-content" id="right_sidebar_content">
							<div  id="chat_tab" class="tab-pane fade active in" role="tabpanel">
								<div class="chat-cmplt-wrap">
									<div class="chat-box-wrap">
										<div class="add-friend">
											<a href="javascript:void(0)" class="inline-block txt-grey">
												<i class="zmdi zmdi-more"></i>
											</a>	
											<span class="inline-block txt-dark">users</span>
											<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
											<div class="clearfix"></div>
										</div>
										<form role="search" class="chat-search pl-15 pr-15 pb-15">
											<div class="input-group">
												<input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Search">
												<span class="input-group-btn">
												<button type="button" class="btn  btn-default"><i class="zmdi zmdi-search"></i></button>
												</span>
											</div>
										</form>
										<div id="chat_list_scroll">
											<div class="nicescroll-bar">
												<ul class="chat-list-wrap">
													<li class="chat-list">
														<div class="chat-body">
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Clay Masse</span>
																		<span class="time block truncate txt-grey">No one saves us but ourselves.</span>
																	</div>
																	<div class="status away"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user1.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Evie Ono</span>
																		<span class="time block truncate txt-grey">Unity is strength</span>
																	</div>
																	<div class="status offline"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user2.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Madalyn Rascon</span>
																		<span class="time block truncate txt-grey">Respect yourself if you would have others respect you.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user3.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Mitsuko Heid</span>
																		<span class="time block truncate txt-grey">I’m thankful.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Ezequiel Merideth</span>
																		<span class="time block truncate txt-grey">Patience is bitter.</span>
																	</div>
																	<div class="status offline"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user1.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Jonnie Metoyer</span>
																		<span class="time block truncate txt-grey">Genius is eternal patience.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user2.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Angelic Lauver</span>
																		<span class="time block truncate txt-grey">Every burden is a blessing.</span>
																	</div>
																	<div class="status away"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user3.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Priscila Shy</span>
																		<span class="time block truncate txt-grey">Wise to resolve, and patient to perform.</span>
																	</div>
																	<div class="status online"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
															<a href="javascript:void(0)">
																<div class="chat-data">
																	<img class="user-img img-circle"  src="../img/user4.png" alt="user"/>
																	<div class="user-data">
																		<span class="name block capitalize-font">Linda Stack</span>
																		<span class="time block truncate txt-grey">Our patience will achieve more than our force.</span>
																	</div>
																	<div class="status away"></div>
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="recent-chat-box-wrap">
										<div class="recent-chat-wrap">
											<div class="panel-heading ma-0">
												<div class="goto-back">
													<a  id="goto_back" href="javascript:void(0)" class="inline-block txt-grey">
														<i class="zmdi zmdi-chevron-left"></i>
													</a>	
													<span class="inline-block txt-dark">ryan</span>
													<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-more"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
											<div class="panel-wrapper collapse in">
												<div class="panel-body pa-0">
													<div class="chat-content">
														<ul class="nicescroll-bar pt-20">
															<li class="friend">
																<div class="friend-msg-wrap">
																	<img class="user-img img-circle block pull-left"  src="../img/user.png" alt="user"/>
																	<div class="msg pull-left">
																		<p>Hello Jason, how are you, it's been a long time since we last met?</p>
																		<div class="msg-per-detail text-right">
																			<span class="msg-time txt-grey">2:30 PM</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
															<li class="self mb-10">
																<div class="self-msg-wrap">
																	<div class="msg block pull-right"> Oh, hi Sarah I'm have got a new job now and is going great.
																		<div class="msg-per-detail text-right">
																			<span class="msg-time txt-grey">2:31 pm</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
															<li class="self">
																<div class="self-msg-wrap">
																	<div class="msg block pull-right">  How about you?
																		<div class="msg-per-detail text-right">
																			<span class="msg-time txt-grey">2:31 pm</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
															<li class="friend">
																<div class="friend-msg-wrap">
																	<img class="user-img img-circle block pull-left"  src="../img/user.png" alt="user"/>
																	<div class="msg pull-left"> 
																		<p>Not too bad.</p>
																		<div class="msg-per-detail  text-right">
																			<span class="msg-time txt-grey">2:35 pm</span>
																		</div>
																	</div>
																	<div class="clearfix"></div>
																</div>	
															</li>
														</ul>
													</div>
													<div class="input-group">
														<input type="text" id="input_msg_send" name="send-msg" class="input-msg-send form-control" placeholder="Type something">
														<div class="input-group-btn emojis">
															<div class="dropup">
																<button type="button" class="btn  btn-default  dropdown-toggle" data-toggle="dropdown" ><i class="zmdi zmdi-mood"></i></button>
																<ul class="dropdown-menu dropdown-menu-right">
																	<li><a href="javascript:void(0)">Action</a></li>
																	<li><a href="javascript:void(0)">Another action</a></li>
																	<li class="divider"></li>
																	<li><a href="javascript:void(0)">Separated link</a></li>
																</ul>
															</div>
														</div>
														<div class="input-group-btn attachment">
															<div class="fileupload btn  btn-default"><i class="zmdi zmdi-attachment-alt"></i>
																<input type="file" class="upload">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
								
							<div id="messages_tab" class="tab-pane fade" role="tabpanel">
								<div class="message-box-wrap">
									<div class="msg-search">
										<a href="javascript:void(0)" class="inline-block txt-grey">
											<i class="zmdi zmdi-more"></i>
										</a>	
										<span class="inline-block txt-dark">messages</span>
										<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-search"></i></a>
										<div class="clearfix"></div>
									</div>
									<div class="set-height-wrap">
										<div class="streamline message-box nicescroll-bar">
											<a href="javascript:void(0)">
												<div class="sl-item unread-message">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Clay Masse</span>
														<span class="inline-block font-11  pull-right message-time">12:28 AM</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Themeforest message sent via your envato market profile</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsu messm quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user1.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Evie Ono</span>
														<span class="inline-block font-11  pull-right message-time">1 Feb</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Pogody theme support</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user2.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Madalyn Rascon</span>
														<span class="inline-block font-11  pull-right message-time">31 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Congratulations from design nominees</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item unread-message">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user3.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Ezequiel Merideth</span>
														<span class="inline-block font-11  pull-right message-time">29 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Themeforest item support message</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item unread-message">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user4.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Jonnie Metoyer</span>
														<span class="inline-block font-11  pull-right message-time">27 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Help with beavis contact form</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Priscila Shy</span>
														<span class="inline-block font-11  pull-right message-time">19 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject">Your uploaded theme is been selected</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
											<a href="javascript:void(0)">
												<div class="sl-item">
													<div class="sl-avatar avatar avatar-sm avatar-circle">
														<img class="img-responsive img-circle" src="../img/user1.png" alt="avatar"/>
													</div>
													<div class="sl-content">
														<span class="inline-block capitalize-font   pull-left message-per">Linda Stack</span>
														<span class="inline-block font-11  pull-right message-time">13 Jan</span>
														<div class="clearfix"></div>
														<span class=" truncate message-subject"> A new rating has been received</span>
														<p class="txt-grey truncate">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</p>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div  id="todo_tab" class="tab-pane fade" role="tabpanel">
								<div class="todo-box-wrap">
									<div class="add-todo">
										<a href="javascript:void(0)" class="inline-block txt-grey">
											<i class="zmdi zmdi-more"></i>
										</a>	
										<span class="inline-block txt-dark">todo list</span>
										<a href="javascript:void(0)" class="inline-block text-right txt-grey"><i class="zmdi zmdi-plus"></i></a>
										<div class="clearfix"></div>
									</div>
									<div class="set-height-wrap">
										<!-- Todo-List -->
										<ul class="todo-list nicescroll-bar">
											<li class="todo-item">
												<div class="checkbox checkbox-default">
													<input type="checkbox" id="checkbox01"/>
													<label for="checkbox01">Record The First Episode</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-pink">
													<input type="checkbox" id="checkbox02"/>
													<label for="checkbox02">Prepare The Conference Schedule</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-warning">
													<input type="checkbox" id="checkbox03" checked/>
													<label for="checkbox03">Decide The Live Discussion Time</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-success">
													<input type="checkbox" id="checkbox04" checked/>
													<label for="checkbox04">Prepare For The Next Project</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-danger">
													<input type="checkbox" id="checkbox05" checked/>
													<label for="checkbox05">Finish Up AngularJs Tutorial</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
											<li class="todo-item">
												<div class="checkbox checkbox-purple">
													<input type="checkbox" id="checkbox06" checked/>
													<label for="checkbox06">Finish Infinity Project</label>
												</div>
											</li>
											<li>
												<hr class="light-grey-hr"/>
											</li>
										</ul>
										<!-- /Todo-List -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- /Right Sidebar Menu -->
			
		

        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-30">
				@section('admin-content')
					@show	
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>2018 &copy; PLC Hardware</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
	<!-- Data table JavaScript -->
	<script src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('dist/js/dataTables-data.js')}}"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('dist/js/jquery.slimscroll.js')}}"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="{{ asset('bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset('bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="{{ asset('jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>
	
	<!-- Owl JavaScript -->
	<script src="{{ asset('bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>
	
	<!-- Switchery JavaScript -->
	<script src="{{ asset('bower_components/switchery/dist/switchery.min.js')}}"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="bower_components/echarts/dist/echarts-en.min.js"></script>
	<script src="echarts-liquidfill.min.js"></script>
	
	<!-- Vector Maps JavaScript -->
    <script src="vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="{{ asset('dist/js/vectormap-data.js')}}"></script>
	
	<!-- Toast JavaScript -->
	<script src="{{ asset('bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
	
	<!-- Piety JavaScript -->
	<script src="{{ asset('bower_components/peity/jquery.peity.min.js')}}"></script>
	<script src="{{ asset('dist/js/peity-data.js')}}"></script>
	
	<!-- Morris Charts JavaScript -->
    <script src="{{ asset('bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('bower_components/morris.js/morris.min.js')}}"></script>
    <script src="{{ asset('bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
	
	<!-- Bootstrap Select JavaScript -->
	<script src="{{ asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	
	<!-- Flot Charts JavaScript -->
	<script src="{{ asset('bower_components/Flot/excanvas.min.js')}}"></script>
	<script src="{{ asset('bower_components/Flot/jquery.flot.js')}}"></script>
	<script src="{{ asset('bower_components/Flot/jquery.flot.pie.js')}}"></script>
	<script src="{{ asset('bower_components/Flot/jquery.flot.resize.js')}}"></script>
	<script src="{{ asset('bower_components/Flot/jquery.flot.time.js')}}"></script>
	<script src="{{ asset('bower_components/Flot/jquery.flot.stack.js')}}"></script>
	<script src="{{ asset('bower_components/Flot/jquery.flot.crosshair.js')}}"></script>
	<script src="{{ asset('bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
	<script src="{{ asset('dist/js/flot-data.js')}}"></script>
	
	<!-- Init JavaScript -->
	<script src="{{ asset('dist/js/init.js')}}"></script>
	<script src="{{ asset('dist/js/dashboard2-data.js')}}"></script>
	@yield('script')
</body>

</html>
