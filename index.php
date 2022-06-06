<?php
require ('view/display.php');

echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="collapse navbar-collapse" id="navbarNav">
		
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li>
				<a class="nav-link" href="anggota.php?target=list" role="button">Data Anggota</a>
			</li>
		</ul>
	</div>
</nav>
';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFK Association Library</title>
    <style>

    .title {
        padding: 120px;
        padding-bottom: 313px;
        background-image: url('img/3.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>

<body>
    <div class="text-center title">
        <h1>AFK Association Library</h1>
        <p>Blocked Street, 01 Nowhere </p>
    </div>
</body>

</html>