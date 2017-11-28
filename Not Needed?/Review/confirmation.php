<!DOCTYPE html>
<html lang="en">
<head>
  <title>test result page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="jScript.js"></script>
</head>
<body>
  <!--  Top header   -->
  <div class="jumbotron">
    <div class="container text-center">
      <h1>Student Green Fee Review</h1>
      <p>put something here</p>
    </div>
  </div>

  <!--  side bar   -->
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2 sidenav" class="sidebars">
      </div>

      <!--  questions to enter quiz   -->
      <div class="col-sm-8">

				<h1 class="container text-center">Complete</h1>
				<?php
					$c=0;
					$d=100;
					$db = new PDO("mysql:dbname=344Database", "root", "");
					$ques = $db->query("SELECT question FROM questions");
				    foreach($ques as $que) {
						$x = $_POST[$c];
						$y = $_POST[$d];
				    $lines = $db->query("INSERT INTO `Scores` (`Question`,`Comment`,`Score`) VALUES ('".$que["question"]."', '".$y."','".$x."');");
					$c=$c+1;
					$d=$d+1;
					}
				?>

				<p>Your response for the proposals have been saved,
				thank you for taking the time to review for Green Fee.</p>

				<img src="checkmark.gif" alt="checkmark" width="700px" id="check" class="container text-center">

      </div>
        <div class="col-sm-2 sidenav" class="fix">
        </div>
      </div>
    </div>
    <footer class="container-fluid">
      <p>Copyright Green Fee</p>
    </footer>
  </body>
  </html>
