<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7 border-0 mb-1 shadow-lg bg-white rounded p-4">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                </div>
                <form method="POST" action="{{route('user.register')}}">
                    @csrf
                    <div class="mb-3">
                        <input placeholder="Enter your name" value="{{old('name')}}" name="name" type="text" class="form-control rounded-pill p-4">
                        <span class="error-message text text-danger">{{ $errors->first('name') }}</span>
                      </div>
                    <div class="mb-3">
                      <input placeholder="Enter your email" value="{{old('email')}}" name="email" type="email" class="form-control rounded-pill p-4">
                      <span class="error-message text text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="mb-3">
                      <input placeholder="Password" value="{{old('password')}}" name="password" type="password" class="form-control rounded-pill p-4">
                      <span class="error-message text text-danger">{{ $errors->first('password') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill btn-block">Register</button>
                  </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</html>





