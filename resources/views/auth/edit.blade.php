@extends('layouts.app1')

@section('content')
            <div class="col-md-12">
             <div class="panel panel-heading">
			
			 <h2>Edit User</h2>

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
{!! Form::open(['action' => array('userController@update', $user->id),'method'=>'PUT', 'files'=>true]) !!}

                <div class="row">
                    <div class="col-md-8 col-md-offset-3">
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField">Name<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-5 "  style="margin-bottom: 10px">
                        {!! Form::text('uName',$user->name,array('class' => 'input-md form-control', 'id'=>'uName')); !!}
                        </div>  
                    </div>
            
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField">Email<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-5 "  style="margin-bottom: 10px">
                        {!! Form::email('uEmail',$user->email,array('type'=>'email', 'class' => 'input-md form-control', 'id'=>'uEmail')); !!}
                        </div>  
                    </div>
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField">Password<span class="asteriskField">*</span> </label>
                        <div class="controls col-md-5 "  style="margin-bottom: 10px">
                        {!! Form::text('upassword','',array('type'=>'email', 'class' => 'input-md form-control', 'id'=>'uPassword')); !!}
                        </div>  
                    </div>					
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField">Admin Role<span class="asteriskField"></span> </label>
                        <div class="controls col-md-5 "  style="margin-bottom: 10px">
                        {!! Form::select('uRole',[1=>'YES',0=>'NO'],$user->admin,array('class' => 'input-md form-control', 'id'=>'uRole')); !!}
                        </div>  
                    </div>
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField">Company<span class="asteriskField"></span> </label>
                        <div class="controls col-md-5 "  style="margin-bottom: 10px">
                        {!! Form::select('uComp',$comp,$user->dept->company_id,array('class' => 'input-md form-control', 'id'=>'company')); !!}
                        </div>  
                    </div>
                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField">Department<span class="asteriskField"></span> </label>
                        <div class="controls col-md-5 "  style="margin-bottom: 10px">
                        {!! Form::select('uDept',$dept,$user->dept->id,array('class' => 'input-md form-control', 'id'=>'dept')); !!}
                        </div>  
                    </div>					

                        <div id="div_id_select" class="form-group required">
                        <label for="id_select"  class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
                        <div class="controls col-md-8 "  style="margin-bottom: 10px">
                        {!! Form::submit('Update', array('class'=>'btn btn-info')); !!}
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