<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
              body {
            background-color: aliceblue;
            background-image: url('https://i.stack.imgur.com/jGlzr.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        </style>
</head>
<body>
    <h2 class="heading">Tiwan Labs Student Register Portal</h2>
    <div class="container">
    <div class="register">
    <form method="post" action="{{route('addstudents')}}">
        @csrf
        <p class="reg">Student addition page</p>
        <label for="nam">Name of Student</label><br>
        <input type="text" id="nam" name="name"><br>
        <label for="marks">Marks:</label><br>
        <input type="text" id="class" name="marks"><br>
        <label for="subject">Subject:</label><br>
        <input type="text" id="address1" name="subject"><br>
        <input type="submit" value="submit" id="address">
      </form>

    </div>
    </div>
</body>
</html>
