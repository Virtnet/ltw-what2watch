<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WHAT2WATCH - Login</title>
        <meta name="description" content="Are you bored and would like to watch some movie but do not know which one? This site is for you! every refresh explore new movies base on your genre.">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"  type='text/css'>
        <link rel="stylesheet" href="css/style.css"> 
    </head>
    <body id="otherPages">
          <?php require 'inc/header.php' ?>
    <main>
    <div id="loginform">
        <h1><i class="fas fa-lock"></i> Login for administrators</h1>
        <hr>
        <form action="loginform.php" method="POST" name="login">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="passwordlogin" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="loginsubmit" class="btn btn-primary">Submit</button>
        </form>
        <?php 
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'email'){
                echo '<hr><span class="text-danger">The email address does not exist!</span>';

            }
            else if ($_GET['error'] == 'password') {
                echo '<hr><span class="text-danger">The password is not correct!</span>';
            }
        }
        ?>
    </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/alljs.js"></script>
    </body>
</html>