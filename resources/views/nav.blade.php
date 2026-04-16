            
			<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						
							 @if(Auth::user())	           
								 @if(Auth::user()->isAdmin())
									
						<li>

                            <a href="#"><i class="fa fa-cog fa-fw"></i> Configuration <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Locations<span class="fa arrow"></span></a>
									 <ul class="nav nav-third-level">
											<li>
											<a href="{{route('loc.create')}}">Add Location</a>
											</li>		
											<li>
											<a href="{{route('loc.index')}}">Manage Locations</a>
											</li>						
									 </ul>
                                </li>
                    								
                                <li>
                                    <a href="#">Company<span class="fa arrow"></span></a>
									    								 <ul class="nav nav-third-level">
											<li>
											<a href="{{route('comp.create')}}">Add Company</a>
											</li>		
											<li>
											<a href="{{route('comp.index')}}">Manage Company</a>
											</li>						
									 </ul>
                                </li>
                                <li>
                                    <a href="#">Departments<span class="fa arrow"></span></a>
									    								 <ul class="nav nav-third-level">
											<li>
											<a href="{{route('dept.create')}}">Add Department</a>
											</li>		
											<li>
											<a href="{{route('dept.index')}}">Manage Departments</a>
											</li>						
									 </ul>
                                </li>
                                <li>
                                    <a href="#">Users<span class="fa arrow"></span></a>
									    								 <ul class="nav nav-third-level">
											<li>
											<a href="{{route('register')}}">Add Users</a>
											</li>		
											<li>
											<a href="{{route('user.index')}}">Manage Users</a>
											</li>						
									 </ul>
                                </li>
								<li>
                                    <a href="#">Advert Image<span class="fa arrow"></span></a>
									    								 <ul class="nav nav-third-level">
											<li>
											<a href="{{route('config.create')}}">Add Adverts</a>
											</li>	
											<li>
											<a href="{{route('scroll.create')}}">Add Scroll Image</a>
											</li>												
											<li>
											<a href="{{route('config.index')}}">Manage Adverts</a>
											</li>						
									 </ul>
                                </li>	
								<li>
                                    <a href="#">Messages<span class="fa arrow"></span></a>
									    			<ul class="nav nav-third-level">
											<li>
											<a href="{{route('message.create')}}">Send Message</a>
											</li>		
											<li>
											<a href="{{route('message.index')}}">Manage messages</a>
											</li>						
									 </ul>
                                </li>									
                            </ul>
                            <!-- /.nav-second-level -->
							
                        </li>
							@endif
						@endif

                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('url.index')}}">Add New Url</a>
                                </li>							
                                <li>
                                    <a href="{{route('edit') }}">Manage Url</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->