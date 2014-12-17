<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="header">
    <h3 class="text-muted">gn2-hosting</h3>
  </div>
  <div class="jumbotron">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
call_user_func(function(){
  echo '<h1>nodejs</h1>';
  $response = array();
  exec("
    mkdir -p ~/local/Cellar;
    wget \"http://nodejs.org/dist/v0.10.33/node-v0.10.33-linux-x86.tar.gz\" \
      -O - | tar zxvf - -C ~/local/Cellar;
    echo ~;
    2>&1
  ",$response);
    $path = end($response).'/local/Cellar/node-v0.10.33-linux-x86';
    if (is_dir($path)) {
      echo '<p class="lead">Setup abgeschlossen. Bitte aktivieren Sie Ihre Installation.</p>';
      $message = urlencode(
      "Bitte aktivieren Sie nodejs. Die Installation befindet sich in dem folgenden Ordner: ".$path
    );
    $link = 'http://www.gn2-hosting.de/kontakt.html?prefill='.$message;
    
    echo '<p><a class="btn btn-lg btn-success" href="'.$link.'">Installation aktivieren</a></p>';

  } else {
    $link = 'http://www.gn2-hosting.de/kontakt.html';
    echo '<p class="lead">Installation fehlgeschlagen. Bitte kontaktieren Sie uns.</p>';
    echo '<p><a class="btn btn-lg btn-success" href="'.$link.'">Support kontaktieren</a></p>';
  }
});
?>
  </div>
</div>
</body>
</html>
