<?php

/* Variabili Primarie */
$ROOT_PATH = $_SERVER["DOCUMENT_ROOT"];

$uploads_directory = "/base64/uploads";

/* Directiory Primaria */
$up_dir = $ROOT_PATH . $uploads_directory;

// Nuovo Nome eventuale
$new_name = "";
$old_name = $_FILES["upfile"]["name"];
$temp_name = $_FILES["upfile"]["tmp_name"];

$new_url = $_POST['file_url'];

// controllo se il nome è nuovo
$file_name = ($new_name) ? $new_name : $old_name;

if ($temp_name){
	$base64 = base64_encode(file_get_contents($temp_name));
	$hash = array(
		"md5" => hash_file("md5", $temp_name),
		"sha1" => hash_file("sha1", $temp_name)
	);
	$mime_type = get_mime_type($file_name);
} else {
	$base64 = base64_encode(file_get_contents($new_url));
	$hash = array(
		"md5" => hash_file("md5", $new_url),
		"sha1" => hash_file("sha1", $new_url)
	);
	$mime_type = get_mime_type($new_url);
}


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

	$extension = explode('.', $file);
	$extension = strtolower(array_pop($extension));

	return $mime_types["$extension"];
}


/*$file_handler = $up_dir . "/" . $file_name;
if (@is_uploaded_file($temp_name)) {
	
	@move_uploaded_file($temp_name, $file_handler) or die("Problemi con il caricamento. Controlla l'esistenza del file e/o della directory e se esistono");
} else {
	die ("Problemi con il caricamento del file $file_name");
}*/

echo <<<EOL
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Sir Xiradorn">
    <meta name="description" content="Base 64 File Encoder">
    <title>Base64 Converter </title>
    <!-- Style section -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!--link(rel="stylesheet", type="text/css", href="css/assets/bootstrap-theme.min.css")-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand">Base64 Encoder</a>
        </div>
      </div>
    </nav>
    <div class="container starter-form">
      <div class="row">
        <div class="col-md-12">
          <h2>Base64 Encode</h2>
		  <img src="data:image/jpeg;base64,$base64" class="img-responsive thumbnail" style="margin: 0 auto; max-width: 350px;"><br>
			MIME: { {$mime_type} }<br>
			MD5: <code>{ {$hash['md5']} }</code><br>
			SHA1: <code>{ {$hash['sha1']} }</code><br><br>
			
			<a href="http://localhost/base64" class="btn btn-success">Home</a>
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			  Vedi Immagine
			</button>
			
			<br><br>
			Base64: 
			<div style="height: 100px; overflow: auto;">data:image/jpeg;base64,$base64</div>
        </div>
      </div>
    </div>
	
	<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Chiudi"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Immagine</h4>
				  </div>
				  <div class="modal-body">
					<img src="data:image/jpeg;base64,$base64" class="img-responsive" style="margin: 0 auto;">
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
				  </div>
				</div>
			  </div>
			</div>
			
    <!-- Js section-->
    <script src="assets/js/jquery/jquery.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>
EOL;

?>