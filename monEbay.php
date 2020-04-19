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
	
<link rel="stylesheet" type="text/css" href="monEbay.css">
	
</head> 
	
	<body>
		
		<?php
		
		$userid =isset($_GET["userid"]) ? $_GET["userid"]:"";//if then else
    
        $mail =isset($_GET["mail"]) ? $_GET["mail"]:"";
		
		$prev =isset($_GET["prev"]) ? $_GET["prev"]:"";
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
				
						echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="homepageac.php?userid='.$userid.'&mail='.$mail.'">Accueil</a></li>';
					
						echo '<li id="inscrip" class="nav-item"><a class="nav-link" href="'.$prev.'?userid='.$userid.'&mail='.$mail.'" >Page Pr&eacute;dente</a></li>';
 
					    echo '<li class="nav-item"><a class="nav-link" href="panier.php?prev=monEbay.php&userid='.$userid.'&mail='.$mail.'">Panier</a></li>';
					
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
				
				<div class="col-sm-4">  <h1 class="titre">Mon EbayECE</h1> </div>
				
			</div>
			
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
			
			<div class="col-sm-3" style="background-color:red;"><h3>Ench&egrave;re en cours</h3></div>
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

		$reponse = $conn->query('SELECT * FROM Panier WHERE Actif=\'1\' AND nb=\'0\' AND acheteur=\''.$mail.'\'');
							
while ($donnees = $reponse->fetch())
{
			$reponse->closeCursor();
			$reponse = $conn->query('SELECT * FROM Items WHERE ID=\''.$donnees['ID'].'\'');
			$donnees1=$reponse->fetch();	
?>			
						<div class="row">
			
							<div class="col-sm-3"><?php echo "<img src=\"image/".$donnees1['Media']."\"width=\"300\" height=\"300\">"; ?></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;"><h2> <?php echo $donnees1['Nom']; ?></h2></div>
							<div class="col-sm-3"><h2> <?php echo 'Offre: '.$donnees['Offre']."&euro;"; ?></h2></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							<h1> <?php 
						
						if($donnees1['Prix']!=0)
						{
							echo "Prix: ".$donnees1['Prix']."&euro;";
						}else if($donnees1['PrixDepart'])
						{
							echo "Prix d&eacute;part: ".$donnees1['PrixDepart']."&euro;";
						}
 							$total=$donnees1['PrixDepart']+$donnees1['Prix'];
							?></h1>
							
							</div>
						</div>
			<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"></div>
			<div class="col-sm-3" style="background-color:blue; "></div>
			<div class="col-sm-3" style="background-color:#F5B041; text-align: right;"><h3>total:</h3></div>
				<div class="col-sm-3" style="background-color:lightgreen;"><h3><?php echo $total."&euro;" ?></h3></div>
			</div>
			
		</div>
						
						<?php
	
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
			
			<div class="container-fluid">
		<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Meilleure Offre en cours</h3></div>
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

		$reponse = $conn->query('SELECT * FROM Panier WHERE Actif=\'1\' AND nb!=\'0\' AND acheteur=\''.$mail.'\'');
							
while ($donnees = $reponse->fetch())
{
			$reponse->closeCursor();
			$reponse = $conn->query('SELECT * FROM Items WHERE ID=\''.$donnees['ID'].'\'');
			$donnees1=$reponse->fetch();	
?>			
						<div class="row">
			
							<div class="col-sm-3"><?php echo "<img src=\"image/".$donnees1['Media']."\"width=\"300\" height=\"300\">"; ?></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;"><h2> <?php echo $donnees1['Nom']; ?></h2></div>
							<div class="col-sm-3"><h2> <?php echo 'Offre: '.$donnees['Offre']."&euro;"; ?></h2><br> dernier message: <?php echo $donnees['Message']; ?></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							<h1> <?php 
						
						if($donnees1['Prix']!=0)
						{
							echo "Prix: ".$donnees1['Prix']."&euro;";
						}else if($donnees1['PrixDepart'])
						{
							echo "Prix d&eacute;part: ".$donnees1['PrixDepart']."&euro;";
						}
 							$total=$donnees1['PrixDepart']+$donnees1['Prix'];
							?></h1>
								
						<a class="btn btn-default" <?php echo 'href="fot.php?userid='.$userid.'&mail='.$mail.'"' ?> role="button" >&Eacute;changez avec le vendeur?</a>
							
							</div>
						</div>
						<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"></div>
			<div class="col-sm-3" style="background-color:blue; "></div>
			<div class="col-sm-3" style="background-color:#F5B041; text-align: right;"><h3>total:</h3></div>
				<div class="col-sm-3" style="background-color:lightgreen;"><h3><?php echo $total."&euro;" ?></h3></div>
			</div>
			
		</div>
						<?php
	
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
				
			
		
				<div class="container-fluid">
		<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Contact</h3></div>
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

		$reponse = $conn->query('SELECT * FROM Acheteurs WHERE ID=\''.$userid.'\' AND Mail=\''.$mail.'\'');

while ($donnees = $reponse->fetch())
{
?>
						<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Mail:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Mail']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
						
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Nom:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Nom']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
						
						<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Mot de Passe:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Password']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Information de Livraison</h3></div>
			<div class="col-sm-3" style="background-color:blue; text-align: center;"></div>
			<div class="col-sm-3" style="background-color:#F5B041;"></div>
			<div class="col-sm-3" style="background-color:lightgreen;"></div>
			</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Addresse 1:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Adresse1']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Addresse 2:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Adresse2']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Ville:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Ville']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Code Postal:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['CodePostal']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Pays:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Pays']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Telephone:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['Telephone']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
			<div class="col-sm-3" style="background-color:red;"><h3>Information de Paiement</h3></div>
			<div class="col-sm-3" style="background-color:blue; text-align: center;"></div>
			<div class="col-sm-3" style="background-color:#F5B041;"></div>
			<div class="col-sm-3" style="background-color:lightgreen;"></div>
			</div>
					
			<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Type de Carte:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['CartePaiement']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Num&eacute;ro de la carte:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['NumCarte']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Nom Titulaire:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['NomTitu']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
					
					<div class="row">
			
							<div class="col-sm-3"></div>
							<div class="col-sm-3" style="background-color:#E3E3E3; text-align:center;"><h2> Expire:</h2></div>
							<div class="col-sm-3"><p> <?php echo "<h1>".$donnees['DateExp']."</h1>"; ?></p></div>
							<div class="col-sm-3" style="background-color:#E3E3E3;">
							
							</div>
						</div>
						<?php
}

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