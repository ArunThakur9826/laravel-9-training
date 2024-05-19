<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>sqlview</title>
</head>
<body>


    <div class="container mt-5">
    
        <table class="table table-bordered table-striped table-hover table-responsive">
            <h2>Create using view  data</h2>
        <thead>
            <tr class="text-center">
              <th>Id</th>
              <th>name</th>
              <th>email</th>

            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user)
               <tr class="text-center">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
        </tbody>
        </table>
        </div>
    
</body>
</html>