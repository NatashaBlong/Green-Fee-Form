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
  <style>
  /* Full-width input fields */
  input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }

  /* Set a style for all buttons */
  button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

  button:hover {
    opacity: 0.8;
  }

  /* Extra styles for the cancel button */
  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }

  img.avatar {
    width: 40%;
    border-radius: 50%;
  }

  .container {
    padding: 16px;
    width: 80%;
  }

  span.psw {
    float: right;
    padding-top: 16px;
  }

  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 25%; /* Could be more or less, depending on screen size */
  }
  /* Add Zoom Animation */
  .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
  }

  @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
  }

  @keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
  }
  /* Change styles for span and cancel button on extra small screens */
  @media screen and (max-width: 300px) {
    span.psw {
      display: block;
      float: none;
    }
    .cancelbtn {
      width: 100%;
    }
  }
  </style>
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
        <?php
        if (!isset($_POST["name"])) { ?>
        <body onload="document.getElementById('id01').style.display='block'">
        <?php } ?>
          <div id="id01" class="modal">

            <form class="modal-content animate" action="tryy.php" method="POST">

              <div class="container">
                <label><b><h3>Please Log in and select a proposal to review:</h3></b></label>

                <label><b>Name</b></label>
                <input type="text" placeholder="Enter Name" name="name" required ><br>

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required><br><br>

                <label><b>Select a Proposal</b></label>
                <select name="output" class="form-control" id="sell">
                  <?php
                  $db = new PDO("mysql:dbname=344Database", "root", "");
                  $lines = $db->query("SELECT Title FROM test");
                  $i = 1;
                  foreach ($lines as $line) {
                    ?>
                    <option value="<?= $line["Title"] ?>"> <?= $line["Title"] ?> </option>
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

          <!--  start accordian box   -->
          <?php
          if (isset($_POST["output"]) && isset($_POST["name"]) && isset($_POST["psw"])) { ?>
            <div class="panel-group" id="accordion">
              <?php

              $pos = 1; //counter
              $posAvg = 0;

              $ques = $db->query("SELECT * FROM questions");
              $i = 0;
              $j = 100;
              foreach($ques as $que) {
                ?>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $pos?>"> <?php print $que["question"]?></a>
                    </h4>
                  </div>
                  <div id="collapse<?php print $pos?>" class="panel-collapse collapse in">
                    <div class="panel-body">

                      <div class="col-6" class="<?= $k ?>">

                        <div class="row">
                          <div class="col-xs-6">
                            <?= $que["description"] ?> <br>
                            <input type="range" min="1" max="5" value="3" class="slider" name="<?=  $i ?>">
                            <br>
                            <img src="num.png" alt="numbers" id="nums">
                            <br>
                          </div>

                          <div class="col-xs-6">
                            Comments:
                            <textarea name="<?= $j ?>" rows="5" cols="50"></textarea>
                          </div>

                        </div>
                        <?php print '<button type="button" id="button'.$pos.'"class="btn btn-success" class="'.$pos.'">Next Question</button>';
                        // on click call on method in js
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                $pos = $pos + 1;
                $posAvg = $posAvg + 1;
              } ?>
            </div>
          <?php  } ?>
          <!--  end accordian box   -->
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
