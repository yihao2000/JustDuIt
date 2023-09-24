@extends('layout.master')
@section('content')


    <div class="loginbox" style="margin-top: 10%">
        <div class="registerheader" style="width: 100%; height:50px; background:#50a4e4">
            <h2 style="color: black; font-weight: 100">Login</h2>
        </div>
        
    <form action="/login" method="post" class="formregister">
        @csrf

  <div class="container">
  
    <label for="email"><b>E-Mail Address</b></label>
    <input type="email" name="email" class="emailField">

    <label for="psw"><b>Password</b></label>
    <input type="password"  name="password" class="passwordField">

    <label>
      <input type="checkbox" name="remember"> Remember me
    </label>

                @if ($errors->any())
                    <div style="width:100%; display:flex;justify-content: center;align-items: center; " role="alert">
                        <h3 style="color: red">{{ $errors->first() }}</h3>
                    </div>
                @endif
    

    <button type="submit" class="registerButton">Login</button>

  </div>


</form>

        </div>
    </div>







@endsection