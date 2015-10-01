<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">

    <link rel="stylesheet" type="text/css" href="stylesheets/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="stylesheets/github-dark.css" media="screen">
    <link rel="stylesheet" type="text/css" href="stylesheets/print.css" media="print">

    <title>Taslima.GitHub.io by taslimamansuri</title>
  </head>

  <body>
<form method='post' action='index.html'>
    <header>
      <div class="container">
        <h1>Taslima.GitHub.io</h1>
        <h2>login page </h2>

        
      </div>
    </header>

    <div class="container">
      <section id="main_content">
        <p>
        <?php
session_start();
$php_timestamp = time();
$php_timestamp_date = date("Y-m-d H:i:s", $php_timestamp);
?>

</p>

Login


<p></p>



<div id="wrapper">
<table align="center">
    <tr>
        <td colspan="5" align="center">
<h1>
Login</h1>
<hr height="2">
</td>
    </tr>
    
    <tr>
        <td align="center">Email:</td>
        <td><input type='text' name='email'/></td>
    </tr>
    <tr>
        <td align="center">Password:</td>
        <td><input type='password' name='pass'/></td>
        
    </tr>
    <tr>
        <td colspan="5" align="center"><input type='submit' name='login' value='Login'/></td>
    </tr>

</table>
</div>


Not Registered yet? 

<p><a href="register.php">Sign Up Here</a><br>
<a href="admin_login.php">Admin Login</a></p>



<?php

mysql_connect ("localhost","root","taslima");
mysql_select_db ("register_db");
if(isset($_POST['login'])){

$user_email=$_POST['email'];
$user_pass=$_POST['pass'];

if($user_email==''){

    echo"<script>alert('please enter email!')</script>";
    
}
if($user_pass==''){

    echo"<script>alert('please enter password!')</script>";
  
}
$check_user="select * from users where user_email='$user_email' AND user_pass='$user_pass'";

$run = mysql_query($check_user);
$get= mysql_fetch_assoc($run);

$id=$get['id'];

if(mysql_num_rows($run)>0){

    $_SESSION['email']=$user_email;

    echo "<script>window.open('welcome.php?id=$id', '_self')</script>";
    $query = "update users set login_time='$php_timestamp_date' where user_email='$user_email'";
    mysql_query($query); 
    //or die('Error in MySQL query : '.mysql_error()); 
}
else{
    echo "<script>alert('Email or password is incorrect!')</script>";
}


}
?></p>
      </section>
    </div>

    
  </body>
</html>
