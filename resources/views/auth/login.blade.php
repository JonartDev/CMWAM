<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>
<body style="background-color:#455357; color:white;">
    <div class="container">
        <div class="row" style="margin-top:50px;">
            <div class="col-md-4 col-md-offset-4">
                <center><div><img src="/IDEASERV-LOGO-WHITE.png" style="height: 90px; margin-top:10px;" class="pr-3">
               <h4><p> CUSTOMER WARRANTY AND</p>
                 <p>MA MONITORING SYSTEM</p> </h4><hr>
                </div></center><br>
                    <center><img src="http://tms.ideaserv.com.ph:8080/images/user.png" alt="User Avatar" class="img-fluid shadow-1-strong" style="width: 100px;border: 2px solid #eee;border-radius: 65px;"></center><br><br>
                    <form action="{{ route('auth.check')}}" method="post" >
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{Session::get('fail')}}
                        </div>                       
                        @endif
                        @csrf
                        <div class="form-group">
                            <!-- <label>Email</label> -->
                            <input type="text" class="form-control" name="email" placeholder="Enter Email address" value="{{ old('email')}}">
                            <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group">
                            <!-- <label>Password</label> -->
                            <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password')}}">
                            <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div><br>               
                        <button type="submit" style="background-color:#7b8d93" class="btn btn-block btn-primary">LOGIN</button><br>
                        <!-- <a href="{{ route('auth.register')}}">I dont have an account, create new.</a><br> -->
                        <!-- <center><a href="{{ route('auth.register')}}"> Forgot password?</a></center> -->
                    <h4 class="text-center"><strong>CLICK LOGIN BUTTON TO START</strong></h3>
                    </form>
            </div>
        </div>
    </div>
    
</body>
</html>