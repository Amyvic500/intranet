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
{!! Form::open(['action' => array('MessageController@update', $m->id), 'method'=>'PUT']) !!}

				<div class="row">
					<div class="col-md-12 col-md-offset-1">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3  requiredField">Subject <span class="asteriskField">*</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::text('subject',$m->subject,array('class' => 'input-md form-control', 'id'=>'subject', 'required')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3  requiredField">Messages<span class="asteriskField">*</span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::textarea('msg',$m->message,array('class' => 'input-md form-control', 'id'=>'msg', 'cols'=>'3', 'rows'=>'4')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3  requiredField">Enable View<span class="asteriskField"></span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::select('authorize',['1'=>'YES', '0'=>'NO'],$m->auth,array('class' => 'input-md form-control', 'id'=>'authorize')); !!}
						</div>	
					</div>					
					<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3  requiredField">Department To <span class="asteriskField"></span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::select('deptId[]',$dept,'',array('multiple'=>true, 'class' => 'form-control', 'id'=>'deptId')); !!}
						<i> Select multiple dept as it applies, leave blank for General view.</i>
						</div>	
					</div>	
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-3  requiredField"><span class="asteriskField"></span> </label>
						<div class="controls col-md-8"  style="margin-bottom: 10px">
						{!! Form::submit('UPDATE', array('class'=>'btn btn-info')); !!}
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

            </div>

		 @endsection