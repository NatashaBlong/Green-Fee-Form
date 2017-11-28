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
        $db = new PDO("mysql:dbname=finalreview", "root", "");
//-------------------------Getting Questions to use later----------------------------------------------
        $gettingQuestion = $db->query("SELECT * FROM question;"); // Get everything from scores
        $q = 0;

        foreach ($gettingQuestion as $getQuestion) {
          $question[$q] = $getQuestion["title"];
          $q = $q + 1;
        }
//------------------------------------------------------------------------------------------------------
        ?>
        <script type="text/javascript"> // create a javascript array that is the same as the $score array
        var question = <?php echo json_encode($question); ?>;
        </script>

        <!--  progress bars  -->
        <?php
        $a = 1;
        $rows = $db->query("SELECT * FROM project;");
        foreach ($rows as $row) {
        $avgscore = $db->query("SELECT AVG(answer) as qscores FROM answer where project_id = '".$a."' ");
          foreach($avgscore as $ascore) {
            $averages = $ascore["qscores"] * 20;
          } ?>
          <div class="progress">
            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?= $averages ?>%">
            <?= $row["title"] . "Average Score = " . $averages ?>
          </div>
        </div>
        <?php
        $a++;
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
        $proposalArray = $db->query("SELECT * FROM project;"); // getting everything from test
        $pos = 1; //
        $posAvg = 0; // average value
        //$t = 1;
        $propnum = $db->query("SELECT count(title) FROM project"); // Getting the number of proposals in the database
        $quesNum = $db->query("SELECT count(title) FROM question"); // Getting the number of questions in the database
        foreach ($proposalArray as $proposal) {
        $quess=1;
        $quess = str_pad ($quess, 3, '0', STR_PAD_LEFT);
          //$k = $avgscore;
          ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php print $pos ?>"> <?= $proposal["title"] ?></a>
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
                <?php
                 $score = []; // Array of average score for each question
                  $s = 0;
                 for ($z = 0; $z<12; $z++){

                  $gettingScore = $db->query("SELECT AVG(answer) as avgScore FROM answer where project_id = '".$pos."' AND question_id='".$quess."'  ");

                  // Get the average score, as avgScore from scores
                  //where the proposal id is $pos (starts at 1 (in larger loop that goes up to proposal.count))
                  foreach ($gettingScore as $setScore) {
                    $getScore = $setScore["avgScore"];
                  }
                  $gettingCount = $db->query("SELECT AVG(answer) as avgScore FROM answer where project_id = '".$pos."' AND question_id='".$quess."' "); // Get everything from scores
                    foreach ($gettingCount as $getCount) {
                      $score[$s] = $getScore;
                      $s = $s + 1;
                    }
                      $quess = $quess + 1;
                      $quess = str_pad ($quess, 3, '0', STR_PAD_LEFT);
                    }
                    ?>
                    <script type="text/javascript"> // create a javascript array that is the same as the $score array
                    var scores = <?php echo json_encode($score); ?>;
                    var val = <?php echo json_encode($pos); ?>;
                    </script>

                <canvas id="radar-chart<?= $pos?>" width="800" height="400"></canvas>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                <script  src="jScript.js"></script>
                <br>
              <hr>
              <!-- info box above table -->
                <h5>Title: </h6>
                <p>  <?= $proposal["Title"] ?>       </p>
                <h5>Proposer: </h6>
                <p>    <?= $proposal["Proposer"] ?>      </p>
                <h5>Budget: </h6>
                <p>    <?= $proposal["budget"] ?>      </p>
                <h5>Description: </h6>
                <p>   <?= $proposal["description"] ?>        </p>
            <h2>View comments</h2>
            <!-- Trigger the modal with a button -->

            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$pos?>">Comments</button>

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
                              <?php
                              $QuestionTwo = $db->query("SELECT * FROM question;"); // getting everything from questions
                               $le = 0;
                               foreach ($QuestionTwo as $qTwo)
                               {
                                if ($le == 0)
                                { ?>
                                  <li class="active"><a href="#<?=$qTwo["title"]?>"><?=$qTwo["title"]?></a></li>
                                  <?php
                                }
                                else
                                { ?>
                                  <li><a href="#<?=$qTwo["title"]?>"><?=$qTwo["title"]?></a></li>
                                  <?php
                                }
                                  $le = $le + 1;
                               }
                               ?>
                            </ul>
                          </nav>
                          <div class="col-sm-6">
                            <?php
                            $comNum = 1;
                            $comNum = str_pad ($comNum, 3, '0', STR_PAD_LEFT);
                            $QuestionThree = $db->query("SELECT * FROM question;"); // getting everything from questions
                             foreach ($QuestionThree as $qThree)
                             { ?>
                               <fieldset>
                               <div id="<?=$qoo["title"]?>">
                                 <h4><?=$qThree["title"]?></h4> <?php
                                 $allComments = $db->query("SELECT * FROM answer WHERE project_id = '".$pos."' AND question_id = '".$comNum."'"); ?>
                                 <p>
                                 <ul> <?php
                                 foreach ($allComments as $allCom)
                                 { ?>
                                   <li><?=$allCom["comment"]?></li> <?php
                                 } ?>
                                 </ul>
                               </p>
                               </div>
                             </fieldset>
                               <?php
                               $comNum = $comNum + 1;
                               $comNum = str_pad ($comNum, 3, '0', STR_PAD_LEFT);
                             }
                               ?>
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
