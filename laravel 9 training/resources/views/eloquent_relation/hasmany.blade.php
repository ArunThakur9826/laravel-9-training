<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



    
<div class="container mt-5">
    
<table class="table table-bordered table-striped table-hover table-responsive">
    <h2>has many Relation Group By data</h2>
<thead>
    <tr class="text-center">
      <th>Id</th>
      <th>name</th>
      <th>deployment->id</th>
      <th>deployment->work</th>
      <th>deployment->language_id</th>
    </tr>
</thead>
<tbody>
    @foreach( $deployement as $data)
       <tr class="text-center">

        @php $item = $data->deployment  @endphp
        @foreach($item as $key => $value)
            <td>{{ $data->id }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $value->id }}</td>
            <td>{{ $value->work }}</td>
            <td>{{ $value->language_id }}</td>

        </tr>
        @endforeach
    @endforeach
</tbody>
</table>
</div>
</body>
</html>