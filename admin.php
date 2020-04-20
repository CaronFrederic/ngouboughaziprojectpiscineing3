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
	
<link rel="stylesheet" type="text/css" href="admin.css">
	
</head> 
	
	<body>
		
		<?php
		
		$userid =isset($_GET["userid"]) ? $_GET["userid"]:"";//if then else
    
        $mail =isset($_GET["mail"]) ? $_GET["mail"]:"";
		
		$prev =isset($_GET["prev"]) ? $_GET["prev"]:"";
		
		$sucess =isset($_GET["sucess"]) ? $_GET["sucess"]:"";
		
		
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

						echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="homepage.php">D&eacute;conexion</a></li>';
					
 					?>
				</ul>
 
			</div>

		</nav>
		<div class="bg">
		<br/><br/>
		<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-sm-4"><img src="image/logo.png" width="400" height="175" alt="Bootstrap" class="img-responsive"></div>
			<div class="col-sm-8">
			
				<div class="container-fluid">
				
			<div class="row">
				
				<div class="col-sm-4">  <h1 class="titre">Mon EbayECE</h1> </div>
				
				<div class="col-sm-4">  </div>
				
				<div class="col-sm-4">  
				
				
				</div>
				
			</div>
					<?php
	
				if($sucess==1)
				{
					echo '<br/><br/>	<center><h3 style="color:green;">Suppression r&eacute;ussi! </h3></center><br/><br/>';
				}else if($sucess==2)
				{
					echo '<br/><br/>	<center><h3 style="color:red;"> Echec! </h3></center><br/><br/>';
				}
	
			?>
			
				</div>
			</div>
			
		</div>
			
		<div class="row">
				
				<div class="col-sm-3"></div>
				<div class="col-sm-1"></div>
			<div class="col-sm-1"></div>
				<div class="col-sm-2">  
					 
			    </div>
				<div class="col-sm-2">  
					
			</div>
			    <div class="col-sm-2">
				
			    </div>
				
		</div>
			
		
		
		</div>
		
	
		<br/><br/>
		
		<div class="container-fluid">
		<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Vente en cours</h3></div>
			<div class="col-sm-3" style="background-color:blue; text-align: center;"></div>
			<div class="col-sm-3" style="background-color:#F5B041;"></div>
			<div class="col-sm-3" style="background-color:lightgreen;"></div>
			</div>
<?php
			try
			{
				
				//On établit la connexion
            $conn = new PDO('mysql:host=localhost;dbname=EbayECE;charset=utf8', 'root', 'root');
            
            //On vérifie la connexion
			}
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage);
            }
			
		$reponse = $conn->query('SELECT * FROM `Panier`');
							
while ($donnees = $reponse->fetch())
{
			$reponse->closeCursor();
			$reponse = $conn->query('SELECT * FROM Items WHERE ID=\''.$donnees['ID'].'\'');
			$donnees1=$reponse->fetch();	
?>			
						<div class="row">
			
							<div class="col-sm-3"><?php echo "<img src=\"image/".$donnees1['Media']."\"width=\"300\" height=\"300\">"; ?></div>
							<div class="col-sm-3" ><h2 > <?php echo $donnees1['Nom']; ?></h2></div>
							<div class="col-sm-3"><p> <?php echo $donnees1['Description']; ?></p> </div>
							<div class="col-sm-3" >
							
							<h1 > <?php 
						
						if($donnees1['Prix']!=0)
						{
							echo "Prix: ".$donnees1['Prix']."&euro;";
						}else if($donnees1['PrixDepart'])
						{
							echo "Offre: ".$donnees['Offre']."&euro;";
						}
 							$total=$donnees1['PrixDepart']+$donnees1['Prix'];
							?></h1>
								
						<a class="btn btn-default" <?php echo 'href="traitement2.php?id='.$donnees['ID'].'&userid='.$userid.'&mail='.$mail.'&user=1"' ?> role="button" ><p >Supprimer</p></a>
							
							</div>
						</div>
		
			
		</div>
						<?php
	
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
	
			<div class="container-fluid">
				
				<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Produit</h3></div>
			<div class="col-sm-3" style="background-color:blue; text-align: center;"></div>
			<div class="col-sm-3" style="background-color:#F5B041;"></div>
			<div class="col-sm-3" style="background-color:lightgreen;"></div>
			</div>
				
<?php
			try
			{
				
				//On établit la connexion
            $conn = new PDO('mysql:host=localhost;dbname=EbayECE;charset=utf8', 'root', 'root');
            
            //On vérifie la connexion
			}
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage);
            }
				$reponse = $conn->query('SELECT * FROM `Items`');
							
