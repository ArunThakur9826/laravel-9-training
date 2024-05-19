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
    <a href="{{ route('relation') }}">Relation by Data --></a>

<table class="table table-bordered table-striped table-hover table-responsive">
    <h2>has many Relation Group By data</h2>
<thead>
    <tr class="text-center">
      <th>group_id</th>
      <th>name</th>
      <th>description</th>
      <th>id</th>
      <th>name</th>
      <th>email</th>
      <th>contact</th>
      <th>group_id</th>
    </tr>
</thead>
<tbody>
    @foreach($data as $da)
        </tr>
          @php $item = $da->member  @endphp
           @foreach($item as $key => $value)
            <td>{{$da->group_id}}</td>
            <td>{{$da->name}}</td>
            <td>{{$da->description}}</td>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->email}}</td>
            <td>{{$value->contact}}</td>
            <td>{{$value->group_id}}</td>
        </tr>
       @endforeach
    @endforeach
</tbody>
</table>
</div>