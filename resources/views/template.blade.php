<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>:: BWA CRM ::</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<link rel="stylesheet" type="text/css" href="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.css">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/datatables/bootstrap.min.css') }}">

        {{--favicon--}}

        <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('assets/images/favicon.png') }}">
		
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendor/fontawesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendor/themify-icons/themify-icons.min.css') }}">
		<link href="{{ URL::asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ URL::asset('vendor/switchery/switchery.min.css') }}" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->

		@yield('formcss')
		
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/themes/theme-1.css') }}" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->

		<style type="text/css">
			div.dataTables_paginate.paging_bootstrap.pagination,
			div.dataTables_filter{
				margin-right: -83px;
			}
			div.dataTables_length {
				margin-left: -5px;
			}
		</style>

		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<body>
		<div id="app">
			<!-- sidebar -->
			<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<nav>

						<!-- start: MAIN NAVIGATION MENU -->
						<div class="navbar-title">
							<span>Main Navigation</span>
						</div>
						<ul class="main-navigation-menu">
							<li class="active open">
								<a href="{{ URL::to('/') }}">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Dashboard </span>
										</div>

									</div>
								</a>
							</li>

                            <li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Clients </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('clients/create') }}">
											<span class="title">Create New Client </span>
										</a>
									</li>
									<li>
										<a href="{{ URL::to('clients') }}">
											<span class="title"> All Clients <span class="badge">{{ CRM\Client::all()->count()  }}</span> </span>
										</a>
									</li>
									
								</ul>
							</li>

							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Projects </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('projects/create') }}">
											<span class="title">Create New Project</span>
										</a>
									</li>								
									<li>
										<a href="{{ URL::to('projects-pending') }}">
											<span class="title"> Pending Projects <span class="badge">{{ CRM\Project::where('status',FALSE)->count()  }}</span></span>
										</a>
									</li>
                                    <li>
                                        <a href="{{ URL::to('projects-completed') }}">
                                            <span class="title"> Completed Projects <span class="badge">{{ CRM\Project::where('status', TRUE)->count()  }}</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('projects') }}">
                                            <span class="title"> All Projects <span class="badge">{{ CRM\Project::all()->count()  }}</span></span>
                                        </a>
                                    </li>
									
								</ul>
							</li>
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Domains </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('domains/create') }}">
											<span class="title">Create New Domain</span>
										</a>
									</li>
                                    <li>
                                        <a href="{{ URL::to('domains-expired') }}">
                                            <span class="title"> Expired Domains<span class="badge">{{ CRM\Domain::unpaid()->count()  }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('domains-active') }}">
                                            <span class="title"> Active Domains <span class="badge">{{ CRM\Domain::paid()->count()  }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('domains-deleted') }}">
                                            <span class="title">Deleted Domains <span class="badge">{{ CRM\Domain::onlyTrashed()->count()  }}</span>
                                        </a>
                                    </li>
									<li>
										<a href="{{ URL::to('domains') }}">
											<span class="title"> All Domains <span class="badge">{{ CRM\Domain::all()->count()  }}</span> </span>
										</a>
									</li>
									
								</ul>
							</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-pencil-alt"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Invoices </span><i class="icon-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="sub-menu">

                                    {{--<li>--}}
                                        {{--<a href="{{ URL::to('invoices-pending') }}">--}}
                                            {{--<span class="title"> Pending Invoices <span class="badge">{{ CRM\Invoice_Records::pending()->count()  }}</span> </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ URL::to('invoices-settled') }}">--}}
                                            {{--<span class="title"> Settled Invoices <span class="badge">{{ CRM\Invoice_Records::settled()->count()  }}</span> </span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    <li>
                                        <a href="{{ URL::to('invoices-all') }}">
                                            <span class="title"> All Invoices <span class="badge">{{ CRM\Invoice_Records::all()->count()  }}</span> </span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Tasks / Events </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
                                        <a href="{{ URL::to('tasks/create') }}">
                                            <span class="title"> Create New Task / Event </span>
                                        </a>

									</li>
                                    <li>
                                        <a href="{{ URL::to('tasks-latest') }}">
                                            <span class="title">Latest Tasks / Events <span class="badge">{{ CRM\Task::all()->count()  }}</span></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('tasks-today') }}">
                                            <span class="title">View Today's Task / Event <span class="badge">{{ CRM\Task::today()->count()  }}</span></span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('tasks-completed') }}">
                                            <span class="title">Completed Tasks / Events <span class="badge">{{ CRM\Task::completed()->count()  }}</span></span>
                                        </a>
                                    </li>
									<li>
										<a href="{{ URL::to('tasks-all') }}">
											<span class="title"> All Tasks / Events <span class="badge">{{ CRM\Task::all()->count()  }}</span></span>
										</a>
									</li>
									
								</ul>
							</li>
							{{--<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Statuses </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('status/create') }}">
											<span class="title">Create New Status</span>
										</a>
									</li>
									<li>
										<a href="{{ URL::to('status') }}">
											<span class="title"> All Statuses</span>
										</a>
									</li>
									
								</ul>
							</li>--}}
							{{--<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-layers-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Levels </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('levels/create') }}">
											<span class="title">Create New Level </span>
										</a>
									</li>

									<li>
										<a href="{{ URL::to('levels') }}">
											<span class="title"> All Levels </span>
										</a>
									</li>
									
								</ul>
							</li>--}}
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-layers-alt"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Services </span><i class="icon-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ URL::to('services/create') }}">
                                            <span class="title">Create New Service </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('services') }}">
                                            <span class="title"> All Services <span class="badge">{{ CRM\Service::all()->count()  }}</span> </span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-layers-alt"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title">Tenders </span><i class="icon-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ URL::to('tenders/create') }}">
                                            <span class="title">Create New Tender </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('tenders-all') }}">
                                            <span class="title"> Tenders Due In Two Weeks <span class="badge">{{ CRM\Tender::dueInTwoWeeks()->count()  }}</span> </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('tenders-pending') }}">
                                            <span class="title"> Pending Tenders <span class="badge">{{ CRM\Tender::pending()->count()  }}</span> </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('tenders-completed') }}">
                                            <span class="title"> Completed Tenders <span class="badge">{{ CRM\Tender::completed()->count()  }}</span> </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('tenders') }}">
                                            <span class="title"> All Tenders <span class="badge">{{ CRM\Tender::all()->count()  }}</span> </span>
                                        </a>
                                    </li>

                                </ul>
                            </li>


                            <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="ti-user"></i>
                                        </div>
                                        <div class="item-inner">
                                            <span class="title"> Users </span><i class="icon-arrow"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ URL::to('users/create') }}">
                                            <span class="title">Create New User</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('user/admins') }}">
                                            <span class="title"> Administrators </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('user/developers') }}">
                                            <span class="title"> Technical Team </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('user/salespersons') }}">
                                            <span class="title"> Sales Team </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ URL::to('users') }}">
                                            <span class="title"> All Users <span class="badge">{{ CRM\User::all()->count()  }}</span></span>
                                        </a>
                                    </li>

                                </ul>
                            </li>


						</ul>
						<!-- end: MAIN NAVIGATION MENU -->
						<!-- start: CORE FEATURES -->


						<!-- end: CORE FEATURES -->
						<!-- start: DOCUMENTATION BUTTON -->
						<div class="wrapper">
							<a href="" class="button-o">
								<i class="ti-settings"></i>
								<span>settings</span>
							</a>
						</div>
						<!-- end: DOCUMENTATION BUTTON -->
					</nav>
				</div>
			</div>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">
						<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="#">
							<img src="{{ URL::asset('assets/images/BWA-CRM.png') }}" alt="logo">
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<i class="ti-view-grid"></i>
						</a>
					</div>
					<!-- end: NAVBAR HEADER -->
                    <!-- start: NAVBAR COLLAPSE -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-right">
                            <!-- start: CREATE TASK -->
                            <li class="dropdown">
                                <a href="{{ URL::to('tasks/create') }}">
                                     <i class="ti-pencil"></i> <span>Create Task</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ URL::to('tasks-all') }}">
                                    <i class="ti-layers-alt"></i> <span>All Tasks</span>
                                </a>
                            </li>
                            <!-- end: CREATE TASK -->
                            <!-- start: CREATE CLIENT -->
                            <li class="dropdown">
                                <a href="{{ URL::to('clients/create') }}">
                                    <i class="ti-user"></i> <span>Create Client</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ URL::to('clients') }}">
                                    <i class="ti-notepad"></i> <span>All Clients</span>
                                </a>
                            </li>
                            <!-- end: CREATE CLIENT -->
                            <!-- start: MESSAGES DROPDOWN -->
                            <li class="dropdown">
                                <a href class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="dot-badge partition-red"></span> <i class="ti-comment"></i> <span>MESSAGES</span>
                                </a>
                                <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
                                    <li>
                                        <span class="dropdown-header"> Unread messages</span>
                                    </li>
                                    <li>
                                        <div class="drop-down-wrapper ps-container">
                                            <ul>
                                                <li class="unread">
                                                    <a href="javascript:;" class="unread">
                                                        <div class="clearfix">
                                                            <div class="thread-image">
                                                                <img src="{{ URL::asset('assets/images/avatar-2.jpg') }}" alt="">
                                                            </div>
                                                            <div class="thread-content">
                                                                <span class="author">Nicole Bell</span>
                                                                <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
                                                                <span class="time"> Just Now</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" class="unread">
                                                        <div class="clearfix">
                                                            <div class="thread-image">
                                                                <img src="{{ URL::asset('assets/images/avatar-3.jpg') }}" alt="">
                                                            </div>
                                                            <div class="thread-content">
                                                                <span class="author">Steven Thompson</span>
                                                                <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
                                                                <span class="time">8 hrs</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <div class="clearfix">
                                                            <div class="thread-image">
                                                                <img src="{{ URL::asset('assets/images/avatar-5.jpg') }}" alt="">
                                                            </div>
                                                            <div class="thread-content">
                                                                <span class="author">Kenneth Ross</span>
                                                                <span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
                                                                <span class="time">14 hrs</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="view-all">
                                        <a href="#">
                                            See All
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end: MESSAGES DROPDOWN -->
                            <!-- start: ACTIVITIES DROPDOWN -->
                            <li class="dropdown">
                                <a href class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-check-box"></i> <span>ACTIVITIES</span>
                                </a>
                                <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
                                    <li>
                                        <span class="dropdown-header"> You have new notifications</span>
                                    </li>
                                    <li>
                                        <div class="drop-down-wrapper ps-container">
                                            <div class="list-group no-margin">
                                                <a class="media list-group-item" href="">
                                                    <img class="img-circle" alt="..." src="{{ URL::asset('assets/images/avatar-1.jpg') }}">
                                                    <span class="media-body block no-margin"> Use awesome animate.css <small class="block text-grey">10 minutes ago</small> </span>
                                                </a>
                                                <a class="media list-group-item" href="">
                                                    <span class="media-body block no-margin"> 1.0 initial released <small class="block text-grey">1 hour ago</small> </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="view-all">
                                        <a href="#">
                                            See All
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end: ACTIVITIES DROPDOWN -->
                            <!-- start: LANGUAGE SWITCHER -->
                            <li class="dropdown">
                                <a href class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-settings"></i> Settings
                                </a>
                                <ul role="menu" class="dropdown-menu dropdown-light fadeInUpShort">
                                    <li>
                                        <a href="#" class="menu-toggler">
                                            Status
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="menu-toggler">
                                            Frequency
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <!-- start: LANGUAGE SWITCHER -->
                            <!-- start: USER OPTIONS DROPDOWN -->
                            <li class="dropdown current-user">
                                <a href class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ URL::asset('assets/images/tuva.jpg') }}" alt="username"> <span class="username">adamstuva</span> <i class="ti-angle-down"></i></i></span>
                                </a>
                                <ul class="dropdown-menu dropdown-dark">
                                    <li>
                                        <a href="{{ URL::to('users/1') }}">
                                            My Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages_calendar.html">
                                            My Calendar
                                        </a>
                                    </li>
                                    <li>
                                        <a hef="pages_messages.html">
                                            My Messages (3)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('lock') }}">
                                            Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('lock') }}">
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- end: USER OPTIONS DROPDOWN -->
                        </ul>
                        <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
                        <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
                            <div class="arrow-left"></div>
                            <div class="arrow-right"></div>
                        </div>
                        <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
                    </div>
                    <a class="dropdown-off-sidebar" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
                        &nbsp;
                    </a>
                    <!-- end: NAVBAR COLLAPSE -->
				</header>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: DASHBOARD TITLE -->
						<section id="page-title" class="padding-top-15 padding-bottom-15">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">{{ $title  }}</h1>
									<span class="mainDescription"> {{ $subtitle }} </span>
								</div>

                                @yield('sparkline')
								
							</div>
						</section>
						<!-- end: DASHBOARD TITLE -->

						<!-- start: FIRST SECTION -->
						@yield('content')
						<!-- end: FOURTH SECTION -->
					</div>
				</div>
			</div>
            <!-- start: EVENTS ASIDE -->
            <div class="modal fade modal-aside horizontal right events-modal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog modal-sm">
                    <div class="modal-content">
                        <form class="form-full-event">
                            <div class="modal-body">
                                <div class="form-group hidden">
                                    <label>
                                        ID
                                    </label>
                                    <input type="text" id="event-id">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Event Title
                                    </label>
                                    <input type="text" id="event-name" placeholder="Enter title" class="form-control underline text-large" name="eventName">
                                </div>
                                <div class="form-group">
                                    <label>
                                        Start
                                    </label>
												<span class="input-icon">
													<input type="text" id="start-date-time" class="form-control underline" name="eventStartDate"/>
													<i class="ti-calendar"></i> </span>
                                </div>
                                <div class="form-group">
                                    <label>
                                        End
                                    </label>
												<span class="input-icon">
													<input type="text" id="end-date-time" class="form-control underline" name="eventEndDate" />
													<i class="ti-calendar"></i> </span>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Category
                                    </label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="radio clip-radio radio-primary">
                                                <input type="radio" id="job" name="optionsCategory" value="job" class="event-categories">
                                                <label for="job">
                                                    <span class="fa fa-circle text-primary"></span> Job
                                                </label>
                                            </div>
                                            <div class="radio clip-radio radio-primary">
                                                <input type="radio" id="home" name="optionsCategory" value="home" class="event-categories">
                                                <label for="home">
                                                    <span class="fa fa-circle text-purple"></span> Home
                                                </label>
                                            </div>
                                            <div class="radio clip-radio radio-primary">
                                                <input type="radio" id="off-site-work" name="optionsCategory" value="off-site-work" class="event-categories">
                                                <label for="off-site-work">
                                                    <span class="fa fa-circle text-green"></span> Off site
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="radio clip-radio radio-primary">
                                                <input type="radio" id="cancelled" name="optionsCategory" value="cancelled" class="event-categories">
                                                <label for="cancelled">
                                                    <span class="fa fa-circle text-yellow"></span> Cancelled
                                                </label>
                                            </div>
                                            <div class="radio clip-radio radio-primary">
                                                <input type="radio" id="generic" name="optionsCategory" value="generic" class="event-categories">
                                                <label for="generic">
                                                    <span class="fa fa-circle text-info"></span> Generic
                                                </label>
                                            </div>
                                            <div class="radio clip-radio radio-primary">
                                                <input type="radio" id="to-do" name="optionsCategory" value="to-do" class="event-categories">
                                                <label for="to-do">
                                                    <span class="fa fa-circle text-orange"></span> ToDo
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger btn-o delete-event">
                                    Delete
                                </button>
                                <button class="btn btn-primary btn-o save-event" type="submit">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: EVENTS ASIDE -->
			<!-- start: FOOTER -->
			<footer>
				<div class="row">
                    <div class="col-sm-3"></div>
					<div class="col-sm-7" style="margin-left:-60px;">
						&copy; <span class="current-year"></span><span class="text-bold text-camelcase"> Powered By <a target="_blank" href="http://www.bluewebsafrica.co.ke">Blue Webs Africa</a></span>. <span>All Rights Reserved</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
            <!-- start: OFF-SIDEBAR -->
            
            <!-- end: OFF-SIDEBAR -->

			<!-- start: SETTINGS -->
			
			<!-- end: SETTINGS -->

		</div>

		<!-- start: MAIN JAVASCRIPTS -->
			<!-- start: MAIN JAVASCRIPTS -->
		<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/modernizr/modernizr.js') }}"></script>
		<script src="{{ URL::asset('vendor/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/switchery/switchery.min.js') }}"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="{{ URL::asset('vendor/Chart.js/Chart.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		@yield('dataTablesjs')

		
		<script src="{{ URL::asset('vendor/maskedinput/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/autosize/autosize.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/selectFx/classie.js') }}"></script>
		<script src="{{ URL::asset('vendor/selectFx/selectFx.js') }}"></script>
		<script src="{{ URL::asset('vendor/select2/select2.min.js') }}"></script>

		<script src="{{ URL::asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>

        <script src="{{ URL::asset('vendor/Chart.js/Chart.min.js') }}"></script>
        <script src="{{ URL::asset('vendor/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="{{ URL::asset('assets/js/main.js') }}"></script>
		<!-- start: JavaScript Event Handlers for this page  -->
		<script src="{{ URL::asset('assets/js/index.js') }}"></script>
		<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

        <script src="{{ URL::asset('assets/js/pages-calendar.js') }}"></script>

        <script>
            jQuery(document).ready(function() {
                Main.init();
                Index.init();
                FormElements.init();
                //Calendar.init();
            });

        </script>

		@yield('formjs')
		
		
	</body>
</html>
