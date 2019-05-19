<?php
require("header.php");
require("sessExpired.php");
require("functions.php");
?>

<!Doctype html>
<body>

<?php
	echo "<h3> Salut ".$_SESSION['nom']." ".$_SESSION['prenom']." ^^ <br>Vous avez ".array_sum($_SESSION['tests']).
	" /100 pts dans le test de niveau ".$_SESSION['currentLevel']." ".getDescriptionLevel($_SESSION['currentLevel'])." </h3>";
	$still = 96 - array_sum($_SESSION['tests']);
	echo " Vous devez encore gagner au moins plus que ".$still." points pour réussir ce test de niveau<br> ";
	
	echo "<br> Liste des prochains niveaux: ";
	echo "<ul>";
		printNextLevels($_SESSION['levels']);
	echo "</ul>";

	echo "<br> Liste des niveaux passés : ";
	echo "<ul>";
		printDoneLevels($_SESSION['levels']);
	echo "</ul>";
?>

<form method="post" action="welcomeuser.php">
	<button type="submit" class="btn" value="nl" name="nextlevel">Prochain test de niveau </button>
</form>

<form method="post" action="welcomeuser.php">
	<input type="submit" name="disconnect" value="Déconnecter"  />
</form>


</body>

<?php

	if(isset($_POST['nextlevel'])){
		nextLevel();
	}

	if(isset($_POST['disconnect'])){
		deconnecter();
	}

	function nextLevel(){

		$_SESSION['score'] = array_sum($_SESSION['tests']);
	 	if ((failedTest()== false) && ($_SESSION['score'] >=96)){
	 		header("Location: http://localhost/proj2/successTest.php"); 		
	 	}else{

			header("Location: http://localhost/proj2/".$_SESSION['currentLevel']."_comprehension.php ");
	 	}

	}

	function printNextLevels($levels){
		foreach ($levels as $key_level => $value_level) {
			if(($value_level != (-1))){
				echo "<li><b>".$key_level."</b> ".getDescriptionLevel($key_level)."</li>";
			}
		}
	}

	function printDoneLevels($levels){
		foreach ($levels as $key_level => $value_level) {
			if($value_level == (-1)){
				echo "<li><b>".$key_level."</b> ".getDescriptionLevel($key_level)."</li>";
			}
		}
	}
?>