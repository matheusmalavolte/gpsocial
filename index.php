<!DOCTYPE html>
<html>
  <head>
    <title>Gps Social</title>
    <link rel="stylesheet" href="/maps/documentation/javascript/cgc/demos.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" type="text/css" href="css/animacao.css">
    <link rel="stylesheet" type="text/css" href="css/responividade.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>		


<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    
<a class="navbar-brand" href="#">Gps Social</a>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-2"></div>
<div class="col-md-4"> <a href="login.php" class="fonte_branca">Fale conosco</a></div>
<div class="col-md-4"><a href="quem-somos.php" class="fonte_branca">Quem somos</a></div>


</div>
</div>
</nav>

  	
  	<div class="container">
  		<div class="row">
  			<div class="col-md-9">
  		<div id="map"></div>
  			</div>
  			<div class="col-md-3 texto">
  				<div class="filtro">
  				<br>
  				<input type="checkbox" name="deficiencia">Cadeirante<br>
          <input type="checkbox" name="deficiencia">Manco<br>
          <input type="checkbox" name="deficiencia">Biamputado<br>
  				<input type="checkbox" name="deficiencia">Cego<br><br>
  				<input type="button" name="" value="Filtrar" class="botao"><br><br><br>
  				<a href="#"><i class="fa fa-share-alt-square">Compartilhe nosso GPS</i></a>
  				<br> 
  				</div>							

  				<input type="text" name="teste" placeholder="Descrição do marker" style="height: 306px;"> 		
  			</div>
  			<div class="col-md-9"></div>
  			<div class="col-md-3">
  				
  			</div>
  	</div>
  	</div>
    <!--Animação-->
    <div class="box-out">
    <div class="box">
        <div class="b b1"></div>
        <div class="b b2"></div>
        <div class="b b3"></div>
        <div class="b b4"></div>
    </div>
    </div>
    <!--/Animação-->
  	



    <script>
      function initMap() {
        var myLatLng = {lat: -20.1726889, lng: -40.2561311};

        // Create a map object and specify the DOM element
        // for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 4
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          title: 'Fabra'
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2YPwcKJXItf2QMcLPh_MYVDfL5rPjf3U&callback=initMap"
        async defer></script>
  </body>
</html>