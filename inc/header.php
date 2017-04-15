<html lang="en">
<head>
	<title>LOOK Algorithm</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/typed.css" />
	<link rel="stylesheet" href="css/dark-unica.css" />
	<link rel="stylesheet" href="css/constellation.css" />
	<link rel="stylesheet" href="css/styles/style.css" />
	<link rel="stylesheet" href="css/animate.css" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
</head>
<body>
	<?php if(!isset($constellation)) { ?>
	<div class="global-overlay" style="opacity: 1; transform: translateX(100%);">
		<canvas id="constellationel" width="100vw" height="100vh" style="overflow-y: hidden;"></canvas>
		<div class="overlay skew-part"></div>
	</div>
	<?php } ?>