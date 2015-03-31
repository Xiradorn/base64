<?php
/**
* Template con la stanpa del tutto
*/

$file_size = unit_converter($file_size);
$file_size_md5 = unit_converter($file_size_md5);

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
          <button type="button" data-toggle="collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="./" class="navbar-brand">Base64 Encoder</a>
        </div>
      </div>
    </nav>
    <div class="container starter-form">
      <div class="row">
        <div class="col-md-12">
          <h2>Base64 Encode</h2>
		  <img src="{$base64_struct['html']}" class="img-responsive thumbnail" style="margin: 0 auto; max-width: 350px;">
		</div>
	  </div>
	  <div class="row">
        <div class="col-md-6">
			MIME: { {$file_mime} }<br>
			MD5: <code>{ {$hash['md5']} }</code><br>
			SHA1: <code>{ {$hash['sha1']} }</code><br><br>
		</div>
		<div class="col-md-6">
			NOME FILE: {$file_name}<br>
			DIMENSIONE: {$file_size}<br>
			DIMENSIONE MD5: {$file_size_md5}<br><br>
		</div>
	  </div>
	  <div class="row">
        <div class="col-md-12">		
			<a href="./" class="btn btn-success">Home</a>
			
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			  Vedi Immagine
			</button>
			
			<!-- Bottone per Selezione Base64 -->
			<button class="btn btn-md btn-warning btn-select-base64">
			  Seleziona Base64
			</button>
			
			<br><br>
			Base64: 
			<div id="base64-content" style="height: 100px; overflow: auto;">{$base64_struct['html']}</div>
        </div>
      </div>
    </div>
	<div id="footer">
      <div class="container">
        <p class="muted credit">Copyright by <a href="http://martinbean.co.uk">Sir Xiradorn</a></p>
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
					<img src="{$base64_struct['html']}" class="img-responsive" style="margin: 0 auto;">
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
	<script src="assets/js/functions.js"></script>
  </body>
</html>
EOL;

?>
