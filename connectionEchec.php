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
	
	
<link rel="stylesheet" type="text/css" href="connection.css">
	
</head> 
	
	<body>
		
		<?php
		
		$prev =isset($_GET["prev"]) ? $_GET["prev"]:"";//if then else
		
		?>
		<nav class="navbar navbar-expand-md">
 				<a class="navbar-brand" href="#"></a>
					
					<img src="image/logo.png" width="30" height="30" alt="">
 
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
 
				<span class="navbar-toggler-icon"></span>
 
			</button>
 
			<div class="collapse navbar-collapse" id="main-navigation">
 				
				
				<ul class="navbar-nav">
					
					<li id="inscrip" class="nav-item"><a class="nav-link" href="homepage.php">Accueil</a></li>
					
					<li id="inscrip" class="nav-item"><a class="nav-link" <?php echo 'href="'.$prev.'"' ?>>Page Pr&eacute;dente</a></li>
					
					<li id="inscrip" class="nav-item"><a class="nav-link" href="#">Insrivez Vous!</a></li>
 
					<li class="nav-item"><a class="nav-link" href="#">Admin</a></li>
 
				</ul>
 
			</div>

		</nav>
		
		<form method="post" action="#">
		
		<div class="container-fluid">
		
		<div class="row">
			
			<div class="col-sm-3"><img src="image/logo.png" width="400" height="175" alt="Bootstrap" class="img-responsive"></div>
			<div class="col-sm-9"></div>
			
		</div>
		
		<div class="row">
			
			<div class="col-sm-4"></div>
			<div class="col-sm-3" style="background-color:#C0C0C0; text-align: center;"><h1 >Connectez Vous!</h1></div>
			<div class="col-sm-5"></div>
		
		</div>
				<br/><br/>	<center><h3 style="color:red;">E-mail ou mot de passe incorrect </h3></center><br/><br/>
		<div class="row">
			
		<div class="col-sm-4"></div>
		<div class="col-sm-1"> <h2 style="background-color:#C0C0C0; text-align: center;">Mail:</h2></div>
		<div class="col-sm-1"></div>
		<div class="col-sm-2" ><input type="text" name="mail" class="form-control" placeholder="Entrer un E-mail"></div>
		<div class="col-sm-3"></div>	
		
		</div>
		
			<br/><br/>
			
			<div class="row">
			
		<div class="col-sm-3"></div>
		<div class="col-sm-2" > <h2 style="background-color:#C0C0C0; text-align: center;">Password:</h2></div>
		<div class="col-sm-1"></div>
		<div class="col-sm-2" ><input type="password" name="pass"class="form-control" placeholder="password"></div>
		<div class="col-sm-3"></div>	
		
		</div>
			
			<br/><br/>
			
			<div class="row">
				
			<div class="col-sm-5"></div>
			<div class="col-sm-2">  
					<button type="submit" class="btn btn-light" href="#">
						<b>Connexion</b>
					</button> 
			    </div>
				<div class="col-sm-4"></div>
			
			</div>
			
			<br/><br/>
			
			<div class="row">
				
			<div class="col-sm-9"></div>
			<div class="col-sm-2">  
					<button type="button" class="btn btn-light" href="#">
						<a class="btn btn-default" href="#" role="button" style="color:black"><small>Vous &ecirc;tes vendeurs? Cliquez ici!</small></a>
					</button> 
			    </div>
			<div class="col-sm-1"></div>
			</div>
			
		</div>
		</form>
		
		<?php
	
		$mail =isset($_POST["mail"]) ? $_POST["mail"]:"";//if then else
		$pass =isset($_POST["pass"]) ? $_POST["pass"]:"";//if then else
														 
		try
			{
				
				//On établit la connexion
            $conn = new PDO('mysql:host=localhost;dbname=EbayECE;charset=utf8', 'root', 'root');
            
            //On vérifie la connexion
			}
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage);
            }
														 
			$reponse = $conn->query('SELECT * FROM Acheteurs WHERE Mail=\''.$mail.'\' AND Password=\''.$pass.'\'');
			$donnees=$reponse->fetch();
														 
			
			if($donnees['Mail']==$mail && $donnees['Password']==$pass && $mail!="" && $pass!="" )
			{
				echo '<meta http-equiv="refresh" content="0;URL=homepage.php">';
				
			}else if( $mail!="" && $pass!="" ){
				echo '<meta http-equiv="refresh" content="0;URL=connectionEchec.php?prev='.$prev.'">';
				
			}
			
			$reponse->closeCursor(); // Termine le traitement de la requête
	
		?>
		
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