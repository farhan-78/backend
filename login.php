<?php 
session_start();
include_once('connect.php');
$database = new database();
 
if(isset($_SESSION['is_login']))
{
    header('location:home.php');
}
 
if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  header('location:home.php');
}
 
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
 
    if($database->login($username,$password,$remember))
    {
      header('location:home.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Login Form</title>
  </head>
 
 <style>
     
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }

    input[type=submit]:hover {
    background-color: #45a049;
    }

    div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 10px;
    }

    button {
    background-color: #13b4ff;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    }

    button:hover {
    background-color: #cfc ;  
    }

    div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }

    a:link, a:visited {
    background-color: red;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    }

    a:hover, a:active {
    background-color: green;
 </style>
    
 <body>
 <div>
  <form class="form-signin" method="post" action="">
  <h1>Sing in</h1>
  <label for="username" class="sr-only">Username</label>
  <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
  <div class="checkbox mb-3">
    
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sing in</button>
  <a href="register.php" class="btn btn-lg btn-lg btn-block">Register</a>
  <footer>
    <p class="p-2 bg-warning text-white text-center">@dicky</p>
</footer>

 </form>
 </div>
</body>
</html>