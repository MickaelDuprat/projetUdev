<!DOCTYPE html>
<html>

	<head>
		
	</head>

	<body>
		<table>
			<tr><th>CP</th><th>Ville</th></tr>
			<?php 
				foreach($listeCpVilles AS $cpVille){
					print('<tr><td>'.$cpville->getCp().'</td>');
					print('<tr><td>'.$cpville->getVille().'</td>');
				} 
			?>
		</table>
	</body>

	<footer>
		
	</footer>

</html>