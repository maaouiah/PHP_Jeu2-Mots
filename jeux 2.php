<?php
session_start();
$id=$_SESSION['id'];
$nom=$_SESSION['login'];
$em=$_SESSION['email'];
$s=$_SESSION['score1'];
$nb=$_SESSION['nb1'];


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
					
					
					<li><a class="jeux1" href="jeux.php"><img src="images/jeux1.png" alt="jeux1"></a></li>
					<li><a class="jeux2" href="jeux 2.php"><img src="images/jeux2.png" alt="jeux2"></a></li>
					<li><a class="score" href="score.php"><img src="images/score.png" alt="Score"></a></li>
					<li><a class="log" href="index.php"><img src="images/log_out.png" alt="log_out"></a></li>
				</ul>
				
			
			</div>
			
			<!-- Site content -->

			<div id="content">
			<div class="login"> 
			<?php 
			echo '<h4><br> Bienvenu M/Mdm: <font color="#0000FF">'.$_SESSION['login'].'</font>    Votre ancien score: <font color="#0000FF">'.$s.'/'.$nb.'</font></h4>';
			?>
			</div>
				<div id="about" class="page">
					<div class="left">
						<img src="images/author-photo.png" alt="photo">
					</div>
					<div class="right">
					<div class="jeux">
					<br>
					<b><h4>La Fome de le mots ci-dessous est melanger: </h4>	<hr>
					<?php
					
							/* traitement selectionner les données de la base*/	
							
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
							$sql1 = "SELECT * FROM MAAOUIA_HAM where login='$nom' " ;
							$req1= $bdd->query($sql1);
							$data1=$req1->fetch();
							
							
							
							/* selectionner mots*/
							if(!isset($_POST['go']))
							{
							$sql = "SELECT * FROM openlexicon_lexique where categorie='Adv' or categorie='Nom' or categorie='Adj'    ORDER BY RAND( ) LIMIT 289475 " ;
							$req= $bdd->query($sql);
							$data = $req->fetch();
							
								$_SESSION['lemme']=$data['lemme'];
							$lemme=$_SESSION['lemme'];
							$melanger = str_shuffle($data['lemme']);
							echo "<h3>".$melanger."</h3>";
						}
							?>		
						

                         <form name =jeux2 method="post"><h4>
						 <h4>Donner votre propsition:</h4>
						 <h4> <input type='text' name="pro" value="<?php if(isset($_POST['go'])) echo $_POST['pro']?>"></h4>
						 <h4><input type="submit" name="go"></h4>
						 </form></h4>
							<?php
							
							
							/* Jeux*/
							
							/********************************************************/
							
							/* test les nom */
					 if(isset ($_POST['go']))
					 {
							if (($_POST['pro']==$_SESSION['lemme']))
							{
							echo '<a href="jeux 2.php"><img src="images/OK.png"></a>';
							$nb=$data1['Nb1']+1;
							$s=$data1['score1']+1;
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
							/* faire le mise ajour sur le nombre de jeu et le score si la reponse est vraie*/
							$sql="UPDATE MAAOUIA_HAM set score1='$s', Nb1='$nb'  WHERE login='$nom'"; // on remplace l'ancien score par celui calculé.
							$req= $bdd->query($sql);
							$data=$req->fetch();
						
							}
							
							
							else 
							{
							echo '<a href="jeux 2.php"><img src="images/NO.png"></a></h4>';
							
							$nb=$data1['Nb1']+1;
							$s=$data1['score1'];
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
							/* faire le mise ajour sur le nombre de jeu si la reponse est fausse*/
							$sql="UPDATE MAAOUIA_HAM set  Nb1='$nb'  WHERE login='$nom'"; // on remplace l'ancien score par celui calculé.
							$req= $bdd->query($sql);
							$data=$req->fetch();
							
							
							
							
							}
							echo '<h4>Votre Score est <font size="4" color="#FF3300">'.$s.' </font>sur <font color="#0000FF">'.$nb.'</font></h4>';
							}
							?>
						
						
							
												
						</div>
						
					</div>
								
					
					
					<div class="don"><h4>
			
						<br><br><br>
						 <form name="f1" method="post">
						<input type="text" name="mots" ><br>
						<input type="submit" name="cons"></h4>
						</form>
						<?php
						
						/* consultation lexique*/
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
