<?php
session_start();
?>
<html>
	<head>
		
		<title>Index</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="screen">
				
	</head>
	<body>
		<div id="pagewrap">
			
			<!-- Site header and navigation -->
			<div id="header">
				<ul id="navigation">
					<li><a class="work" href="#work">Accueil</a></li>
					<li><a class="about" href="Inscription.php"><img src="images/icon-about.png" alt="About"></a></li>
					<li><a class="social" href="jeux.php"><img src="images/icon-social.png" alt="Social"></a></li>
					<li><a class="contact" href="#contact"><img src="images/icon-contact.png" alt="Contact"></a></li>
				</ul>
			</div>
			
			<!-- Site content -->

			<div id="content">
				<div id="about" class="page">
					<div class="left">
					</div>
					<div class="right">
					<div class="saisir"><br><br><br><br><br><h3>
<font size="7" face="Aharoni" color="#FF0000">L</font><font face="Aharoni" size="7">o<font color="#FF0000">a</font>d<font color="#FF0000">i</font>n<font color="#FF0000">g</font></font><font size="7" face="Aharoni">.<font color="#FF0000">.</font>.</font>
						</h3>
						</div>
						
					</div>
					<div class="don"><h4>
						<br><br>
						 <form name="f1" method="post">
						<br><input type="text" name="mots" ><br>
						<input type="submit" name="cons"><br></h4>
						</form>
					</div>
					
					
				</div>

				<div id="work" class="page">
					<div class="left">
						<img src="images/logo.jpg" alt="Featured project">
						
					</div>
					
		</div>
	</body>
</html>

<?php
/* traitment de connexion*/
if (empty($_POST['login']) || empty($_POST['mp']))
{
		header("Location:index.php");
                exit();
	
}
						$login=$_POST['login'];
						$Pasw=$_POST['mp'];
						// $true=true;
					try {
						/* ouvrela connexion à la base de données */
						$bdd = new PDO('mysql:host=localhost;dbname=midl1', 'midl1', 'midl1');
						
						}
					catch (Exception $e) 
						{
						/* écrit un message expliquant l'erreur */
						die('Erreur : ' . $e->getMessage());
						/* massage personnalisé */
						print "Accès à la base impossible :<br/>\n";
						}
					$sql = "SELECT * FROM MAAOUIA_HAM where login= '$login'" ;
					$req= $bdd->query($sql);
					$data=$req->fetch();
					
   /* carder les données de joueurs dans sessions pour les utiliser aprés*/
        if(($data['login']==$login)&&($data['mdp']==$Pasw)) // Acces OK !
        {
				$_SESSION['id'] = $data['id'];
                $_SESSION['login'] = $login;
				$_SESSION['email'] = $data['email'];
				$_SESSION['score'] = $data['score'];	
				$_SESSION['nbe']=$data['Nbe'];
				$_SESSION['score1'] = $data['score1'];	
				$_SESSION['nb1']=$data['Nb1'];
				/* réinatialiser le score et le nbre de jeux de joueur*/
							$sql="UPDATE MAAOUIA_HAM set score='0', nbe='0', score1='0', Nb1='0' where login= '$login' ";
							$req= $bdd->query($sql);
							$datai=$req->fetch();
							
				
				//header fonction php permet de faire la redirection
				echo '<script language="Javascript">
						<!--
						document.location.replace("jeux.php");
						// -->
						</script>';
		}
         else // Acces pas OK !
         {
							echo '<script language="Javascript">
						<!--
						document.location.replace("index.php");
						// -->
						</script>';
						
          }
		  
echo $_SESSION['login'];

?>
