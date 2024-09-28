<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    @if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            alert('{{ $error }}');
        @endforeach
    </script>
@endif
    <h2 class="heading">Tiwan Labs Teacher Register Portal</h2>
    <div class="container">
    <div class="register">
    <form method="post" action="{{route('addteachers')}}">
        @csrf
        <p class="reg">REGISTRATION PAGE</p>
        <label for="nam">Name of teacher</label><br>
        <input type="text" id="nam" name="name"><br>
        <label for="fname">User Name</label><br>
        <input type="text" id="fname" name="username"><br>
        <label for="fname">Email</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="lname">Password:</label><br>
        <input type="password" id="pass1" name="password" ><br><br>
        <label for="class">Address:</label><br>
        <input type="text" id="address1" name="address1"><br>
        <input type="submit" value="submit" id="sub1">
      </form>




    </div>
    </div>
</body>
</html>
