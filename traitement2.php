<?php

		$id =isset($_GET["id"]) ? $_GET["id"]:"";
		
	   $userid =isset($_GET["userid"]) ? $_GET["userid"]:"";

		
		$mail=isset($_GET["mail"]) ? $_GET["mail"]:"";

		$user =isset($_GET["user"]) ? $_GET["user"]:"";


		echo 'a';

		try
			{
				
				//On établit la connexion
            $conn = new PDO('mysql:host=localhost;dbname=EbayECE;charset=utf8', 'root', 'root');
            
            //On vérifie la connexion
			}
            catch(Exception $e){
                die('Erreur : ' .$e->getMessage);
            }
			
		echo 'b';

				if($user=='1')
				{
					 
				echo 'e';
			$conn->exec('DELETE FROM `Paniers` WHERE ID='.$id.'');	
					
				}else if( $user=='2')
				{echo 'f';
				 
					$reponse = $conn->query('SELECT * FROM `Vendeurs` WHERE ID='.$id.'');
					$donnees=$reponse->fetch();
					$nom=$donnees['nom']
					$conn->exec('DELETE FROM `Items` WHERE Vendeur=\''.$nom.'\'');
					
			 $conn->exec('DELETE FROM `Vendeurs` WHERE ID='.$id.'');	
			
				
				}else if( $user=='3')
				{
					
					
			 $conn->exec('DELETE FROM `Acheteurs` WHERE ID='.$id.'');	
					
				}else if( $user=='4')
				{
					echo 'd';
					
			 $conn->exec('DELETE FROM `Items` WHERE ID='.$id.'');	
					
				}
echo 'c';
				
				
		
			echo "id=".$id;

			echo "<br>userid=".$userid;

			echo "<br>mail=".$mail;
			echo "<br>user=".$user;
		
		
		/*echo '<meta http-equiv="refresh" content="0;URL=admin.php?&userid='.$userid.'&mail='.$mail.'&sucess=1">';*/

?>