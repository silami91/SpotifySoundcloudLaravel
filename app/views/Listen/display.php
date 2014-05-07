<!doctype html>
<html>
<head>
    <title>Listen To Your Music</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<body style="background-color: #009933">
<script src="js/bootstrap.min.js"></script>
<?php if(isset($spotifyQuery[0]->name)):?>
    <h1 style="text-align: center"><?php echo $spotifyQuery[0]->name?></h1>
<?php endif ?>

<br>
<br>
<div style="background-color:#81b71a">
<iframe src="https://embed.spotify.com/?uri=<?php echo $spotifyQuery[0]->href?>"
        width="45%" height="450"
        frameborder="0" allowtransparency="true">
        </iframe>
<iframe width="30%" height="450"
        scrolling="no" frameborder="no"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/users/<?php echo $soundcloudQuery?>&amp;auto_play=false&amp;hide_related=false&amp;visual=true">
        </iframe>
</div>
</body>
</html>