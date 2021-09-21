<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
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
<form action="{{ URL::to('/') }}/login" method="post" id="formregister">
    @csrf
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>

    <div class="form-group">
    <label for="uname"><b>User Name</b></label>
    <input type="text" name="uname" id="uname" class="form-control @error('uname') is-invalid @enderror">
    @error('uname')
        <div class="error">{{ 'Please enter an User Name' }}</div>
    @enderror
    </div>
    
    <div class="form-group">
    <label for="email"><b>Email</b></label>
    <input type="email" id="email-add" name="email" class="form-control">
    <span id="email-error" style="color: red; font-weight: bold;"></span>
    @if($errors->has('email'))
      <div class="error">{{ $errors->first('email') }}</div>
    @endif
    </div>  

    <div class="form-group">
    <label for="contactno"><b>Contact No</b></label>
    <input type="text" name="contactno" id="contactno" class="form-control">
    <span id="contact-error" style="color: red; font-weight: bold;"></span>
    @if($errors->has('contactno'))
      <div class="error">{{ $errors->first('contactno') }}</div>
    @endif
    </div>

    <div class="form-group">
    <strong>Gender</strong>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="male" checked>
      <label class="form-check-label" for="gender">
      Male
      </label>
      <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female">
      <label class="form-check-label" for="gender">
      Female
      </label>
    </div>
    </div>

    <div class="form-group">
    <label for="psw"><b>Password</b></label>
    <input type="password" name="password" class="form-control">
    @if($errors->has('password'))
      <div class="error">{{ $errors->first('password') }}</div>
    @endif
    </div>    

    <div class="clearfix">
      <button type="submit" class="btn btn-default signupbtn">Sign Up</button>
    </div>
</form>
<a href="{{ URL::to('/') }}/login">Login Here</a>
</div>
</body>
<footer>
<script type="text/javascript">
  $(document).ready(function() {
    $('#email-add123').blur(function(){
          var email = $('#email-add').val();
          var _token = $('input[name="_token"]').val();
          $.ajax({
              type: "POST",
              url: '{{url('checkemail')}}',
              data: {
                email:email, 
                _token:_token
              },
              dataType: "json",
              success: function(result) {
                  if(result == 1){
                    $('#email-error').html("The email has already been taken");
                    $('#email-add').focus();
                  }
                  else{
                    $('#email-error').html("");
                  }
              }
              
          });
    });
    $('#contactno123').blur(function(){
          var cno = $('#contactno').val();
          var _token = $('input[name="_token"]').val();
          $.ajax({
              type: "POST",
              url: '{{url('checkcontact')}}',
              data: {
                cno:cno, 
                _token:_token
              },
              dataType: "json",
              success: function(result) {
                  if(result == 1){
                    $('#contact-error').html("The Contact No has already been taken");
                    $('#contactno').focus();
                  }
                  else{
                    $('#contact-error').html("");
                  }
              }
              
          });
    });
    $("#formregister").validate({
    rules: {
    uname: "required",
    email: {
    required: true,
    email: true
    },
    password: {
    required: true,
    minlength: 8
    },
    contactno: {
    required: true,
    maxlength: 10
    }
    },
    messages: {
        uname: {
          required: "Please enter an User Name"
        },
        email: {
          required: "Please enter an Email"
        },
        password: {
          required: "Please enter a Password",
          minlength: "Please enter at least 8 characters"
        },
        contactno: {
          required: "Please enter a Contact No",
          maxlength: "Please enter at least 10 characters"
        }
    }
    });
    jQuery.fn.ForceNumericOnly =
    function()
    {
        return this.each(function()
        {
            $(this).keydown(function(e)
            {
                var key = e.charCode || e.keyCode || 0;
                return (
                    key == 8 || 
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105));
            });
        });
    };
    $("#contactno").ForceNumericOnly();
  });
</script>
</footer>
</html>