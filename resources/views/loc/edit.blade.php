@extends('layouts.app1')

@section('content')
            <div class="col-md-12">
             <div class="panel panel-heading">
			
			 <h2>Edit Link</h2>

            </div>
        <div class="col-md-12">
            <div class="panel panel-default">
             <div class="panel-heading">

                <h4 class="panel-title">
              
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book"> </span> Edit Link</a>
 
                </h4>

             </div> <!-- /.panel heading -->

            <div id="collapseOne" class="panel-collapse collapse in">

                <div class="panel-body">
	{!! Form::open(['action' => array('locationController@update', $link->id),'method'=>'PUT', 'files'=>true]) !!}

                <div class="row">
                    <div class="col-md-8 col-md-offset-3">
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField">Link Name<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-5 "  style="margin-bottom: 10px">
                        {!! Form::text('locName',$link->name,array('class' => 'input-md form-control', 'id'=>'lnkName')); !!}
                        </div>  
                    </div>
            
          
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
                        <div class="controls col-md-8 "  style="margin-bottom: 10px">
                        {!! Form::submit('Update'); !!}
                        </div>                      
                    </div>

                    
                    </div>
                </div>
    {!! Form::close() !!}

                </div> <!-- /Panel Body Close -->
            </div> <!-- /.collapseOne-->

            </div> <!-- /.panel default -->
        </div> <!-- /col-md-12 -->
 
            </div> <!-- /.panel default -->  


		 @endsection