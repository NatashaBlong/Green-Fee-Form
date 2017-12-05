<!DOCTYPE html>
<html lang="en">
<head>
  <title>Proposal Review</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="reviewStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="jScript.js"></script>
  <link rel="icon" type="image/ico" href="GreenFeeIcon.ico">
</head>
<body>
  <!--  Top header   -->
  <div class="jumbotron">
    <div class="container text-center">
    <img class="logo" src="GreenFee.png" width="200px">
	                  <?php
                  $db = new PDO("mysql:dbname=finalreview", "root", "");
				  ?>
				   <!--  side bar   -->
  <section class="ok">
  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-2 sidenav" class="sidebars">
      </div>
      <!--  questions to enter quiz   -->
      <div class="col-sm-8">
        <?php
        if (!isset($_POST["name"])) {
		?>
        <body onload="document.getElementById('id01').style.display='block'">
        <?php } ?>
          <div id="id01" class="modal">
            <form class="modal-content animate" action="review.php" method="POST">
              <div class="container">
                <label><b><h3>Please Log in and select a proposal to review:</h3></b></label>
                <label><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required ><br>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required><br><br>
                <label><b>Select a Proposal</b></label>
                <select name="output" class="form-control" id="sell">
                  <?php

                  $lines = $db->query("SELECT title FROM project");
                  $i = 1;
				          ?>

					                         <?php
                  foreach ($lines as $line) {
                    ?>
                    <option value="<?= $line["title"] ?>"> <?= $line["title"] ?> </option>
					               <?php
                    $i = $i + 1;
                  }
                  ?>

                </select><br>
                <button type="submit">Proceed to Proposal Review</button><br>
              </div>
              <div class="container" style="background-color:#f1f1f1">
              </div>
            </form>
          </div>
          <!--  end create arrays   -->


      <h1>Review Form</h1>
<?php
 if(isset($_POST["output"])){ 	$x = $_POST["output"];
?>
    <p>Fill out the following questions based on the proposal  "<?= $x ?>"  </p>
<?php
 }
?>
    </div>
  </div>
          <!--  start accordian box   -->
          <form action="confirmation.php" method="POST">
          <?php
          if (isset($_POST["output"]) && isset($_POST["name"]) && isset($_POST["psw"])) { ?>
            <div class="panel-group" id="accordion">
              <?php
              $pos = 1; //counter
              $posAvg = 0;
              $ques = $db->query("SELECT * FROM question");
              $i = 0;
              $j = 100;
              foreach($ques as $que) {
                ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $pos?>"><b><?php print $que["title"]?><b></a>
                    </h4>
                  </div>
                  <?php print '<div id="collapse'.$pos.'" class="panel-collapse collapse in">'?>
                    <div class="panel-body">
                      <div class="col-6" class="<?= $k ?>">
                        <div class="row">
                          <div class="col-xs-6">
                            <br><p> Here is where we would pull in the information inluded about this
                                section from the proposer.</p><br>
                            <textarea class="commentBox" name="<?=$j?>" rows="5" cols="50" placeholder="Enter comments here..."></textarea>
                          </div>
                          <div class="col-xs-6">
                            <br><p><?= $que["text"]?></p><br>
                            <input type="range" min="1" max="5" value="3" class="slider" name="<?=  $i ?>">
                            <br>
                            <img src="num.png" alt="numbers" id="nums">
                            <br>
                          </div>
                        </div>
                        <?php print '<button type="button" id="button'.$pos.'" class="'.$pos.'" class="btn btn-success" onclick="closeAcord()">Next Question</button>';?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                $pos = $pos + 1;
                $posAvg = $posAvg + 1;
                $i=$i+1;
                $j=$j+1;
              } ?>
            </div>
          <?php  } ?>
          <!--  end accordian box   -->
          <button type="submit">Submit Review</button>
        </form>
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
