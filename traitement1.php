<?php

	   $userid =isset($_GET["userid"]) ? $_GET["userid"]:"";

		$user =isset($_GET["user"]) ? $_GET["user"]:"";
		
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

		$reponse = $conn->query('SELECT * FROM Panier WHERE ID=\''.$id.'\' AND Nom=\''.$nom.'\'');
		$donnees=$reponse->fetch();

			$nb=$donnees['nb']+1;
						
				
				if($nb<5 && $paiement!=3)
				{
					$conn->exec('UPDATE Panier SET Offre=\''.$offre.'\', Message=\''.$message.'\', nb=\''.$nb.'\' WHERE ID='.$id.'');
				}else if( $paiement==3)
				{
					
					 $conn->exec('UPDATE Panier SET Actif=\'0\' WHERE ID='.$id.'');
					
				}else
				
				
		
			echo "userid=".$userid;
			
			echo "mail=".$mail;

			echo "id=".$id;

			echo "nom=".$nom;

			echo "prev=".$prev;

			echo "offre=".$offre;

			echo "message=".$message;

			echo "paimement=".$paiement;
				$reponse->closeCursor();

			echo $nb;

			echo '<br>'.$message;
		
		echo '<meta http-equiv="refresh" content="0;URL=negocier.php?id='.$id.'&nom='.$nom.'&prev='.$prev.'&userid='.$userid.'&mail='.$mail.'&sucess='.$paiement.'&user='.$user.'">';

?>