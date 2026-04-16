
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Admin Role</th>
      <th scope="col">Company</th>
      <th scope="col">Dept</th>	  
      <th scope="col">Location</th>		  
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($user as $l)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $l->name }}</td>
      <td>{{ $l->email }}</td>
      <td>@if($l->admin)
	     YES
	  @else
		NO
	  @endif
	  </td>
      <td>{{ $l->dept->company->name }}</td>
      <td>{{ $l->dept->name}}</td>	  
      <td>{{$l->dept->company->location->name}}</div></td>     
      <td><a href="{{ route('user.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('userController@destroy', $l->id),'method'=>'DELETE', 'files'=>true]) !!}
        <button type="submit"><u>Delete</u></a>

       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $user->links() }}