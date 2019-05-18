<?php
require("header.php");
require("functions.php");
?>

<!Doctype html>
<?php 
$email= $_GET['email'];
$password= $_GET['password'];


if (isset($_SESSION['user_id'])) 
{
    $email= $_SESSION['email'];
	$password= $_SESSION['password'];
}
?>
<body>


<form method="post" action="connexion.php" > 

	<label>email</label>
	<input type="email" name="mail" onblur="verifMail(this)" value="<?php echo $email; ?>" required/><br>

	<label>mot de passe</label>
	<input type="password" name="mdp" value="<?php echo $password; ?>"  required/><br>

	<button type="submit" class="btn" name="submit">Envoyer</button>
</form>

</body>

<?php


if(isset($_POST['submit']))
{
	$email = $_POST['mail'];
	$password = $_POST['mdp'];

	if((isset($email))&&(isset($password))){
   		login($email, $password, $idCon);	
	}else {
		echo "Email and password are required !";
   	}
} 



?>
