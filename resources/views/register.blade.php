@extends('layout.master')
@section('content')

    <div class="registerbox">
        <div class="registerheader" style="width: 100%; height:50px; background:#50a4e4">
            <h2 style="color: black; font-weight: 100">Register</h2>
        </div>
        
    <form action="/register" method="post" class="formregister">
        @csrf

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" name="username" class="usernameRegister">
  
    <label for="uname"><b>E-Mail Address</b></label>
    <input type="email" name="email" class="emailField">

    <label for="password"><b>Password</b></label>
    <input type="password"  name="password" class="passwordField">
    <label for="confirmpassword"><b>Confirm Password</b></label>
    <input type="password"  name="confirmpassword" class="confPasswordRegister">

                @if ($errors->any())
                    <div style="width:100%; display:flex;justify-content: center;align-items: center; " role="alert">
                        <h3 style="color: red">{{ $errors->first() }}</h3>
                    </div>
                @endif
    

    <button type="submit" class="registerButton">Register</button>

  </div>


</form>

        </div>
    </div>



@endsection