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
						<img src="images/author-photo.png" alt="photo">
					</div>
					<div class="right">
					<div class="saisir">
									
                        <form name="f" method="post">
						<br>
						
						<h3>Inscription:</h3> 
						<h4>
							Login:<br><input type="text" name="login" size="10">
							
							<input size ="5" name="v" type="submit" value="Verifier" style="border:solid 1px black;  background-color:lightsteelblue; border-radius:5px; text-align:center; box-shadow:0 0 6px;" />
							
							<?php
							/* verifier le login, est ce qu'il existe dans la base ou nn */
							$trouve=false;
							if (isset ($_POST['v']))
							{
							
							$adresse = 'mysql:host=localhost;dbname=midl1';
							$nomr = 'midl1';
							$motdepasse = 'midl1';
							$database = 'midl1';
							try {
							/* ouvrela connexion à la base de données */
							$bdd = new PDO($adresse, $nomr, $motdepasse);
							}
					    	catch (Exception $e) {
							/* écrit un message expliquant l'erreur */
							die('Erreur : ' . $e->getMessage());
							/* massage personnalisé */
							print "Accès à la base impossible :<br/>\n";
							}
							/********** Selectionner les donnees de joueur ************/
							$sql1 = "SELECT login FROM MAAOUIA_HAM" ;
							$req1= $bdd->query($sql1);
							
							while (($data = $req1->fetch())&&($trouve==false))
								{					
							
							if($data['login']==$_POST['login'])
							{
							$trouve=true;
							}
								}
								
								if($trouve==true)
							{
							echo '<img src="images/faux.png">';
							}
							else
							{
							echo '<img src="images/vrai.png">';
							}
						}
							?>
							
							
							
							
							<br>
							MotsP:<br><td><input type="text" name="mp"><br>
							Email:<br><input type="text" name="email" ><br>
							<input type="submit" name="B"><input type="reset" name="A">
							</h4>
							
							<?php
							/* l'inscription, ajouter les données dans la base*/
							if (isset ($_POST['B']))
							{
							if ( ($_POST['login']!='')&&($_POST['mp']!='')&&($_POST['email']!=''))
							{
						    $login=$_POST['login'];
							$Pasw=$_POST['mp'];
							$email=$_POST['email'];
							$adresse = 'mysql:host=localhost;dbname=midl1';
							$nomr = 'midl1';
							$motdepasse = 'midl1';
							$database = 'midl1';
							try {
							/* ouvrela connexion à la base de données */
							$bdd = new PDO($adresse, $nomr, $motdepasse);
							}
					    	catch (Exception $e) {
							/* écrit un message expliquant l'erreur */
							die('Erreur : ' . $e->getMessage());
							/* massage personnalisé */
							print "Accès à la base impossible :<br/>\n";
							}
							/* insérer dans la table users un enregistrement dont les valeurs des champs sont décrites par des étiquettes */
							$req = $bdd->prepare("INSERT INTO MAAOUIA_HAM(login, mdp, email, Nbe) VALUES(:login, :pwd, :email, :nb)");
							/*  les parties variables sont décrites dans un tableau associatif dont les clés sont les étiquettes précédentes */
							$req->execute(array(
							"login" => $login,
							"pwd" => $Pasw,
							"email"=> $email,
							"nb" =>0,
														
							));
							/* redirection vers la page index si tous tests precedents sont vrai*/
							echo '<script language="Javascript">
						<!--
						document.location.replace("index.php");
						// -->
						</script>';
							}
							else
							{
							echo '<h4><font size="4" color="#FF0000">verifier vos donnees !!</font></h4>';
							}
							}
							?>							
						</div>
						
					</div>
								
					
					
					<div class="don"><h4>
						<br><br>
						 <form name="f1" method="post">
						<input type="text" name="mots" ><br>
						<input type="submit" name="cons"></h4>
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
