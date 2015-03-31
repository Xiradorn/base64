<?php
/**
* File Converter e Uploader con codici di controllo di tipologia MD5 e SHA1.
* Author: Sir Xiradorn
* Site: http://xiradorn.it
*/

/* Variabili di Ambiente */
define("INCLUDES", "includes/");

/* Inlusione funzioni */
include_once(INCLUDES . "functions_hash.php");
include_once(INCLUDES . "functions_unit.php");

/* Definizione Variabili di Sistema */
$uploads_directory = "uploads/";
$upload_ok = 1; 
$allowed_type = array("jpg", "jpeg", "gif", "png");

/**
* Definizione variabili per file uplodati da locale
*/
$file_target = $uploads_directory . basename($_FILES["upfile"]["name"]);
$file_type = pathinfo($file_target, PATHINFO_EXTENSION);
$file_name = basename($_FILES["upfile"]["name"]);
$file_tmp_name = $_FILES["upfile"]["tmp_name"];
$file_size = $_FILES["upfile"]["size"];
$file_size_md5 = $file_size + ($file_size * 33 / 100);

/**
* Definizione per url
*/
$url_file = $_POST["file_url"];
	
/** Controllo di sicurezza */
if (isset($_POST["submit"])) {
	$check = getimagesize($file_tmp_name);
	if ($check !== false) {
		echo "Questo file è una immagine {$check['mime']}";
		$upload_ok = 1;
	} else {
		echo "Il file non è un'immagine";
	}
}

/** Controllo di esistenza del file */
/*if (file_exists($file_target)) {
	echo "Attenzione il file caricato è già esistente. Si prega di caricare un file diverso";
	$upload_ok = 0;
}*/

/** Funzione di controllo e di limitazione delle dimensioni */
/*if ($file_size > 500000) {
	echo "Attenzione il file è troppo grande";
	$upload_ok = 0;
}*/

/** Funzione di controllo per le tipologie caricate */
/*if (!in_array($file_type, $allowed_type)) {
	echo "Attenzione il file può essere soltanto jpg, jpeg, png o gif. Controlla quindi che sia un file con uno solo dei precedenti formati elencati";
}*/

/* Switch velore per il controllo o da link o da remoto */
if ($url_file){
	$file_tmp_name = $url_file;
	
	/* Cattura informazioni url */
	$ch = curl_init($file_tmp_name);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_HEADER, TRUE);
	curl_setopt($ch, CURLOPT_NOBODY, TRUE);
	
	$data = curl_exec($ch);
	$size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
	$file_name = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
	
	curl_close($ch);
	$file_size = $size;
	$file_size_md5 = $file_size + ($file_size * 33 / 100);
}
/**
* Funzione per la codifica della base64 con l'uso del MIME
*/
$file_content = file_get_contents($file_tmp_name);

$mime_type = getimagesize($file_tmp_name);

// Ricerca del tipo di mime
$allowed_mime = array(
	"gif"	=>	"image/gif",
	"png"	=>	"image/png",
	"jpeg"	=>	"image/jpg",
	"jpg"	=>	"image/jpg"
);

/** Ricavo mime da file */
$file_mime = $mime_type['mime'];

// Base64 Conversione
$encoded_file = base64_encode($file_content);

/* Struttura di raggruppamento */;
$base64_struct = array(
	"mime"		=>	$file_mime,
	"base64" 	=>	$encoded_file,
	"html"		=>	"data:".$file_mime.";base64,".$encoded_file
);

// Variabile per supporto hashing
$hash = x_hash_file("md5, sha1", $file_tmp_name);

/**
* Caricamento del file
*/
/*if ($upload_ok == 0) {
	echo "Mi dispiace ma non è stato possibile caricare il file";
} else {
	if (move_uploaded_file($file_tmp_name, $file_target)) {
		echo "Complimenti il file $file_name è stato caricato con successo";
	} else {
		echo "Attenzione non è stato possibile eseguire nessun caricamento.";
	}
}*/

/**
* Funzioni di controllo del template
*/

include_once("includes/template.php");

?>