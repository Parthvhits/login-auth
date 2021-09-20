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
        @foreach($users as $user)
            <tr>
            <th>{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->contactno }}</td>
            <td><a href="#">Edit</a></td>
            <td><a href="#">Delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/logout">Logout</a>
    </body>
</html>