<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
  </style>
</head>
<body>
    <h2 class="sky">Teachers login</h2>

    <div class="container">
        <div>
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" class="username" required>
        </div>
        <div>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" class="password" required>
        </div>
        <button type="button" class="submit12">Login</button>
        <label>
            <input type="checkbox" name="remember" id="remember"> Remember me
        </label>
    </div>

    <div>
        <a href="/register" class="butt">Register</a>
        <p class="text1">If not registered please click here</p>
    </div>

    <script>
        $('body').on('click', '.submit12', function() {
            var username = $('.username').val();
            var password = $('.password').val();
            if (!username) {
           alert("Username is required.");
        } else if (username.length > 255) {
            alert("Username cannot exceed 255 characters.");
        }
        if (!password) {
            alert("Password is required.");
        } else if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
        }

            $.ajax({
                url: "{{ route('loginpass') }}",
                type: 'POST',
                data: {
                    username: username,
                    password: password,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success (redirect or show a success message)
                    alert('login successfull')
                    window.location.href = '/showstudents'; // Redirect on success
                },
                error: function(xhr) {
                    // Handle error (show error message)
                    alert('Login failed: ' + xhr.responseJSON.message);
                }
            });
        });
    </script>
</body>
</html>
