<!DOCTYPE html> 

<html>

<head>

<title>

ECE Ebay

</title>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
	
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
<link rel="stylesheet" type="text/css" href="items.css">
	
</head> 
	
	<body>
		
		<?php
		
		$id =isset($_GET["id"]) ? $_GET["id"]:"";//if then else
    
        $nom =isset($_GET["nom"]) ? $_GET["nom"]:"";
		
		$prev=isset($_GET["prev"]) ? $_GET["prev"]:"";
		
		$userid =isset($_GET["userid"]) ? $_GET["userid"]:"";
		
		$mail=isset($_GET["mail"]) ? $_GET["mail"]:"";
			try
			{
				
				//On établit la connexion
            $conn = new PDO('mysql:host=localhost;dbname=EbayECE;charset=utf8', 'root', 'root');
            
            //On vérifie la connexion
			}
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage);
            }

		$reponse = $conn->query('SELECT * FROM Items WHERE ID=\''.$id.'\' AND Nom=\''.$nom.'\'');
		$donnees=$reponse->fetch();

?>

		<nav class="navbar navbar-expand-md">
 				<a class="navbar-brand" href="#"></a>
					
					<img src="image/logo.png" width="30" height="30" alt="">
 
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
 
				<span class="navbar-toggler-icon"></span>
 
			</button>
 
			<div class="collapse navbar-collapse" id="main-navigation">
 				
				
				<ul class="navbar-nav">
					<?php
					
					if($userid=="" && $mail=="")
					{
						echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="homepage.php">Accueil</a></li>';
					
					echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="'.$prev.'?userid='.$userid.'&mail='.$mail.'" >Page Pr&eacute;dente</a></li>';
					
					echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="#">Insrivez Vous!</a></li>';
					
					echo '<li class="nav-item"><a class="nav-link"  href="connection.php?prev='.$prev.'">Connectez Vous!</a></li>';
 
					echo '<li class="nav-item"><a class="nav-link" href="#">Admin</a></li>';
					}else
					{
						echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="homepageac.php?userid='.$userid.'&mail='.$mail.'">Accueil</a></li>';
						
					    echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="#">Mon EbayECE</a></li>';
 
					    echo '<li class="nav-item"><a class="nav-link" href="#">Panier</a></li>';
					}
					
 					?>
				</ul>
 
			</div>

		</nav>
		<br/><br/>
		<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-sm-4"><img src="image/logo.png" width="400" height="175" alt="Bootstrap" class="img-responsive"></div>
			<div class="col-sm-8">
			
				<div class="container-fluid">
				
			<div class="row">
				
				<div class="col-sm-4">  <h1 class="titre"><?php echo $nom ?></h1> </div>
				
			</div>
			
				</div>
			</div>
			
		</div>
			
		<div class="row">
				
				<div class="col-sm-3"></div>
				<div class="col-sm-2"><h2 class="titre">Cat&eacute;gorie:</h2></div>
				<div class="col-sm-2">  
					<button type="button" class="btn btn-light" <?php echo 'href="fot.php?userid='.$id.'&mail='.$nom.'"' ?>>
						<a class="btn btn-default" <?php echo 'href="fot.php?userid='.$id.'&mail='.$nom.'"' ?> role="button" style="color:black">Feraille/Tr&eacute;sors</a>
					</button> 
			    </div>
				<div class="col-sm-2">  
					<button type="button" class="btn btn-light" <?php echo 'href="bpm.php?userid='.$id.'&mail='.$nom.'"' ?>>
						<a class="btn btn-default" <?php echo 'href="bpm.php?userid='.$id.'&mail='.$nom.'"' ?> role="button" style="color:black">Bon pour Mus&eacute;e</a>
					</button> 
			    </div>
				<div class="col-sm-2">  
					<button type="button" class="btn btn-light" <?php echo 'href="avip.php?userid='.$id.'&mail='.$nom.'"' ?>>
						<a class="btn btn-default" <?php echo 'href="avip.php?userid='.$id.'&mail='.$nom.'"' ?> role="button" style="color:black">Acessoire VIP</a>
					</button> 
			    </div>
				
		</div>
			
		
		
		</div>
		
		<br/><br/>	
		
		
		<div class="container-fluid">
		<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Images</h3></div>
			<div class="col-sm-3" style="background-color:blue;"><h3>Nom</h3></div>
			<div class="col-sm-3" style="background-color:#F5B041;"><h3>D&eacute;scription</h3></div>
			<div class="col-sm-3" style="background-color:lightgreen;"></div>
			</div>

						<div class="row">
			
							<div class="col-sm-3"><?php echo "<img src=\"image/".$donnees['Media']."\"width=\"300\" height=\"300\">"; ?></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;"><h2> <?php echo $donnees['Nom']; ?></h2></div>
							<div class="col-sm-3"><p> <?php echo $donnees['Description']; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							<h1> <?php 
								
						
						if($donnees['Prix']!=0)
						{
							echo "Prix: ".$donnees['Prix']."&euro;";
						}else if($donnees['PrixDepart'])
						{
							echo "Prix d&eacute;part: ".$donnees['PrixDepart']."&euro;";
						}
							?></h1>
							
							</div>
						</div>
						
						
			
			
			
			<br/><br/><br/>
			<div class="row">
			<div class="col-sm-2" ></div>
			<div class="col-sm-2" >
				<?php
				
					if($donnees['BestOffre']==1 && $userid=="" && $mail=="")
					{
						echo '<button type="button" class="btn btn-light" href="connection.php?prev='.$prev.'">';
					    echo '<a class="btn btn-default" href="connection.php?prev=items.php" role="button" style="color:black">Faire une offre!</a>';	
					   	echo '</button> ';
					}else if($donnees['BestOffre']==1 && $userid!="" && $mail!=""){
						
						echo '<button type="button" class="btn btn-light" href="connection.php?prev='.$prev.'">';
					 echo '<a class="btn btn-default" href="homepageac.php?userid='.$userid.'&mail='.$mail.'" role="button" style="color:black">Faire une offre!</a>';	
					 echo '</button> ';	
					}
					
					?>
				</div>
				<div class="col-sm-1" ></div>
			<div class="col-sm-2" >
				<?php
				
					if($donnees['Enchere']==1 && $userid=="" && $mail=="")
					{
						echo '<button type="button" class="btn btn-light" href="connection.php?prev='.$prev.'">';
					    echo '<a class="btn btn-default" href="connection.php?prev=items.php" role="button" style="color:black">Participer aux Enchère!</a>';	
					    echo '</button> ';	
					}else if($donnees['Enchere']==1 && $userid!="" && $mail!=""){
						
						echo '<button type="button" class="btn btn-light" href="connection.php?prev='.$prev.'">';
					 echo '<a class="btn btn-default" href="homepageac.php?userid='.$userid.'&mail='.$mail.'" role="button" style="color:black">Participer aux Enchère!</a>';	
					 echo '</button> ';	
					}
				     
				?>
				</div>
				<div class="col-sm-1" ></div>
			<div class="col-sm-2"  >
				<?php
				
					if($donnees['AchatImediat']==1 && $userid=="" && $mail=="")
					{
					 echo '<button type="button" class="btn btn-light" href="connection.php?prev='.$prev.'">';
					 echo '<a class="btn btn-default" href="connection.php?prev=items.php" role="button" style="color:black">Acheter Maintenant!</a>';	
					 echo '</button> ';	
					}else if($donnees['AchatImediat']==1 && $userid!="" && $mail!=""){
						
						echo '<button type="button" class="btn btn-light" href="connection.php?prev='.$prev.'">';
					 echo '<a class="btn btn-default" href="homepageac.php?userid='.$userid.'&mail='.$mail.'" role="button" style="color:black">Acheter Maintenant!</a>';	
					 echo '</button> ';	
					}
				     
				?>
				</div>
			<div class="col-sm-2"></div>
			</div>
			
			
			<?php