while ($donnees = $reponse->fetch())
{
?>			
						<div class="row">
			
							<div class="col-sm-3"><?php echo "<img src=\"image/".$donnees['Media']."\"width=\"300\" height=\"300\">"; ?></div>
							<div class="col-sm-3" ><h2 > <?php echo $donnees['Nom']; ?></h2></div>
							<div class="col-sm-3"><p> <?php echo $donnees['Description']; ?></p> </div>
							<div class="col-sm-3" >
							
							<h1 > <?php 
						
						if($donnees['Prix']!=0)
						{
							echo "Prix: ".$donnees['Prix']."&euro;";
						}else if($donnees['PrixDepart'])
						{
							echo "Prix Depart: ".$donnees['PrixDepart']."&euro;";
						}
							?></h1>
								
						<a class="btn btn-default" <?php echo 'href="traitement2.php?id='.$donnees['ID'].'&userid='.$userid.'&mail='.$mail.'&user=4"' ?> role="button" ><p >Supprimer</p></a>
							
							</div>
						</div>
		
			
		</div>
						<?php
	
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
			
			<div class="container-fluid">
				
				<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Marchants</h3></div>
			<div class="col-sm-3" style="background-color:blue; text-align: center;"></div>
			<div class="col-sm-3" style="background-color:#F5B041;"></div>
			<div class="col-sm-3" style="background-color:lightgreen;"></div>
			</div>
				
<?php
			try
			{
				
				//On établit la connexion
            $conn = new PDO('mysql:host=localhost;dbname=EbayECE;charset=utf8', 'root', 'root');
            
            //On vérifie la connexion
			}
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage);
            }
				$reponse = $conn->query('SELECT * FROM `Vendeurs`');
							
while ($donnees = $reponse->fetch())
{
?>			
						<div class="row">
			
							<div class="col-sm-3"><a class="btn btn-default" <?php echo 'href="traitement2.php?id='.$donnees['ID'].'&userid='.$userid.'&mail='.$mail.'&user=2"' ?> role="button" ><p >Supprimer</p></a></div>
							<div class="col-sm-3" ><h2> <?php echo $donnees['pseudo']; ?></h2></div>
							<div class="col-sm-3"><h4> <?php echo $donnees['mail']; ?></h4> </div>
							<div class="col-sm-3" >
							
							<?	<h2> <?php echo $donnees['nom']; ?>
								
							</div>
						</div>
		
			
		</div>
						<?php
	
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
				
			
			<div class="container-fluid">
			<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Clients</h3></div>
			<div class="col-sm-3" style="background-color:blue; text-align: center;"></div>
			<div class="col-sm-3" style="background-color:#F5B041;"></div>
			<div class="col-sm-3" style="background-color:lightgreen;"></div>
			</div>
<?php
			try
			{
				
				//On établit la connexion
            $conn = new PDO('mysql:host=localhost;dbname=EbayECE;charset=utf8', 'root', 'root');
            
            //On vérifie la connexion
			}
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage);
            }
				$reponse = $conn->query('SELECT * FROM `Acheteurs`');
							
while ($donnees = $reponse->fetch())
{
?>			
						<div class="row">
			
							
							<div class="col-sm-3" ><h2> <?php echo $donnees['Nom']; ?></h2></div>
							<div class="col-sm-3"><h4> <?php echo $donnees['Mail']; ?></h4> </div>
							<div class="col-sm-3"><h2> <?php echo $donnees['Pays']; ?></h2></div> 
							<div class="col-sm-3" >
							
							<h2> <?php echo $donnees['CartePaiement']; ?><br/><a class="btn btn-default" <?php echo 'href="traitement2.php?id='.$donnees['ID'].'&userid='.$userid.'&mail='.$mail.'&user=3"' ?> role="button" ><p >Supprimer</p></a></h2>
								
							</div>
						</div>
		
			
		</div>
						<?php
	
}

$reponse->closeCursor(); // Termine le traitement de la requête


	
?>
			
		
		
		
		
		
		</div>
		
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