<?php
/**
* Description: Raccolta di funzioni di supporto per la gestione e il controllo dell'upload
* Author: Sir Xiradorn
* Site: http://xiradorn.it
*/

/**
* Gestione dei MIME type usando l'istruzione pathinfo. Questa funzione è basata su un elenco di mime.
* La funzione ne prende l'estensione dalla sola parte finale ricavendone così il Mime
*/
function get_mime_type($file)
{
	// our list of mime types
	$mime_types = array(
		"pdf"	=>	"application/pdf",
		"exe"	=>	"application/octet-stream",
		"zip"	=>	"application/zip",
		"docx"	=>	"application/msword",
		"doc"	=>	"application/msword",
		"xls"	=>	"application/vnd.ms-excel",
		"ppt"	=>	"application/vnd.ms-powerpoint",
		"gif"	=>	"image/gif",
		"png"	=>	"image/png",
		"jpeg"	=>	"image/jpg",
		"jpg"	=>	"image/jpg",
		"mp3"	=>	"audio/mpeg",
		"wav"	=>	"audio/x-wav",
		"mpeg"	=>	"video/mpeg",
		"mpg"	=>	"video/mpeg",
		"mpe"	=>	"video/mpeg",
		"mov"	=>	"video/quicktime",
		"avi"	=>	"video/x-msvideo",
		"3gp"	=>	"video/3gpp",
		"css"	=>	"text/css",
		"jsc"	=>	"application/javascript",
		"js"	=>	"application/javascript",
		"php"	=>	"text/html",
		"htm"	=>	"text/html",
		"html"	=>	"text/html"
	);

	$extension = pathinfo($file);
	$extension = strtolower($extension["extension"]);

	return $mime_types["$extension"];
}

?>