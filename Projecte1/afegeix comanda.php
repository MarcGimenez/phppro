<?php
	echo "<b>AFEGINT NOVA COMANDA I NOU PREU FINAL</b><br>";
	$nomfitxer="comanda.txt";
	$nova_comanda="samarretes 3 preu 15\n";
	$nou_preu_comanda="preu total comanda 500\n";
	$comandes=file($nomfitxer); //$comandes és un array de strings. Cada string és una línia.
	$darrera_linia=count($comandes)-1;
	$comandes[$darrera_linia-1]=$nova_comanda;
	$comandes[$darrera_linia]="\n";
	array_push($comandes,$nou_preu_comanda);  
	file_put_contents($nomfitxer,$comandes); //Passa l'array a l'arxiu	
?>
