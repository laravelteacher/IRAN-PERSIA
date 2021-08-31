

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- Scripts -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    

</head>

<body>
<div class="container mt-5">

    <!-- Success message -->
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
  
    @endif
    <!-- if email already to use alert error -->
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
    <!-- if input empty give error to User -->
    @if ($errors->any())
  <div class="alert alert-danger">
     <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
     </ul>
    
  </div>
@endif

    <form action="" method="post" action="{{ route('register.store') }}">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>

        <div class="form-group">
            <label>DOB</label>
            <input class="date form-control" name="dob"  type="text">
        </div>

        

        <div class="form-group">
            <label>Qualification</label>
            <input type="text" class="form-control" name="qualification" id="phone">
        </div>
        <div class="form-group">
                  <strong>address:</strong>
                  <textarea class="form-control" style="height:150px" name="address" placeholder="address"></textarea>
              </div>


        <input type="submit" name="send" value="Register" class="btn btn-dark btn-block">
    </form>
</div>
</body>
<script type="text/javascript">
    $('.date').datepicker({
        format: 'mm-dd-yyyy'
    });


</script>


</html>



