
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
     <th scope="col">Sent date</th>	  
      <th scope="col">Subject</th>
      <th scope="col">Message </th>
      <th scope="col">View</th>
      <th scope="col">Dept</th>  
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($url as $l)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $l->created_at }}</td>	  
      <td>{{ $l->subject }}</td>
      <td>{{ $l->message }}</td>
      <td>@if($l->auth == 0)
		  NO
			@else
			YES
			@endif
	  
	  </td>
      <td>@if($l->dept==null)
			ALL
			@else
			{{$l->dept->name.' '.$l->dept->company->name.' '.$l->dept->company->location->name}}
			@endif
	  </td>

	  <td><a href="{{ route('message.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('MessageController@destroy', $l->id),'method'=>'DELETE', 'files'=>true]) !!}
        <button type="submit"><u>Delete</u></a>

       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $url->links() }}