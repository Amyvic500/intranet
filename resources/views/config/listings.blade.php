
<table class="table table-responsive table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">App Name</th>
      <th scope="col">Left Ad</th>
      <th scope="col">Right Ad</th>	   
      <th scope="col">Edit</th>
    
    </tr>
  </thead>
  <tbody>
    @foreach($url as $l)
    <tr>
      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $l->appName }}</td>
	<td><img src="{{asset("uploads/".$l->leftImg)}}" alt="{{$l->name}}" width="50" height="50"> </td>     
      <td><img src="{{asset("uploads/".$l->rightImg)}}" alt="{{$l->name}}" width="50" height="50"></td>     
      <td><a href="{{ route('config.edit', $l->id) }}"><u>Edit</u></a></td>
               
    </tr>
    @endforeach
  </tbody>
</table> <!-- /table -->
