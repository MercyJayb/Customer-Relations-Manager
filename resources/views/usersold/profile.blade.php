@extends('template')

@section('content')
<div class="row">
								<div class="col-md-12">
									<div class="tabbable">
										<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
											<li class="active">
												<a data-toggle="tab" href="#panel_overview">
													Overview
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#panel_edit_account">
													Edit Account
												</a>
											</li>
											<li>
												<a data-toggle="tab" href="#panel_projects">
													Projects
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div id="panel_overview" class="tab-pane fade in active">
												
												<div class="row">
													<p class="text-small margin-bottom-20">
														@if(Session::has('success'))
														<div class="alert alert-success">
															{{ Session::get('success') }}
														</div>
														@endif
													</p>

												</div>
												<div class="row">
													<div class="col-sm-5 col-md-4">
														<div class="user-left">
															<div class="center">
																<h4>{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</h4>
																<div class="fileinput fileinput-new" data-provides="fileinput">
																	<div class="user-image">
																		<div class="fileinput-new thumbnail"><img src="{{ URL::asset('assets/images/tuva.jpg') }}" alt="">
																		</div>
																		<div class="fileinput-preview fileinput-exists thumbnail"></div>
																		<div class="user-image-buttons">
																			<span class="btn btn-azure btn-file btn-sm"><span class="fileinput-new"><i class="fa fa-pencil"></i></span><span class="fileinput-exists"><i class="fa fa-pencil"></i></span>
																				<input type="file">
																			</span>
																			<a href="#" class="btn fileinput-exists btn-red btn-sm" data-dismiss="fileinput">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																	</div>
																</div>
																<hr>
																<div class="social-icons block">
																	<ul>
																		<li data-placement="top" data-original-title="Twitter" class="social-twitter tooltips">
																			<a href="http://www.twitter.com" target="_blank">
																				Twitter
																			</a>
																		</li>
																		<li data-placement="top" data-original-title="Facebook" class="social-facebook tooltips">
																			<a href="http://facebook.com" target="_blank">
																				Facebook
																			</a>
																		</li>
																		<li data-placement="top" data-original-title="Google" class="social-google tooltips">
																			<a href="http://google.com" target="_blank">
																				Google+
																			</a>
																		</li>
																		<li data-placement="top" data-original-title="LinkedIn" class="social-linkedin tooltips">
																			<a href="http://linkedin.com" target="_blank">
																				LinkedIn
																			</a>
																		</li>
																		<li data-placement="top" data-original-title="Github" class="social-github tooltips">
																			<a href="#" target="_blank">
																				Github
																			</a>
																		</li>
																	</ul>
																</div>
																<hr>
															</div>
															<table class="table table-condensed">
																<thead>
																	<tr>
																		<th colspan="3">Contact Information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>url</td>
																		<td>
																		<a href="#">
																			www.bluewebsafrica.co.ke
																		</a></td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>email:</td>
																		<td>
																		<a href="">
																			{{ Auth::user()->email }}
																		</a></td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>phone:</td>
																		<td>{{ Auth::user()->phone }}</td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>skye</td>
																		<td>
																		<a href="">
																			adamstuva
																		</a></td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																</tbody>
															</table>
															<table class="table">
																<thead>
																	<tr>
																		<th colspan="3">General information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Position</td>
																		<td>Business Development Director</td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>Last Logged In</td>
																		<td>56 min</td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>Position</td>
																		<td>Senior Marketing Manager</td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>Supervisor</td>
																		<td>
																		<a href="#">
																			Kenneth Ross
																		</a></td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>Status</td>
																		<td><span class="label label-sm label-info">{{ Auth::user()->level->level_name }}</span></td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																</tbody>
															</table>
															<!-- <table class="table">
																<thead>
																	<tr>
																		<th colspan="3">Additional information</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>Birth</td>
																		<td>21 October 1982</td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																	<tr>
																		<td>Groups</td>
																		<td>New company web site development, HR Management</td>
																		<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
																	</tr>
																</tbody>
															</table> -->
														</div>
													</div>
													<div class="col-sm-7 col-md-8">
														<div class="row space20">
															<div class="col-sm-3">
																<button class="btn btn-icon margin-bottom-5 margin-bottom-5 btn-block">
																	<i class="ti-layers-alt block text-primary text-extra-large margin-bottom-10"></i>
																	Projects
																</button>
															</div>
															<div class="col-sm-3">
																<button class="btn btn-icon margin-bottom-5 btn-block">
																	<i class="ti-comments block text-primary text-extra-large margin-bottom-10"></i>
																	Messages <span class="badge badge-danger"> 23 </span>
																</button>
															</div>
															<div class="col-sm-3">
																<button class="btn btn-icon margin-bottom-5 btn-block">
																	<i class="ti-calendar block text-primary text-extra-large margin-bottom-10"></i>
																	Calendar
																</button>
															</div>
															<div class="col-sm-3">
																<button class="btn btn-icon margin-bottom-5 btn-block">
																	<i class="ti-flag block text-primary text-extra-large margin-bottom-10"></i>
																	Notifications
																</button>
															</div>
														</div>
														<div class="panel panel-white" id="activities">
															<div class="panel-heading border-light">
																<h4 class="panel-title text-primary">Recent Activities</h4>
																<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
															</div>
															<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
																<div class="panel-body">
																	<ul class="timeline-xs">
																		<li class="timeline-item success">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																					2 minutes ago
																				</div>
																				<p>
																					<a class="text-info" href="">
																						Steven
																					</a>
																					has completed his account.
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
																					Completed new layout.
																				</p>
																			</div>
																		</li>
																		<li class="timeline-item info">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																					Thu, 12 Jun
																				</div>
																				<p>
																					Contacted
																					<a class="text-info" href="">
																						Microsoft
																					</a>
																					for license upgrades.
																				</p>
																			</div>
																		</li>
																		<li class="timeline-item">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																					Tue, 10 Jun
																				</div>
																				<p>
																					Started development new site
																				</p>
																			</div>
																		</li>
																		<li class="timeline-item">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																					Sun, 11 Apr
																				</div>
																				<p>
																					Lunch with
																					<a class="text-info" href="">
																						Nicole
																					</a>
																					.
																				</p>
																			</div>
																		</li>
																		<li class="timeline-item warning">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																					Wed, 25 Mar
																				</div>
																				<p>
																					server Maintenance.
																				</p>
																			</div>
																		</li>
																		<li class="timeline-item">
																			<div class="margin-left-15">
																				<div class="text-muted text-small">
																					Fri, 20 Mar
																				</div>
																				<p>
																					New User Registration
																					<a class="text-info" href="">
																						more details
																					</a>
																					.
																				</p>
																			</div>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
														<div class="panel panel-white space20">
															<div class="panel-heading">
																<h4 class="panel-title">Recent Tweets</h4>
															</div>
															<div class="panel-body">
																<ul class="ltwt">
																	<li class="ltwt_tweet">
																		<p class="ltwt_tweet_text">
																			<a href="" class="text-info">
																				@Shakespeare
																			</a>
																			Some are born great, some achieve greatness, and some have greatness thrust upon them.
																		</p>
																		<span class="block text-light"><i class="fa fa-fw fa-clock-o"></i> 2 minuts ago</span>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="panel_edit_account" class="tab-pane fade">
												{{ Form::model(Auth::user(), array('url'=> URL::to('profile'), 'method'=> 'POST', 'role'=>'form')) }}
													
												
													<fieldset>
														<legend>
															Account Info
														</legend>
														<div class="row">
															<div class="col-md-6">
																<div class="form-group {{ ($errors->has('firstname')) ? "has-error" : "" }}">
																	<label class="control-label">
																		First Name
																	</label>
																	<input type="text" placeholder="Peter" class="form-control" id="firstname" name="firstname" value="{{ Auth::user()->firstname }}">
																</div>
																<div class="form-group {{ ($errors->has('lastname')) ? "has-error" : "" }}">
																	<label class="control-label">
																		Last Name
																	</label>
																	<input type="text" placeholder="Clark" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}">
																</div>
																<div class="form-group {{ ($errors->has('email')) ? "has-error" : "" }}">
																	<label class="control-label">
																		Email Address
																	</label>
																	<input type="email" placeholder="peter@example.com" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
																</div>
																<div class="form-group {{ ($errors->has('phone')) ? "has-error" : "" }}">
																	<label class="control-label">
																		Phone
																	</label>
																	<input type="text" placeholder="" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
																</div>
																
															</div>
															<div class="col-md-6">
																
																
																<div class="form-group {{ ($errors->has('pic')) ? "has-error" : "" }}">
																	<label>
																		Image Upload
																	</label>
																	<div class="fileinput fileinput-new" data-provides="fileinput">
																		<div class="fileinput-new thumbnail"><img src="{{ URL::asset('assets/images/tuva.jpg') }}" alt="">
																		</div>
																		<div class="fileinput-preview fileinput-exists thumbnail"></div>
																		<div class="user-edit-image-buttons">
																			<span class="btn btn-azure btn-file"><span class="fileinput-new"><i class="fa fa-picture"></i> Select image</span><span class="fileinput-exists"><i class="fa fa-picture"></i> Change</span>
																				<input type="file" name="pic">
																			</span>
																			<a href="#" class="btn fileinput-exists btn-red" data-dismiss="fileinput">
																				<i class="fa fa-times"></i> Remove
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</fieldset>
											
													<div class="row">
														
														<div class="col-md-2">
															<button class="btn btn-primary pull-right" type="submit">
																Update <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
													</div>
												
												{{ Form::close() }}

											</div>
											<div id="panel_projects" class="tab-pane fade">
												<table class="table" id="projects">
													<thead>
														<tr>
															<th>Project Name</th>
															<th class="hidden-xs">Client</th>
															<th>Proj Comp</th>
															<th class="hidden-xs">%Comp</th>
															<th class="hidden-xs center">Priority</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>IT Help Desk</td>
															<td class="hidden-xs">Master Company</td>
															<td>11 november 2014</td>
															<td class="hidden-xs">
															<div class="progress active progress-xs">
																<div style="width: 70%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" role="progressbar" class="progress-bar progress-bar-warning">
																	<span class="sr-only"> 70% Complete (danger)</span>
																</div>
															</div></td>
															<td class="center hidden-xs"><span class="label label-danger">Critical</span></td>
														</tr>
														<tr>
															<td>PM New Product Dev</td>
															<td class="hidden-xs">Brand Company</td>
															<td>12 june 2014</td>
															<td class="hidden-xs">
															<div class="progress active progress-xs">
																<div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-info">
																	<span class="sr-only"> 40% Complete</span>
																</div>
															</div></td>
															<td class="center hidden-xs"><span class="label label-warning">High</span></td>
														</tr>
														<tr>
															<td>ClipTheme Web Site</td>
															<td class="hidden-xs">Internal</td>
															<td>11 november 2014</td>
															<td class="hidden-xs">
															<div class="progress active progress-xs">
																<div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success">
																	<span class="sr-only"> 90% Complete</span>
																</div>
															</div></td>
															<td class="center hidden-xs"><span class="label label-success">Normal</span></td>
														</tr>
														<tr>
															<td>Local Ad</td>
															<td class="hidden-xs">UI Fab</td>
															<td>15 april 2014</td>
															<td class="hidden-xs">
															<div class="progress active progress-xs">
																<div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
																	<span class="sr-only"> 50% Complete</span>
																</div>
															</div></td>
															<td class="center hidden-xs"><span class="label label-success">Normal</span></td>
														</tr>
														<tr>
															<td>Design new theme</td>
															<td class="hidden-xs">Internal</td>
															<td>2 october 2014</td>
															<td class="hidden-xs">
															<div class="progress active progress-xs">
																<div style="width: 20%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-success">
																	<span class="sr-only"> 20% Complete (warning)</span>
																</div>
															</div></td>
															<td class="center hidden-xs"><span class="label label-danger">Critical</span></td>
														</tr>
														<tr>
															<td>IT Help Desk</td>
															<td class="hidden-xs">Designer TM</td>
															<td>6 december 2014</td>
															<td class="hidden-xs">
															<div class="progress active progress-xs">
																<div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
																	<span class="sr-only"> 40% Complete (warning)</span>
																</div>
															</div></td>
															<td class="center hidden-xs"><span class="label label-warning">High</span></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							@stop