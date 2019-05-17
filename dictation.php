<!Doctype html>
<body>
	<?php
		$score = $_GET['score'];
	?>
<h2> Your total score is <?php ehco $score."/25 pts"; ?></h2>

<form type="post" action="">
	<br><h2>(Q1)</h2>
		<h3>Choose the right answer  </h3>
		<input type="radio" name="question1" value="0"> answer 1 <br>
	  	<input type="radio" name="question1" value="0"> answer 2 <br>
	  	<input type="radio" name="question1" value="0"> answer 3 <br>
	   	<input type="radio" name="question1" value="5"> answer 4 (correcte)<br>

	<br><h2>(Q2)</h2>
		<h3>Choose the right answer  </h3>
		<input type="radio" name="question2" value="0"> answer 1 <br>
	  	<input type="radio" name="question2" value="5"> answer 2 (correcte)<br>
	  	<input type="radio" name="question2" value="0"> answer 3 <br>
	   	<input type="radio" name="question2" value="0"> answer 4 <br>

	<br><h2>(Q3)</h2>
		<h3>Choose the right answer  </h3>
		<input type="radio" name="question3" value="0"> answer 1 <br>
	  	<input type="radio" name="question3" value="5"> answer 2 (correcte)<br>
	  	<input type="radio" name="question3" value="0"> answer 3 <br>
	   	<input type="radio" name="question3" value="0"> answer 4 <br>

	<br><h2>(Q4)</h2>
		<h3>Choose the right answer  </h3>
		<input type="radio" name="question4" value="5"> answer 1 (correcte)<br>
	  	<input type="radio" name="question4" value="0"> answer 2 <br>
	  	<input type="radio" name="question4" value="0"> answer 3 <br>
	   	<input type="radio" name="question4" value="0"> answer 4 <br>

	<br><h2>(Q5)</h2>
		<h3>Choose the right answer  </h3>
		<input type="radio" name="question5" value="0"> answer 1 <br>
	  	<input type="radio" name="question5" value="0"> answer 2 <br>
	  	<input type="radio" name="question5" value="5"> answer 3 (correcte)<br>
	   	<input type="radio" name="question5" value="0"> answer 4 <br>
	<br>

	<input type="submit" name="submit" value="Submit" /><br/>
</form>

</body>
<?php
 function validateTest($q1, $q2, $q3, $q4, $q5){
 	$somme = 0;
 	if($q1 === 5)
 		$somme = $somme + 5;

 	if($q2 === 5)
 		$somme = $somme + 5;

 	if($q3 === 5)
 		$somme = $somme + 5;

 	if($q4 === 5)
 		$somme = $somme + 5;

 	if($q5 === 5)
 		$somme = $somme + 5;

 	if ($somme >= 24 )
 		header("Location: successTest.php?somme=".$somme."&score=".$score."");

 }

if(isset($_POST['submit']))
{
	if((isset($_POST['question1'])) && (isset($_POST['question2']))  && (isset($_POST['question3']))  && (isset($_POST['question4']))  && (isset($_POST['question5'])) ){ 

		$q1 = $_POST['question1'];
		$q2 = $_POST['question2'];
		$q3 = $_POST['question3'];
		$q4 = $_POST['question4'];
		$q5 = $_POST['question5'];
   		validateTest($q1, $q2, $q3, $q4, $q5);

   	}else{
   		echo "You have to answer all the questions ! ";
   	}
} 


?>