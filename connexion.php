<?php
require("header.php");?>

<!Doctype html>
<?php 
$email= $_GET['email'];
$password= $_GET['password'];
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
function getCurrentLevel($levels){
	foreach ($levels as $key_level => $value_level) {
		if(($value_level != (-1))&&($value_level != Null)){
			return $key_level;
		}
	}
}

function login($e, $p, $c)
{	
	$r = "SELECT * FROM utilisateurs WHERE email = '".$e."' AND password='".$p."'"; 
	
	if($result = mysqli_query($c, $r)){

		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	    if(($row['email'] == $e)&&($row['password'] == $p))
	    {
	    	echo " login success <br>";

	    	$levels = array('A1'=>$row['A1'], 'A2'=>$row['A2'], 'B1'=>$row['B1'], 'B2'=>$row['B2'], 'C1'=>$row['C1'], 'C2'=>$row['C2']);
	    	$tests = array('comprehension'=>$row['comprehension'],'grammar'=>$row['grammar'],'listening'=>$row['listening'],'dictation'=>$row['dictation']);

	    	$_SESSION['id'] = $row['id'];
	    	$_SESSION['nom'] = $row['nom'];
	    	$_SESSION['prenom'] = $row['prenom'];
	    	$_SESSION['email'] = $row['email'];
	    	$_SESSION['score'] = $row['score'];
	    	$_SESSION['levels'] = $levels;
	    	$_SESSION['tests'] = $tests;
	    	$_SESSION['currentLevel'] = getCurrentLevel($levels);
	        header("Location: http://localhost/proj2/welcomeuser.php");
	    }else{
	    	echo " login failed";
	    }
	    	    
	}
}

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
