<!doctype html>
<html>
<head>
    <title>Search For Your Music</title>
</head>

<body style="background-color: #009933">
<?php if(Session::has('welcome')): ?>
    <p style="text-align:center;background-color:green; color:white;"><?php echo Session::get('welcome')?></p>
<?php endif?>
<?php if(Session::has('error')): ?>
    <p style="text-align:center;background-color:red; color:white;"><?php echo Session::get('error')?></p>
<?php endif?>
<?php if(Session::has('empty')): ?>
    <p style="text-align:center;background-color:red; color:white;"><?php echo Session::get('empty')?></p>
<?php endif?>

<a style="float: right;" href="<?php echo url('logout')?>">Logout</a>
<h3 style="float: right;"><?php echo Auth::user()->email?></h3>
<div style="background-color:#81b71a" >
<h2>What do you want to listen to?</h2>
<form name="searchForm" action="<?php echo url("display")?>" method="get">
    <p>Please enter a song, artist, or album.</p>
    <input type="text" name="queryString">
    <br>
    <select name="type">
        <option>Artist</option>
        <option>Song</option>
        <option>Album</option>
    </select>
    <input type="submit" value="Submit">
</form>
</div>
</body>
</html>