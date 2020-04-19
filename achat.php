<?php

	   $userid =isset($_GET["userid"]) ? $_GET["userid"]:"";
		
		$mail=isset($_GET["mail"]) ? $_GET["mail"]:"";
		
		$prev=isset($_GET["prev"]) ? $_GET["prev"]:"";
		
		$paiement=isset($_GET["sucess"]) ? $_GET["sucess"]:"0";

		$total=isset($_GET["total"]) ? $_GET["total"]:"1000000000000000";

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
		$donnees=$reponse->fetch();
						$plafond=$donnees['MontantPlafond'];
						echo $plafond;

					if($plafond>$total)
					{
						
						$reponse = $conn->query('SELECT * FROM Panier WHERE Actif=\'0\' AND nb=\'0\' AND acheteur=\''.$mail.'\'');
							
while ($donnees = $reponse->fetch())
{
			$reponse->closeCursor();
			 $conn->exec('DELETE FROM Items WHERE ID=\''.$donnees['ID'].'\'');	
		
						
	
}
						$conn->exec('DELETE FROM Panier WHERE Actif=\'0\' AND nb=\'0\' AND acheteur=\''.$mail.'\'');
						echo '<meta http-equiv="refresh" content="0;URL=panier.php?prev='.$prev.'&userid='.$userid.'&mail='.$mail.'&sucess=1">';
						
					}else
					{
						echo '<meta http-equiv="refresh" content="0;URL=panier.php?prev='.$prev.'&userid='.$userid.'&mail='.$mail.'&sucess=2">';
					}
			
				$reponse->closeCursor();
		
		

?>