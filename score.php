<html>
	<head>
		
		<title>score</title>
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
				<div id="about" class="page">
					<div class="left">
					</div>
					<div class="right">
					<div class="score" border="1">
							         <?php
													$login=$_POST['login'];
													$Pasw=$_POST['mp'];
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
													/* selectioner les données de la base */
													$sql = "SELECT * FROM MAAOUIA_HAM " ;
													$req= $bdd->query($sql);
												
																echo '<table border=\'0\' width="480">';
																echo '<tr align="center" bgcolor="#A9D0F5"><td height="20" width="600" colspan="10">Liste des Score</td></tr>';
																echo '<tr align="center" >';
																echo '<td bgcolor="#DADADA"><h5>ID</td>';
																echo '<td bgcolor="#A9D0F5"><h5>LOGIN</td>';
																echo '<td bgcolor="#DADADA"><h5>E_mail</td>';
																echo '<td bgcolor="#A9D0F5"><h5>S_Jeux1</td>';
																echo '<td bgcolor="#DADADA"><h5>NBJ_Jeux1</td>';
																echo '<td bgcolor="#A9D0F5"><h5>T_Jeux1</td></h5>';
																echo '<td bgcolor="#F7FE2E"><h5></td></h5>';
																echo '<td bgcolor="#A9D0F5"><h5>S_Jeux2</td>';
																echo '<td bgcolor="#DADADA"><h5>NBJ_Jeux2</td>';
																echo '<td bgcolor="#A9D0F5"><h5>T_Jeux2</td></h5></tr>';
													while ($data = $req->fetch())
													{ 
														 															
																echo '<tr align="center"><td bgcolor="#DADADA"><h6>'.$data['id'].'</td>';
																echo '<td bgcolor="#A9D0F5" ><h6>'.$data['login'].'</td>';
																echo '<td bgcolor="#DADADA"><h6>'.$data['email'].'</td>';
																echo '<td bgcolor="#A9D0F5"><h6>'.$data['score'].'</td>';
																echo '<td bgcolor="#DADADA"><h6>'.$data['Nbe'].'</td>';
																if ($data['Nbe']!=0)
																{
																echo '<td bgcolor="##A9D0F5"><h6>'.(100*$data['score'])/$data['Nbe'] .'%</td></h6>';
																}
																else
																{
																echo '<td bgcolor="##A9D0F5"><h6>0%</td></h6>';
																}
																echo '<td bgcolor="#F7FE2E"><h5></td></h5>';
																echo '<td bgcolor="#A9D0F5"><h6>'.$data['score1'].'</td>';
																echo '<td bgcolor="#DADADA"><h6>'.$data['Nb1'].'</td>';
																if ($data['Nb1']!=0)
																{
																echo '<td bgcolor="##A9D0F5"><h6>'.(100*$data['score1'])/$data['Nb1'] .'%</td></tr></h6>';
																}
																else
																{
																echo '<td bgcolor="##A9D0F5"><h6>%</td></tr></h6>';
																}
													}
																										  
													echo '</table></center>';
													$req->closeCursor();
													?>
                         
						
						</div>
						
					</div>
					
					
				</div>

				<div id="work" class="page">
					<div class="left">
						<img src="images/logo.jpg" alt="Featured project">
						
					</div>
					
		</div>
	</body>
</html>
