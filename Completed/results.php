<!DOCTYPE html>
<html lang="en">
<head>
  <title>test result page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="statStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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

      <!--  first stats box   -->
      <div class="col-sm-8">
        <h4><small>Data</small></h4>
        <hr>
        <h2>Proposal Average Scores</h2>
        <?php

        $proposalArray = array("proposal 1", "proposal 2","proposal 3", "proposal 4");
        $proposalArrayAvg = array("4.5", "4.1", "3.2", "2.2");
        $commentList = array("comment1", "comment2","comment3", "comment4");
        $Question = array("Question1", "Question2","Question3", "Question4","Question5", "Question6","Question7", "Question8");
        $x = 1;
        $y = 1;
        ?>

        <!--  end create arrays   -->

        <!--  progress bars  -->
        <?php
        $i = 0;
        foreach ($proposalArray as $proposal) {

          $y = $proposalArrayAvg[$i];

          $barFilled = $y * 20;

          ?>
          <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php print $barFilled?>%">
            <?php print $proposal . " Avg Score = " . $y ?>
          </div>
        </div>
        <?php
        $i++;
      } ?>
      <p>Use this box to talk about what the graph above means
      </p>
      <br><br>


      <!--  start accordian box   -->
      <h4><small>RECENT POSTS</small></h4>
      <hr>
      <h2>Ranked Proposals</h2>
      <div class="panel-group" id="accordion">

        <?php
        $pos = 1;
        $posAvg = 0;
        foreach ($proposalArray as $proposal) {

          $k = $proposalArrayAvg[$posAvg];

          ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $pos?>"> <?php print $proposal . " Average Score = " . $k?></a>
              </h4>
            </div>
            <?php if($pos == 1)
            {
            print '<div id="collapse'. $pos .'" class="panel-collapse collapse in">';
            }
            else
            {
              print '<div id="collapse'. $pos .'" class="panel-collapse collapse">';
            }
            ?>
              <div class="panel-body">


                <canvas id="radar-chart<?= $pos?>" width="800" height="400"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                <script  src="jScript.js"></script>
                <br>
              <hr>

            <?php
            foreach ($Question as $q)
            {
              print ("Question = " . $q . "<br>");
            }
            ?>
            <h2>View comments</h2>
            <!-- Trigger the modal with a button -->

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$pos?>"  >Comments</button>

            <!-- Modal -->

            <div class="modal fade" id="myModal<?=$pos?>" role="dialog">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Comments</h4>
                  </div>
                  <div class="modal-body">
                    <body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
                      <!-- Scrollspy -->
                      <div class="container">
                        <div class="row">
                          <nav class="col-sm-3" id="myScrollspy">
                            <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="#section1">Section 1</a></li>
                              <li><a href="#section2">Section 2</a></li>
                              <li><a href="#section3">Section 3</a></li>
                              <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="#section41">Section 4-1</a></li>
                                  <li><a href="#section42">Section 4-2</a></li>
                                </ul>
                              </li>
                            </ul>
                          </nav>
                          <div class="col-sm-9">
                            <div id="section1">
                              <h1>Section 1</h1>
                              <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                            </div>
                            <div id="section2">
                              <h1>Section 2</h1>
                              <p>Try to scroll this section and look at the navigation list while scrolling!
                              </div>
                              <div id="section3">
                                <h1>Section 3</h1>
                                <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                              </div>
                              <div id="section41">
                                <h1>Section 4-1</h1>
                                <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                              </div>
                              <div id="section42">
                                <h1>Section 4-2</h1>
                                <p>Try to scroll this section and look at the navigation list while scrolling!</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
          $pos = $pos + 1;
          $posAvg = $posAvg + 1;
        } ?>
          <br>
        <hr>



      </div>
    </div>
    <div class="col-sm-2 sidenav" class="fix">
    </div>
  </div>
</div>
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
</body>
</html>
