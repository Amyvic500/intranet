				<div class="row">
					<div class="col-md-12">
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Date <span class="asteriskField">*</span> </label>
						<div class="controls col-md-10"  style="margin-bottom: 10px">
						{!! Form::text('subject',$m->created_at,array('class' => 'input-md form-control', 'id'=>'subject', 'readonly')); !!}
						</div>	
					</div>					
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Subject <span class="asteriskField">*</span> </label>
						<div class="controls col-md-10"  style="margin-bottom: 10px">
						{!! Form::text('subject',$m->subject,array('class' => 'input-md form-control', 'id'=>'subject', 'readonly')); !!}
						</div>	
					</div>
						<div id="div_id_select" class="form-group required">
						<label for="id_select"  class="control-label col-md-2  requiredField">Messages<span class="asteriskField">*</span> </label>
						<div class="controls col-md-10"  style="margin-bottom: 10px">
						{!! Form::textarea('msg', $m->message,array('class' => 'input-md form-control', 'id'=>'msg', 'cols'=>'3', 'rows'=>'4', 'readonly')); !!}
						</div>	
					</div>

					</div>	
					
					</div>       
			
					