<?php
require("header.php");
require("sessExpired.php");
require("functions.php");
?>

<!Doctype html>
<body>
	<input type="submit" name="home" value="Home" /><br/>
<?php
	$page = $_GET['pg'];
	printresult();
		echo "You succed :D <br>";
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