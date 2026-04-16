@extends('layouts.app1')

@section('content')

			@if(count($mostv)>0)
        <div class="col-md-12">
            <div class="panel panel-info">
             <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-bookmark"> </span>   <u>Most Visited</u></a>
 
                </h4>

             </div> <!-- /.panel heading -->

            <div id="collapseOne" class="panel-collapse collapse ">

                <div class="panel-body">
			@foreach($mostv as $m)
            <div class="col-xs-2 col-md-2 col-lg-2">
                <a href="{{URL::to('url/'.$m->link->id)}}" data-placement="right" data-html="true" data-toggle="tooltip" title="{{ $m->link->name }} <br> {{$m->link->url}}">
                <div class="thumbnail">
                    <img src="{{asset("uploads/".$m->link->img1)}}" alt="Sample Image">
                    <div class="caption" >
                   
                                  
                    </div>
                </div></a>
            </div>				

			@endforeach
				
					
				</div> <!-- /.Panel Body-->

            </div> <!-- /.collapse One -->
        </div> <!-- /.panel default -->
	
		</div> <!-- /col-md-12 -->
				@endif
            <div class="col-md-12">
                          <div class="panel panel-info">
             <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-home "></span>  <u>Applications</u></a>
 
                </h4>

             </div> <!-- /.panel heading -->

            <div id="collapseTwo" class="panel-collapse collapse in">

            <div class="panel-body">
@foreach($links->chunk(3) as $chunk)	
		
			<div class="row">
	@foreach($chunk as $link)
            <div class="col-xs-4 col-md-4 col-lg-4">
                <div class="thumbnail">
				 <a href="{{URL::to('url/'.$link->id)}}" data-placement="top" data-html="true" data-toggle="tooltip" title="{{ $link->name }} <br> {{$link->url}}">
                    <img src="{{asset("uploads/".$link->img1)}}" class="img-responsive" width="450" height="150">
                    <div class="caption" >
                        <h5>{{$link->name}}</h5>
                        <p style="font-size:0.95vw" class="h5"><u>{{$link->url}}</u></p>
                        
                    </div>
					</a>
                </div>
            </div>
			@endforeach
			</div>
@endforeach  
            </div> <!-- /.collapseOne-->

            </div> <!-- /.panel default -->  

            </div>
					
</div>

@if(count($dept)>0)
            <div class="col-md-12">
                          <div class="panel panel-info">
             <div class="panel-heading">

                <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-log-in "></span>  <u>Department</u></a>
 
                </h4>

             </div> <!-- /.panel heading -->

            <div id="collapseThree" class="panel-collapse collapse in">

            <div class="panel-body">
@foreach($dept->chunk(3) as $chunk)	
		
			<div class="row">
	@foreach($chunk as $link)
            <div class="col-xs-4 col-md-4 col-lg-4">
                <div class="thumbnail">
				 <a href="{{URL::to('url/'.$link->id)}}" data-placement="top" data-html="true" data-toggle="tooltip" title="{{ $link->name }} <br> {{$link->url}}">
                    <img src="{{asset("uploads/".$link->img1)}}" class="img-responsive" width="450" height="150">
                    <div class="caption" >
                        <h5>{{$link->name}}</h5>
                        <p style="font-size:0.95vw" class="h5"><u>{{$link->url}}</u></p>
                        
                    </div>
					</a>
                </div>
            </div>
			@endforeach
			</div>
@endforeach  
            </div> <!-- /.collapseOne-->

            </div> <!-- /.panel default -->  

            </div>
					
</div>	


@endif
		 @endsection