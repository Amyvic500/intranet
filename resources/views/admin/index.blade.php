@extends('layouts.app1')

@section('content')
 <div class="col-md-12">
             <div class="panel panel-heading">
			
			 <h2>ESRNL Intranet Portal</h2>
                <div class="panel-title">
                    <h5 class="text-primary"><span class="fa fa-envelope text-muted"></span> There will be a staff meeting at 12pm conference room, everyone Should be there !</h5> </div>
             </div>
            </div>
        <div class="col-md-12">
            <div class="panel panel-info">
             <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-bookmark"> </span>   <u>Most Visited</u></a>
 
                </h4>

             </div> <!-- /.panel heading -->

            <div id="collapseOne" class="panel-collapse collapse ">

                <div class="panel-body">

                    <div class="col-lg-3 col-md-6 col-xs-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-3">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-3">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-3">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                

                </div>
            </div> <!-- /.collapseOne-->

            </div> <!-- /.panel default -->
        </div> <!-- /col-md-12 -->
            <div class="col-md-12">
                          <div class="panel panel-info">
             <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-home "></span>  <u>Applications</u></a>
 
                </h4>

             </div> <!-- /.panel heading -->

            <div id="collapseTwo" class="panel-collapse collapse in">

                <div class="panel-body">
                <div class="row">
            <div class="col-xs-4">
                <a href="http://192.168.200.241:3000">
                <div class="thumbnail">
                    <img src="conference1.jpg" alt="Sample Image">
                    <div class="caption">
                        <h4>Conference Room Manager</h4>
                        <p><u>192.168.200.241:3000</u></p>
                        
                    </div>
                </div></a>
            </div>
            <div class="col-xs-4">
                <a href="http://192.168.1.2:8090">
                <div class="thumbnail">
                    <img src="sophos1.jpg" alt="Sample Image">
                    <div class="caption">
                        <h4>Sophos</h4>
                        <p><u>192.168.1.2:8090</u></p>
                   
                    </div>
                </div></a>
            </div>
            <div class="col-xs-4">
                <a href="http://192.168.200.241">
                <div class="thumbnail">
                    <img src="waybill1.jpg" alt="Sample Image">
                    <div class="caption">
                        <h4>Waybill Manager</h4>
                        <p><u>192.168.200.241</u></p>
                       
                    </div>
                </div></a>
            </div>

                </div>
                <div class="row">
            <div class="col-xs-4">
                <a href="http://192.168.200.241:3000">
                <div class="thumbnail">
                    <img src="conference1.jpg" alt="Sample Image">
                    <div class="caption">
                        <h4>Conference Room Manager</h4>
                        <p><u>192.168.200.241:3000</u></p>
                        
                    </div>
                </div></a>
            </div>
            <div class="col-xs-4">
                <a href="http://192.168.1.2:8090">
                <div class="thumbnail">
                    <img src="sophos1.jpg" alt="Sample Image">
                    <div class="caption">
                        <h4>Sophos</h4>
                        <p><u>192.168.1.2:8090</u></p>
                   
                    </div>
                </div></a>
            </div>
            <div class="col-xs-4">
                <a href="http://192.168.200.241">
                <div class="thumbnail">
                    <img src="waybill1.jpg" alt="Sample Image">
                    <div class="caption">
                        <h4>Waybill Manager</h4>
                        <p><u>192.168.200.241</u></p>
                       
                    </div>
                </div></a>
            </div>
            
                </div>                
            </div> <!-- /.collapseOne-->

            </div> <!-- /.panel default -->  

            </div>

@endsection