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
	
<link rel="stylesheet" type="text/css" href="homepage.css">
	
</head> 
	
	<body>
		
				<?php
		
		$id =isset($_GET["userid"]) ? $_GET["userid"]:"";//if then else
    
        $nom =isset($_GET["mail"]) ? $_GET["mail"]:"";
?>
		
		<nav class="navbar navbar-expand-md">
 				<a class="navbar-brand" href="#"></a>
					
					<img src="image/logo.png" width="30" height="30" alt="">
 
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
 
				<span class="navbar-toggler-icon"></span>
 
			</button>
 
			<div class="collapse navbar-collapse" id="main-navigation">
 				
				
				<ul class="navbar-nav">
					
					<li id="inscrip" class="nav-item"><a class="nav-link" href="homepage.php">D&eacute;conexion</a></li>
					
					<li id="inscrip" class="nav-item"><a class="nav-link" <?php echo 'href="monEbay.php?prev=homepageac.php&userid='.$userid.'&mail='.$mail.'"'; ?>>Mon EbayECE</a></li>
 
					<li class="nav-item"><a class="nav-link" <?php echo 'href="panier.php?prev=homepageac.php&userid='.$userid.'&mail='.$mail.'"'; ?>>Panier</a></li>
 
				</ul>
 
			</div>

		</nav>
		
		<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-sm-4"></div>
			<div class="col-sm-6"><img src="image/logo.png" width="400" height="175" alt="Bootstrap" class="img-responsive"></div>
			<div class="col-sm-2"></div>
			
		</div>
			
		<div class="row">
				
				<div class="col-sm-3"></div>
				<div class="col-sm-2">  
					<button type="button" class="btn btn-light" href="fot.php">
						<a class="btn btn-default" <?php echo 'href="fot.php?userid='.$id.'&mail='.$nom.'"' ?>role="button" style="color:black">Feraille/Tr&eacute;sors</a>
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
			    <div class="col-sm-3"></div>
				
		</div>
			
		<br/><br/>
			
				<div class="row">
				
				<div class="col-sm-4"></div>
			    <div class="col-sm-6">
					
					
					<div class="carousel slide" data-ride="carousel">
		
			<ul class="carousel-indicators">
			
				<li data-target="#option" data-slide-to="0" class="active"></li>
				<li data-target="#option" data-slide-to="1"></li>
				<li data-target="#option" data-slide-to="2"></li>
			
			</ul>
		
			<div class="carousel-iner">
			
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
			
			$reponse = $conn->query('SELECT * FROM Items') or die(print_r($bdd->errorInfo()));
			if($donnees = $reponse->fetch())
			{
				
				?>
				
			<div class="carousel-item active">
			<?php echo "<a href=\"items.php?id=".$donnees['ID']."&nom=".$donnees['Nom']."&prev=homepageac.php&userid=".$id."&mail=".$nom."\"><img src=\"image/".$donnees['Media']."\"width=\"300\" height=\"300\"></a>"; ?>
			<div class="caroussel-caption">
			<h2> <?php echo $donnees['Nom']; ?></h2>
			<p> <?php 
						
						if($donnees['Prix']!=0)
						{
							echo "Prix: ".$donnees['Prix']."&euro;";
						}else if($donnees['PrixDepart']!=0)
						{
							echo "Prix d&eacute;part: ".$donnees['PrixDepart']."&euro;";
						}
							?></p>
			</div>
			</div>
				<?php
			}
					while ($donnees = $reponse->fetch()) 
					{
						?>
						<div class="carousel-item">
						<?php echo "<a href=\"items.php?id=".$donnees['ID']."&nom=".$donnees['Nom']."&prev=homepageac.php&userid=".$id."&mail=".$nom."\"><img src=\"image/".$donnees['Media']."\"width=\"300\" height=\"300\"></a>"; ?>
					    <div class="caroussel-caption">
					    <h2> <?php echo $donnees['Nom']; ?></h2>
					    <p> <?php 
						
						if($donnees['Prix']!=0)
						{
							echo "Prix: ".$donnees['Prix']."&euro;";
						}else if($donnees['PrixDepart'])
						{
							echo "Prix d&eacute;part: ".$donnees['PrixDepart']."&euro;";
						}
							?></p>
					    </div>
						</div>
						<?php
					}
						
				?>
				
				
			
			</div>
			
			<div id="option" class="carousel slide" data-ride="carousel" data-interval="250" data-pause="hover"></div>
			
		</div>
					
					
					</div>
			    <div class="col-sm-2"></div>
				
				</div>
		
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