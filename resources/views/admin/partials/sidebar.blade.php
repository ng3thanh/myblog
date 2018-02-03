<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
		
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search..."> 
					<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat">
						<i class="fa fa-search"></i>
					</button>
				</span>
			</div>
		</form>
		<!-- /.search form -->
		
		
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
		
			<li class="header">MAIN NAVIGATION</li>
			
			<li class="active treeview">
    			<a href="{{ URL::route('main') }}"> 
    				<i class="fa fa-dashboard"></i>
    				<span> Dashboard</span>
    			</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-share"></i>
					<span>Personal Management</span>
					<span class="pull-right-container">
              			<i class="fa fa-angle-left pull-right"></i>
            		</span>
				</a>
				<ul class="treeview-menu">
					<li class="treeview">
						<a href="#">
							<i class="fa fa-heartbeat"></i> Health
							<span class="pull-right-container">
                  				<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="#">
									<i class="fa fa-stethoscope"></i> Health check
								</a>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-plus-square"></i> Healthy diet
									<span class="pull-right-container">
                      					<i class="fa fa-angle-left pull-right"></i>
                    				</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-circle-o"></i> List food</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Follow</a></li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-wheelchair"></i> Gym
									<span class="pull-right-container">
                      					<i class="fa fa-angle-left pull-right"></i>
                    				</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-circle-o"></i> Exercise</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Follow</a></li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-credit-card"></i> Economy
							<span class="pull-right-container">
                  				<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="#">
									<i class="fa fa-calculator"></i> Money
								</a>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-deaf"></i> Investment
									<span class="pull-right-container">
                      					<i class="fa fa-angle-left pull-right"></i>
                    				</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
								</ul>
							</li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-gg-circle"></i> Education
							<span class="pull-right-container">
                  				<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="#">
									<i class="fa fa-book"></i> Books
								</a>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-child"></i> Learning
									<span class="pull-right-container">
                      					<i class="fa fa-angle-left pull-right"></i>
                    				</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
								</ul>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-certificate"></i> Orientation
								</a>
							</li>
						</ul>
					</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-envira"></i> Culture
							<span class="pull-right-container">
                  				<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="#">
									<i class="fa fa-sticky-note"></i> Personal Notes
								</a>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-eraser"></i> Personal Diary
									<span class="pull-right-container">
                      					<i class="fa fa-angle-left pull-right"></i>
                    				</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
									<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
								</ul>
							</li>
						</ul>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-bitcoin"></i>
					<span> Bitcoin Tracking</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="{{ URL::route('ncoin.index') }}">
							<i class="fa fa-circle-o"></i>Normal Tracking
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#"> <i class="fa fa-usd"></i> 
					<span> Invest Management</span>
					<span class="pull-right-container"> 
						<i class="fa fa-angle-left pull-right"></i>
        			</span>
        		</a>
				<ul class="treeview-menu">
					<li>
						<a href="pages/forms/general.html">
							<i class="fa fa-circle-o"></i>General Elements
						</a>
					</li>
					<li>
						<a href="pages/forms/general.html">
							<i class="fa fa-circle-o"></i>General Elements
						</a>
					</li>
					<li>
						<a href="pages/forms/general.html">
							<i class="fa fa-circle-o"></i>General Elements
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="{{ URL::route('schedule.index') }}">
					<i class="fa fa-calendar"></i>
					<span> Schedule Management</span>
					<span class="pull-right-container">
						<small class="label pull-right bg-green">new</small>
					</span>
				</a>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-users"></i>
					<span> Member Management</span>
					<span class="pull-right-container">
						<span class="label label-primary pull-right">4</span>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="pages/layout/top-nav.html">
							<i class="fa fa-circle-o"></i> Top Navigation
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#">
					<i class="fa fa-laptop"></i>
					<span> Role Management</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="pages/UI/general.html">
							<i class="fa fa-circle-o"></i>General
						</a>
					</li>
				</ul>
			</li>

			<li class="treeview">
				<a href="#"> 
					<i class="fa fa-object-group"></i> 
					<span> Website Tracking</span>
					<span class="pull-right-container"> 
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="pages/tables/simple.html">
							<i class="fa fa-circle-o"></i>Simple tables
						</a>
					</li>
				</ul>
			</li>
			
			<li>
				<a href="pages/calendar.html"> 
					<i class="fa fa-cubes"></i> 
					<span> System Settings</span>
					<span class="pull-right-container"> 
						<small class="label pull-right bg-red">3</small> 
						<small class="label pull-right bg-blue">17</small>
					</span>
				</a>
			</li>
			
		</ul>
	</section>
	<!-- /.sidebar -->
	
</aside>