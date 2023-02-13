<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>To-Do List Web</title>
        
        <!-- style -->
        <link id="bootstrap-style" href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- style -->
    </head>
    <body>
        <!-- Logo image -->
        <div id="logo" class="text-center mt-4">
            <a href="/">
                <img src="images/logo2.jpg" class="rounded" alt="H&H TECH logo">
            </a>
        </div>
        <!-- Logo image -->

        <!-- Register Form -->
        <div class="container-fluid mt-4 mx-auto text-center" style="width: 500px;">
            <h3 style="color:blue">User Registration</h3>
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            ?>
            <form id="register-form" class="form" action="/register" method="post">
                @csrf  
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="name">
                    <label for="user_name">Name</label>
                    
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="user_mail" id="user_mail" placeholder="name@example.com">
                    <label for="user_mail">Email address</label>
                    
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="user_pass" id="user_pass" placeholder="password">
                    <label for="user_pass">Password</label>
                    
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- Register Form -->
    
    </body>
</html>