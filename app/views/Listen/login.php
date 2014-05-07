<!doctype html>
<html>
<head>
    <title>Login to Listen</title>
</head>

<body style="background-color: #009933">

<?php if(Session::has('failed')): ?>
    <p style="text-align:center;background-color:red; color:white;"><?php echo Session::get('failed')?></p>
<?php endif?>

<?php if(Session::has('logout')): ?>
    <p style="text-align:center;background-color:green; color:white;"><?php echo Session::get('logout')?></p>
<?php endif?>
<a style="float: right;" href="<?php echo url('logout')?>">Logout</a>
<?php
if(isset(Auth::user()->email)): ?>
    <h3 style="float: right;"><?php echo Auth::user()->email?></h3>
<?php endif ?>
<div style="background-color:#81b71a">
    <h1 style="text-align: center ;">Welcome to Listen</h1>
    <h2>Where you search for your music and you get it all.</h2>
    <form style="margin: auto" name="login" action="<?php echo url("login")?>" method="post"">
        Username: <input type="text" name="username">
        <br>
        Password: <input type="password" name="password">
        <br>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>