<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Confirmation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.
        2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2r
        RUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="fishcreek.css">
</head>
<body>
<h1>Complete</h1>



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

<img src="checkmark.gif" alt="checkmark" width="700px" id="check">

	
</body>
</html>