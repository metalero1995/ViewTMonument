<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mandar a llamar a las hojas de estilo necesarias de la pagina-->
    <link rel="stylesheet" href="css/global.css">
    <!--Volver la página un poco responsive-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/monuments.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title>ViewTMonument</title>
    <link class="favicon" id="favicon" rel="icon" type="image/x-icon" href=""><!-- Colocar el icono de la pestaña-->

</head>

<body>
    <!-- Mandar a llamar el php del header-->
    <?php
    include("include/header.php");   
    include("clases/CMonumentos.php");
    $usuarios = buscar( );
    ?>
	<div class="busqueda">
		<form class="form_estilo" method="get" action="monumentos.php">
			<img src="img/lupa_icono.png" class="lupa"/>
			<input type="search" name="buscar"   id="buscar" placeholder="Escribe el nombre del monumento..." autocomplete="off" />
		</form>
	</div>
	<main>

			<div id="publicaciones">
			<?php 
			foreach( $usuarios['resultados'] as $u ){
				echo <<<HTML
				<div>
					<h3 class="nombres_Monumentos">$u[nombre]</h3>
					<img class="imagen" src="$u[url]" alt="">
				</div>
	HTML;
			} ?>
		
		</div>
		<ul id="paginador">
		<?php 
		for( $i = 1; $i <= $usuarios['paginas']; $i++ ){
			$actual = $i == 1 ? " class='actual'" : '';
			echo "<li><a data-pagina='$i' href='pagina-1.html'$actual>$i</a></li>";
		}
		?>
		</ul>
	</main>
    <!-- Manda a llamar al php del footer-->
    <?php
    include("include/footer.php");
    ?>
</body>
<script language="JavaScript" type="text/javascript" src="js/global.js"></script>
<script language="JavaScript" type="text/javascript" src="js/monuments.js"></script>

</html>