<?php

/**
* Funzione di hashing per il controllo. 
* In ingresso prende il valore di hashing e in uscita quello codificato
*/
function x_hash_file($algo, $stringa) {
	$algo = explode(", ", $algo);
	$allowed_algo = array(
		"md5"	=>	"md5", 
		"sha1"	=>	"sha1",
		"sha256"	=>	"sha256",
		"sha512"	=>	"sha512"
	);
	
	foreach ($algo as $a) {
		if (in_array($a, $allowed_algo)){
			foreach($allowed_algo as $key => $algos) {
				$hash_encoded[$key] = hash_file($algos, $stringa);
			}
		} else {
			echo "Attenzione il formato della codifica è errato";
			$hash_encoded[] = 0;
		}
	}
	return $hash_encoded;
}

?>