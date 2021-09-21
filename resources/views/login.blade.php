<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
  <style type="text/css">
      .error{
        color: red;
        font-weight: bold;
      }
  </style>
</head>
<body>

<div class="container">
  <h2>Login form</h2>
  <form action="{{ URL::to('/') }}/authuser" id="formlogin" method="post">
    @csrf
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" class="@error('email') is-invalid @enderror">
      @error('email')
          <div class="alert alert-danger">{{ 'Please enter an Email' }}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" name="password" class="@error('pwd') is-invalid @enderror">
      @error('pwd')
          <div class="alert alert-danger">{{ 'Please enter a Password' }}</div>
      @enderror
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
<footer>
<script type="text/javascript">
  $(document).ready(function() {
    $("#formlogin").validate({
    rules: {
    email: {
    required: true,
    email: true
    },
    password: {
    required: true
    },
    },
    messages: {
        email: {
          required: "Please enter an Email"
        },
        password: {
          required: "Please enter a Password"
        }
    }
    });
  });
</script>
</footer>
</html>
