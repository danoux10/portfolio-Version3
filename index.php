<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Dany Barbe - Portfolio</title>

	<link rel="stylesheet" href="styles/index.css">
	<script src="script/theme.js" defer></script>
	<script src="script/navbar.js" defer></script>
	<script src="script/projectNumber.js" defer></script>
	<script src="script/project.js" defer></script>
</head>
<body>
<?php include_once 'pages/header.html'; ?>
<main>
  <?php
    include_once 'pages/presentation.html';
    include_once 'pages/diplomas.html';
    include_once 'pages/skills.html';
    include_once 'pages/projects.html';
    include_once 'pages/objectives.html';
  ?>
</main>
<?php include_once 'pages/footer.html'; ?>
</body>
</html>