$reponse->closeCursor(); // Termine le traitement de la requête

?>
			</div>
		
			
			
		
		
		<br/><br/>
		
		
		
		
		<footer class="page-footer"> 
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-12">
						<h6 class="text-uppercase font-weight-bold">Information additionnelle</h6> 
						<p>
							ECE eBay est une entreprise fran&ccedil;aise de courtage en ligne, connue par son site web de ventes aux ench&egrave;res du m&ecirc;me nom. Elle a &eacute;t&eacute; cr&eacute;&eacute;e en 1995 par le Fran&ccedil;ais Pierre Omidyar. Elle est devenue une r&eacute;f&eacute;rence mondiale dans son secteur et un ph&eacute;nom&egrave;ne de soci&eacute;t&eacute;.

					</p> 
					<p>
						Toute personne inscrite sur le site eBay de son pays peut participer aux ench&egrave;res de tous les pays. Il faut &ecirc;tre majeur pour s&apos;inscrire. Une fois que l&apos;inscription est valid&eacute;e, c&apos;est-à-dire :

pour pouvoir acheter : apr&egrave;s v&eacute;rification de l&apos;adresse &eacute;lectronique indiqu&eacute;e à l&apos;inscription ;
pour pouvoir vendre : apr&egrave;s v&eacute;rification de l&apos;identit&eacute; du membre par courrier postal (justificatif de domicile) ou identification bancaire (par la carte de cr&eacute;dit) ;
					</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12">
						<h6 class="text-uppercase font-weight-bold">Contact</h6> 
						<p>
							37, quai de Grenelle, 75015 Paris, France <br> ece.ebay@edu.ece.fr <br>
							+33 01 02 03 04 05 <br>
							+33 01 03 02 05 04
						</p> 
					</div>
				</div>
			</div>
			<div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: ece.ebay@edu.ece.fr</div> </footer>
		
	</body>

		</html>