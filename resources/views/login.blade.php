<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
<form action="{{url('users/login')}}" method="post">
   @csrf
    <div class="container" style="margin-top:200px; width:80%;">
        <div class="row">
            <div class="col-md-12">
                <h2>Login!</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
           
            <div class="col-md-12">
                <label for="" class="form-label">Mobile:</label>
                <input type="number" name="mobile" id="" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="" class="form-label">Password:</label>
                <input type="password" name="password" id="" class="form-control">
            </div>
            <div class="col-md-12">
                <input type="submit" name="submit" id="" class="btn btn-outline-danger mt-5">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('/')}}">New User? </a>
            </div>
        </div>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>