<?php
	require("header.php");
	require("sessExpired.php");
	require("functions.php");
?>
<!Doctype html>
<body>
 <?php echo "Test de <b>compréhension</b> du niveau <b>".$_SESSION['currentLevel']." ( ".getDescriptionLevel($_SESSION['currentLevel'])." ) </b>"; ?>


<form method="post" action="">
	<div>
		<br><h3>(Q1)</h3>
			<h4>Choisir la bonne réponse  </h4>
			<input type="radio" name="question1" value="0"> answer 1 <br>
		  	<input type="radio" name="question1" value="0"> answer 2 <br>
		  	<input type="radio" name="question1" value="0"> answer 3 <br>
		   	<input type="radio" name="question1" value="5"> answer 4 (correct)<br>

		<br><h3>(Q2)</h3>
			<h4>Choisir la bonne réponse  </h4>
			<input type="radio" name="question2" value="0"> answer 1 <br>
		  	<input type="radio" name="question2" value="5"> answer 2 (correct)<br>
		  	<input type="radio" name="question2" value="0"> answer 3 <br>
		   	<input type="radio" name="question2" value="0"> answer 4 <br>

		<br><h3>(Q3)</h3>
			<h4>Choisir la bonne réponse  </h4>
			<input type="radio" name="question3" value="0"> answer 1 <br>
		  	<input type="radio" name="question3" value="5"> answer 2 (correct)<br>
		  	<input type="radio" name="question3" value="0"> answer 3 <br>
		   	<input type="radio" name="question3" value="0"> answer 4 <br>

		<br><h3>(Q4)</h3>
			<h4>Choisir la bonne réponse  </h4>
			<input type="radio" name="question4" value="5"> answer 1 (correct)<br>
		  	<input type="radio" name="question4" value="0"> answer 2 <br>
		  	<input type="radio" name="question4" value="0"> answer 3 <br>
		   	<input type="radio" name="question4" value="0"> answer 4 <br>

		<br><h3>(Q5)</h3>
			<h4>Choisir la bonne réponse  </h4>
			<input type="radio" name="question5" value="0"> answer 1 <br>
		  	<input type="radio" name="question5" value="0"> answer 2 <br>
		  	<input type="radio" name="question5" value="5"> answer 3 (correct)<br>
		   	<input type="radio" name="question5" value="0"> answer 4 <br>
		<br>

		<input type="submit" name="submit" value="Suivant" /><br/>
		<input type="submit" name="reset" value="Refaire" /><br/>
	</div>
</form>

</body>
<?php
 function validateTest($s)
 {
	$_SESSION['tests']["comprehension"] = $s;
 	$_SESSION['score'] = array_sum($_SESSION['tests']);

	header("Location: http://localhost/proj2/".$_SESSION['currentLevel']."_grammar.php?sum=".$s."&score=".$score."&pg=".$_SESSION['currentLevel']."_comprehension");		
	

 }

if(isset($_POST['submit']))
{
	if((isset($_POST['question1'])) && (isset($_POST['question2']))  && (isset($_POST['question3']))  && (isset($_POST['question4']))  && (isset($_POST['question5'])) ){ 

		$q1 = $_POST['question1'];
		$q2 = $_POST['question2'];
		$q3 = $_POST['question3'];
		$q4 = $_POST['question4'];
		$q5 = $_POST['question5'];
		$s = sumTest($q1, $q2, $q3, $q4, $q5);
   		validateTest($s);

   	}else{
   		echo "<script>alert('Vous devez répondre à toutes les questions !');</script>";
   	}
}
if(isset($_POST['reset'])){
	header("Location: http://localhost/proj2/B1_comprehension.php");
}


?>