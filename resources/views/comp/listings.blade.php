
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">GM Name</th>
      <th scope="col">GM Email</th>
      <th scope="col">Location</th>	  
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>      
    </tr>
  </thead>
  <tbody>
    @foreach($comp as $l)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $l->name }}</td>
      <td>{{ $l->description }}</td>
      <td>{{ $l->comp_gm }}</td>
      <td>{{$l->compgm_email}}</td>     
      <td>{{$l->location->name}}</td>
	   <td><a href="{{ route('comp.edit', $l->id) }}"><u>Edit</u></a></td>
      <td>
        {!! Form::open(['action' => array('companyController@destroy', $l->id),'method'=>'DELETE']) !!}
        <button type="submit"><u>Delete</u></a>

       {!! Form::close() !!}
      </td>         
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
{{ $comp->links() }}