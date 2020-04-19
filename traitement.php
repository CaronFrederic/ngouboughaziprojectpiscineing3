<?php

	   $userid =isset($_GET["userid"]) ? $_GET["userid"]:"";
		
		$mail=isset($_GET["mail"]) ? $_GET["mail"]:"";
		
		$id =isset($_GET["id"]) ? $_GET["id"]:"";//if then else
    
        $nom =isset($_GET["nom"]) ? $_GET["nom"]:"";
		
		$prev=isset($_GET["prev"]) ? $_GET["prev"]:"";

		$offre=isset($_POST["offre"]) ? $_POST["offre"]:"0";
		
		$message=isset($_POST["message"]) ? $_POST["message"]:" ";
		
		$paiement=isset($_GET["paiement"]) ? $_GET["paiement"]:"0";

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
						
			if($donnees['BestOffre']==1 && $paiement==2)
			{
				$conn->exec('INSERT INTO `Panier` (`ID`, `Nom`, `Vendeurs`, `acheteur`,`Offre`, `Message`, `Actif`, `nb`) VALUES (\''.$donnees['ID'].'\', \''.$donnees['Nom'].'\', \''.$donnees['Vendeur'].'\', \''.$mail.'\', \''.$offre.'\', \''.$message.'\', \'1\', \'1\')');
			}else if($donnees['Enchere']==1 && $paiement==2)
			{
				$conn->exec('INSERT INTO `Panier` (`ID`, `Nom`, `Vendeurs`, `acheteur`, `Offre`, `Message`, `Actif`, `nb`) VALUES (\''.$donnees['ID'].'\', \''.$donnees['Nom'].'\', \''.$donnees['Vendeur'].'\', \''.$mail.'\', \''.$offre.'\', \''.$message.'\', \'1\', \'0\')');
			}else if($donnees['Enchere']==1 && $paiement==1)
			{
				$conn->exec('INSERT INTO `Panier` (`ID`, `Nom`, `Vendeurs`, `acheteur`, `Offre`, `Message`, `Actif`, `nb`) VALUES (\''.$donnees['ID'].'\', \''.$donnees['Nom'].'\', \''.$donnees['Vendeur'].'\', \''.$mail.'\', \''.$offre.'\', \''.$message.'\', \'1\', \'0\')');
			}
		
			echo "userid=".$userid;
			
			echo "mail=".$mail;

			echo "id=".$id;

			echo "nom=".$nom;

			echo "prev=".$prev;

			echo "offre=".$offre;

			echo "message=".$message;

			echo "paimement=".$paiement;
				$reponse->closeCursor();
		
		echo '<meta http-equiv="refresh" content="0;URL=items.php?id='.$id.'&nom='.$nom.'&prev='.$prev.'&userid='.$userid.'&mail='.$mail.'&sucess='.$paiement.'">';

?>