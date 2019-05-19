<?php
require("header.php");
require("sessExpired.php");
require("functions.php");

if ((failedTest())||($_SESSION['score'] < 96)){
	header("Location: http://localhost/proj2/failTest.php");
}

?>
<!--
	You have to test again the score if it's  
-->
<!Doctype html>
<body>
	<input type="submit" name="home" value="Home" /><br/>
<?php
	$page = $_GET['pg'];
	printresult();
	echo "You succeed :D <br>";
	?>
	<form method="post" action="">
		<input type="submit" name="submit" value="Prochain Test de Niveau" /><br/>
		<input type="submit" name="disconnect" value="Déconnecter" /><br/>
	</form>

	<?php
			
		if(isset($_POST['submit'])){
			passedLevel();
		}
		if(isset($_POST['disconnect'])){
			updateRecord();
			deconnecter();
		}
		if(isset($_POST['home'])){
			header("Location: http://localhost/proj2/welcomeuser.php");
		}

	?>
</body>