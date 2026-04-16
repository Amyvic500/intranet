
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">HOD Name</th>
      <th scope="col">HOD Email</th>
      <th scope="col">Company</th>	  
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($dept as $num=>$l)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $l->name }}</td>
      <td>{{ $l->description }}</td>
      <td>{{ $l->dept_hod }}</td>
      <td>{{$l->depthod_email}}</td>     
      <td>{{$comp[$num]}}</td>
	   <td><a href="{{ route('dept.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('departmentController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button type="submit"><u>Delete</u></a>

       {!! Form::close() !!}
      </td>       
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $dept->links() }}