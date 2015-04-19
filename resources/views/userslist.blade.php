<div class="panel-body no-padding">

	
	<div class="tabbable no-margin no-padding">
		<ul class="nav nav-tabs" id="myTab">
			<li class="padding-top-5 padding-left-5 active">
				<a data-toggle="tab" href="#users_followers" aria-expanded="false">
					All Users
				</a>
			</li>
			<li class="padding-top-5">
				<a data-toggle="tab" href="#admins" aria-expanded="true">
					Administrators
				</a>
			</li>
			<li class="padding-top-5">
				<a data-toggle="tab" href="#tech" aria-expanded="true">
					Technical Team
				</a>
			</li>
			<li class="padding-top-5">
				<a data-toggle="tab" href="#sales" aria-expanded="true">
					Sales Team
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div id="users_followers" class="tab-pane padding-bottom-5 active">
				<div class="panel-scroll height-200 ps-container ps-active-y">
					<table class="table no-margin">
						<tbody>
							
							
							@foreach($users as $user)
							<tr>
								<td class="center"><img alt="image" class="img-circle" src="assets/images/tuva-small.jpg"></td>
								<td><span class="text-small block text-light">{{ $user->email }}</span><span>{{ $user->firstname.' '.$user->lastname }}</span></td>
								<td class="center">
								<div class="cl-effect-13">
									<a href="">
										view more
									</a>
								</div></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -58px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 61px; height: 200px; right: 3px;"><div class="ps-scrollbar-y" style="top: 47px; height: 153px;"></div></div></div>
			</div>
			<!-- admins start -->
			<div id="admins" class="tab-pane padding-bottom-5">
				<div class="panel-scroll height-200 ps-container">
					<table class="table no-margin">
						<tbody>
							@foreach($admins as $admin)
							<tr>
								<td class="center"><img alt="image" class="img-circle" src="assets/images/tuva-small.jpg"></td>
								<td><span class="text-small block text-light">{{ $admin->email }}</span><span>{{ $admin->firstname.' '.$admin->lastname }}</span></td>
								<td class="center">
								<div class="cl-effect-13">
									<a href="">
										view more
									</a>
								</div></td>
							</tr>
							@endforeach
						
						</tbody>
					</table>
				<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
			</div>
			<!-- admins end -->
			<!-- tech start -->
			<div id="tech" class="tab-pane padding-bottom-5">
				<div class="panel-scroll height-200 ps-container">
					<table class="table no-margin">
						<tbody>
							@foreach($techs as $tech)
							<tr>
								<td class="center"><img alt="image" class="img-circle" src="assets/images/tuva-small.jpg"></td>
								<td><span class="text-small block text-light">{{ $tech->email }}</span><span>{{ $tech->firstname.' '.$tech->lastname }}</span></td>
								<td class="center">
								<div class="cl-effect-13">
									<a href="">
										view more
									</a>
								</div></td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
			</div>
			<!-- tech end -->
			<!-- sales start -->
			<div id="sales" class="tab-pane padding-bottom-5">
				<div class="panel-scroll height-200 ps-container">
					<table class="table no-margin">
						<tbody>
							@foreach($sales as $sale)
							<tr>
								<td class="center"><img alt="image" class="img-circle" src="assets/images/tuva-small.jpg"></td>
								<td><span class="text-small block text-light">{{ $sale->email }}</span><span>{{ $sale->firstname.' '.$sale->lastname }}</span></td>
								<td class="center">
								<div class="cl-effect-13">
									<a href="">
										view more
									</a>
								</div></td>
							</tr>
							@endforeach
							
							
						</tbody>
					</table>
				<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
			</div>
			<!-- sales end -->
		</div>
	</div>
</div>