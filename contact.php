<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
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
					<li><a class="work" href="index.php">Accueil</a></li>
					<li><a class="about" href="Inscription.php"><img src="images/icon-about.png" alt="About"></a></li>
					<li><a class="contact" href="contact.php"><img src="images/contact.png" alt="Contact"></a></li>
				</ul>
			</div>
			
			<!-- Site content -->

			<div id="content">
				<div id="about" class="page">
					<div class="left">
					</div>
					<div class="right">
					<div class="saisir">
									
                        <form name="f" method="post" action="connexion.php"  onSubmit="tester_champs();">
						
						<br>
						<h3>Contacter Nous:<br><br></h3><h4>
						E_mail: <br><input type="text" name="login"><br>
						Sujet: <br><input type="text" name="email" ><br>
						MSG:<br><TEXTAREA Name="msg" rows="4" cols="20"></TEXTAREA><br>
						<input type="submit" name="B"><br><br><br></h4>
						</form>
						
						</div>
						
					</div>
					<div class="don"><h4>
						<br><br>
						 <form name="f1" method="post">
						<br><input type="text" name="mots" ><br>
						<input type="submit" name="cons"><br></h4>
						</form>
							<?php
											$mot=$_POST['mots'];
											$true=true;
												try {
													/* ouvrela connexion à la base de données */
													$bdd = new PDO('mysql:host=localhost;dbname=midl1', 'midl1', 'midl1');
													}
												catch (Exception $e) {
													/* écrit un message expliquant l'erreur */
													die('Erreur : ' . $e->getMessage());
													/* massage personnalisé */
													print "Accès à la base impossible :<br/>\n";
													
												}

											$sql = "SELECT * FROM openlexicon_lexique " ;
											$req= $bdd->query($sql);
														
														echo'<h6> <table border="0" width="10%">';
														echo'		<tr  bgcolor="#61380B" >';
														echo'			<td align="center"><b><font size="2" face="Calibri" color="#FFFFFF">Forme</font></b></td>';
														echo'			<td align="center"><b><font size="2" face="Calibri" color="#FFFFFF">Categorie</font></b></td>';
														echo'			<td align="center"><b><font size="2" face="Calibri" color="#FFFFFF">Lemme</font></b></td>';
														echo'			<td align="center"><b><font size="2" face="Calibri" color="#FFFFFF">Traits</font></b></td>';
														echo'			</tr>';
														
																	while (($data = $req->fetch())||( $true==true))
																	{ 
																		if(($data['forme']==$mot))
																		{
														echo'			<tr bgcolor="#F7D358">';
														echo'			<td align="center"><b><font size="1" face="Calibri">'.$data['forme'].'</font></b></td>';
														echo'			<td align="center"><b><font size="1" face="Calibri">'.$data['categorie'].'</font></b></td>';
														echo'			<td align="center"><b><font size="1" face="Calibri">'.$data['lemme'].'</font></b></td>';
														echo'			<td align="center"><b><font size="1" face="Calibri">'.$data['traits'].'</font></b></td>';
														echo'			</tr>';
																		$true=false;
																		}
																	}
														echo'	</table></h6>';

											
											$req->closeCursor();
											?>
						
						
						
					</div>
					
					
				</div>

				<div id="work" class="page">
					<div class="left">
						<img src="images/logo.jpg" alt="Featured project">
						
					</div>
					
		</div>
	</body>
</html>
