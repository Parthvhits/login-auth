<!DOCTYPE html>
<html>
    <head>
        <title>List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Contact No</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @php
            $cnt=1;
            @endphp
            @foreach($allContent as $user)
                <tr>
                <th>{{ $cnt }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->contactno }}</td>
                <td><a href="/update/{{$user->id}}">Edit</a></td>
                <td><a href="/delete/{{$user->id}}" id="btndel">Delete</a></td>
                </tr>
            @php
            $cnt++;
            @endphp
            @endforeach
            </tbody>
        </table>
        <a href="{{ URL::to('/') }}/logout">Logout</a>
    </div>
    </body>
    <footer>
        <script type="text/javascript">
            $('#btndel').click(function(){
                alert("Do you want to delete this record?");
            });
        </script>
    </footer>
</html>