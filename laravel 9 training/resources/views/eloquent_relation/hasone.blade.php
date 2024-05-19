<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>relation</title>
</head>
<body>
    
</body>
</html>


<div class="container mt-5">
    <a href="{{ route('relationdata') }}">Group_By_Data --></a>
<table class="table table-bordered table-striped table-hover table-responsive">
    <h2>One To One Relation</h2>
    <thead>
        <tr class="text-center">
          <th>Id</th>
          <th>name</th>
          <th>Email</th>
          <th>contact</th>
          <th>group_id</th>
          <th>group_id</th>
          <th>groupname</th>
          <th>description</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $da)
     </tr>
        <td>{{$da->id}}</td>
        <td>{{$da->name}}</td>
        <td>{{$da->Email}}</td>
        <td>{{$da->contact}}</td>
        <td>{{$da->group_id}}</td>
        <td>{{$da->getgroup->group_id}}</td>
        <td>{{$da->getgroup->name}}</td>
        <td>{{$da->getgroup->description}}</td>
    
      </tr>
    @endforeach
    </tbody>
</table>
</div>