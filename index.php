<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div id="headers"></div>
        <form id="loginForm" method="POST">
            <h1 class="text-center">Login Form</h1>
            <div class="form-group">
                <label for="username">UserName:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div id="response" class="mt-3"></div>
        <div id="content"></div>
    </div>

    <script>
        $(document).ready(function () {
            $("#loginForm").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    url: 'login.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.uRole == 'admin' || response.uRole == 'user') {
                            $('#content').load('indexOne.php');
                        } else {
                            $('#response').text(response.message).addClass('alert alert-danger');
                        }
                    },
                    error: function () {
                        $('#response').text('Error occurred while processing your request.').addClass('alert alert-danger');
                    }
                });
            });
        });
    </script>
</body>

</html>
