<!DOCTYPE html>
<html lang="en">
<head>
  <title>Review Confirmation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="reviewStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/ico" href="GreenFeeIcon.ico">
</head>
<body>
  <!--  Top header   -->
  <div class="jumbotron">
    <div class="container text-center">
      <img class="logo" src="GreenFee.png" width="200px">
      <h1>Student Green Fee Review</h1>
      <p>Review Submitted</p>
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
					$var = 1;
					$c=0;
					$d=100;
					$e=201;

					$db = new PDO("mysql:dbname=finalreview", "root", "");
					$ques = $db->query("SELECT title FROM question");

				    foreach($ques as $que) {
					    $num = str_pad($var, 3, "0", STR_PAD_LEFT);
						$x = $_POST[$c];
						$y = $_POST[$d];
						$r = $_POST[$e];

						$id = $db->query("SELECT id FROM project where title = '".$r."' ");
						foreach($id as $right){
							$get = $right["id"];

						}
				    $lines = $db->query("INSERT INTO `answer` (`user_id`,`question_id`,`project_id`,`answer`,`comment`, `type`) VALUES ('00000','".$num."', '".$get."','".$x."','".$y."','1');");
					$c=$c+1;
					$d=$d+1;
					$var=$var+1;
					}
				?>
				<p class="text-center">Your responses for the proposal have been saved,
				thank you for your contribution to the Green Fee project.</p>
				<div class="gif">
				<img src="logoanimation.gif" alt="checkmark" width="700px" id="check" class="container text-center">
				</div>
      </div>
        <div class="col-sm-2 sidenav" class="fix">
        </div>
      </div>
    </div>
    <footer class="container-fluid">
      <p class="text-center">Copyright © Green Fee</p>
    </footer>
  </body>
  </html>
