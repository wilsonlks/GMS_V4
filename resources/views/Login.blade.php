<!DOCTYPE html>
<html lang="en">
<head>
     
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
    GMS
</title>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script> 
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light container pt-4">
    </nav>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
                <form action="{{url('login')}}" method="POST" class="row g-3">
                    <h4 class="text-center">Login</h4>
                    <p>Department : <input type="text" value="" name="acid" /></p>
            <p>User Name: <input type="text" value="" name="loginid" /></p>

            <p>Password: <input type="text" value="" name="passwd" /></p>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark float-end">Login</button>
                    </div>
                </form>
                <hr class="mt-4">
                <div class="col-12">
                    <p class="text-center mb-0">Have not account yet? <a href="register">Signup</a></p>
                </div>
                
            </div>
        </div>
    </div>
    
</div>

<footer class="page-footer fixed-bottom font-small bg-dark pt-5">
</footer>
</body>
</html>

