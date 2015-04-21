@extends('template')

@section('sparkline')

    <!-- start: MINI STATS WITH SPARKLINE -->
    <div class="col-sm-4">
        <ul class="mini-stats pull-right">
            <li>

                <div class="values">
                    <strong class="text-dark">{{ CRM\Domain::unpaid()->count() }}</strong>
                    <p class="text-small no-margin">
                        <a href="{{ url('domains-expired') }}">
                            All Expired
                        </a>
                    </p>
                </div>
            </li>
            <li>

                <div class="values">

                        <strong class="text-dark">{{ CRM\Domain::expiresThisMonth()->unpaid()->count() }}</strong>

                    <p class="text-small no-margin">
                        <a href="{{ url('domains-expiring-this-month') }}">
                            Unpaid {{ date('F')  }}
                        </a>
                    </p>
                </div>
            </li>
            <li>

                <div class="values">
                    <strong class="text-dark">{{ CRM\Domain::all()->count() }}</strong>
                    <p class="text-small no-margin">
                        <a href="{{ url('domains') }}">
                            All Domains
                        </a>
                    </p>
                </div>
            </li>
        </ul>
    </div>
    <!-- end: MINI STATS WITH SPARKLINE -->
@stop

@section('content')
						
						<!-- end: DASHBOARD TITLE -->
						<!-- start: FEATURED BOX LINKS -->
						<div class="container-fluid container-fullw bg-white">
							<!-- start stats -->
							@include('stats')
							<!-- end stats -->
						</div>
						<!-- end: FEATURED BOX LINKS -->

						

						<!-- start: FOURTH SECTION -->
						<div class="container-fluid container-fullw bg-white">
							<!-- start activities -->
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="row">
										<div class="col-md-12">
                                            <div class="panel panel-white no-radius text-center">
                                                <div class="panel-body">
                                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-money fa-stack-1x fa-inverse"></i> </span>
                                                    <h2 class="StepTitle">This {{ date('F') }}</h2>
                                                    <p class="text-small">
                                                        View revenue information for this month
                                                    </p>
                                                    <p class="text-small">
                                                        <span style="color:black">Kshs. {{ number_format(CRM\Invoice_Records::expectedThisMonth()->sum('total'), 2) }} - Total Expected</span>
                                                    </p>
                                                    <p class="text-small">
                                                        <span style="color:black">Kshs. {{ number_format(CRM\Invoice_Records::collectedThisMonth()->sum('total'), 2) }} - Total Collected</span>
                                                    </p>
                                                    <p class="cl-effect-1">
                                                        <a href="{{ url('invoices-all') }}">
                                                            view more
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
										</div>
										<div class="col-md-12">

                                                <div class="panel panel-white no-radius text-center">
                                                    <div class="panel-body">
                                                        <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-bar-chart fa-stack-1x fa-inverse"></i> </span>
                                                        <h2 class="StepTitle">{{ date('Y') }}</h2>
                                                        <p class="text-small">
                                                            View revenue information for this year.
                                                        </p>
                                                        <p class="text-small">
                                                            <span style="color:black">Kshs. {{ number_format(CRM\Invoice_Records::expectedThisYear()->sum('total'), 2) }} - Total Expected</span>
                                                        </p>
                                                        <p class="text-small">
                                                            <span style="color:black">Kshs. {{ number_format(CRM\Invoice_Records::collectedThisYear()->sum('total'), 2) }} - Total Collected</span>
                                                        </p>
                                                        <p class="cl-effect-1">
                                                            <a href="{{ url('invoices-all') }}">
                                                                view more
                                                            </a>
                                                        </p>
                                                    </div>
                                                </div>

										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">Activities</h4>
										</div>
										<div class="panel-body">
											<ul class="timeline-xs margin-top-15 margin-bottom-15">
												<li class="timeline-item success">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															2 minutes ago
														</div>
														<p>
															<a  href="{{ URL::to('users/2') }}">
																Richard
															</a>
															added a new <a href="{{ URL::to('tasks/4') }}">task</a>
														</p>
													</div>
												</li>
												<li class="timeline-item">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															12:30
														</div>
														<p>
															Staff Meeting
														</p>
													</div>
												</li>
												<li class="timeline-item danger">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															11:11
														</div>
														<p>
															<a  href="{{ URL::to('users/1') }}">
																Adams
															</a>
															updated a <a href="{{ URL::to('projects/2') }}">project</a>
														</p>
													</div>
												</li>
												<li class="timeline-item info">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Thu, 12 Jun
														</div>
														<p>
															<a href="{{ URL::to('users/1') }}">
																Adams
															</a>
															generated a new invoice for <a href="{{ URL::to('projects/5') }}">CDTS</a>
														</p>
													</div>
												</li>
												<li class="timeline-item">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Tue, 10 Jun
														</div>
														<p>
															<a  href="{{ URL::to('users/2') }}">
																Richard
															</a>
															completed a <a href="{{ URL::to('projects/7') }}">project</a>
														</p>
													</div>
												</li>
												<li class="timeline-item">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Sun, 11 Apr
														</div>
														<p>
															<a  href="{{ URL::to('users/1') }}">
																Adams
															</a>
															sent a <a href="#">message</a> to all <a href="{{ URL::to('users') }}">users</a>
														</p>
													</div>
												</li>
												<li class="timeline-item warning">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Wed, 25 Mar
														</div>
														<p>
															<a href="{{ URL::to('users/1') }}">
																Kendi
															</a>
															updated her <a href="{{ URL::to('users/3') }}">profile</a>
														</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">Chat</h4>
										</div>
										<!-- start chat window -->
										@include('chat')
										<!-- end chat window -->
										<div class="message-bar">
											<div class="message-inner">
												<a class="link icon-only" href="#"><i class="fa fa-camera"></i></a>
												<div class="message-area">
													<textarea placeholder="Message"></textarea>
												</div>
												<a class="link" href="#">
													Send
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: FOURTH SECTION -->
						<!-- start: THIRD SECTION -->

						<!-- end: THIRD SECTION -->

					</div>

@stop

@section('dataTablesjs')
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="{{ URL::asset('vendor/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/moment/moment.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/fullcalendar/fullcalendar.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

	<script src="{{ URL::asset('assets/js/pages-calendar.js') }}"></script>

@stop