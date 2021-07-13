<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compat<table class="table">
      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      
</head>
<body>
  <a href="{{ route('post.create') }}" class="btn btn-primary mx-auto mt-5"> Create </a>
    @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
  <table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author Name</th>
      <th scope="col">Description</th>
       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 1; @endphp
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->user->name }}</td>
      <td>{{ $post->description }}</td>
      <td>
          
          <a class="btn btn-primary" href="{{ url('edit/post/'.$post->id) }}">  Edit </a>
          <a class="btn btn-danger" href="{{ url('remove/post/'.$post->id) }}">  Delete </a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
    
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>