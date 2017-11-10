<!DOCTYPE html>
<html lang="en">
	<head>
		<title>template</title>
		<meta charset="utf-8">
		<script src="jScript.js" type = "text/javascript"></script>
		<link rel="stylesheet" href="bootstrap/js/bootstrap.js">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="style.css">

		<meta name="viewport" content="width=device-width, initial-scale=1">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	</head>
	<body>

	<h1> hello world</h1>
	
	<canvas id="barChart"></canvas>

	<h2>Dropdowns</h2>
  <p>The .dropdown-header class is used to add headers inside the dropdown menu:</p>
  <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Dropdown button
    </button>
    <div class="dropdown-menu">
      <h5 class="dropdown-header">Proposal information</h5>
	  <?php

		$proposalArray = array("proposal 1", "proposal 2","proposal 3", "proposal 4");
		$commentList = array("comment1", "comment2","comment3", "comment4");
		$commentQuestion = array("Question1", "Question2","Question3", "Question4");

		foreach ($proposalArray as $title) {
			'<a class="dropdown-item">'.$title.'</a>';
		}
		print '<h5 class="dropdown-header">Dropdown header</h5>';
		foreach ($commentQuestion as $question) {
			print '<h5 class="dropdown-header">'.$question.'</h5>';
			foreach ($commentList as $comment)	{
		print '<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">';
		
		print	'<a class="dropdown-item">'.$comment.'</a>';
		}
	}
		?>
    </div>
  </div>

	<div class="container">
  <h2>Dropdowns</h2>
  <p>The .dropup class makes the dropdown menu expand upwards instead of downwards:</p>
  <div class="dropup">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Dropdown button
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Link 1</a>
      <a class="dropdown-item" href="#">Link 2</a>
    </div>
  </div>

	
	
	
        
	
	</body>
	
</html>