<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.
        2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2r
        RUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Green Fee Review</h1>



    <form action="review.php" method="POST">
      <div class="form-group">
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

        </select>
      </div>
        <input type="Submit">
    </form>



        <?php
    	if (isset($_POST["output"])) {
    	$search = $_POST["output"];
        $rows = $db->query("SELECT * FROM test where Title = '".$search."' ");
        foreach ($rows as $row) {
        ?>
        <p>
    <ul>  
    	<li>
            <strong>Title:</strong> <?= $row["Title"] ?>
        </li>
        <li>
            <strong>Author:</strong> <?= $row["Proposer"] ?>
        </li>
        <li>
            <strong>Descri:</strong> <?= $row["description"] ?>
        </li>
        <li>
            <strong>Budget:</strong> <?= $row["budget"] ?>
        </li>
    </ul>
        <br>
		<form action="confirmation.php" method="POST">
        <?php } ?>
        
        
        
		<?php
			$ques = $db->query("SELECT * FROM questions");
			$i = 0;
			$j = 100;
			
			foreach($ques as $que) {
		?>
		<div class="col-6">
			<?= $que["question"] ?>
		<br>
			&nbsp&nbsp&nbsp&nbsp&nbsp
			<?= $que["description"] ?>
		</div>
		
			<div class="col-6" class="<?= $k ?>">
  				<input type="range" min="1" max="5" value="3" class="slider" name="<?=  $i ?>">
			<br>
			
			<img src="num.png" alt="numbers" id="nums">
		<br>
		<p>Comments:</p>
		<textarea name="<?= $j ?>" rows="5" cols="50"></textarea>
		
		</div>
		
		<br>
		<br>
		<hr>
		<?php $i=$i+1;
		$j=$j+1; } ?>
		<input type="submit" value="Submit" id="finalS">
		</form>
    </p>

    <?php } ?>
    

</body>
</html>