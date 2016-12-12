<?php 

session_start();


 $caduca = time()-99365 ;
                   
 if ( isset( $_COOKIE['nombre'] ) ) {
                       
     setcookie( 'id',  $_SESSION ['idUsuario'], $caduca ) ;
     setcookie( 'nombre',  $_SESSION ['nombre'], $caduca ) ;
     setcookie( 'img',  $_SESSION ['imagen'], $caduca ) ;
 }


session_unset();
session_destroy();

header( "Refresh:5; url=index.php" );

?>


<?php require 'inc/head.inc' ; ?>

<div class="alert alert-info" role="alert">
  <h4 class="alert-heading">Has cerrado sesion!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <p class="mb-0">Seras redireccionado en 5 segundos a la paginas de incio.</p>
</div>
  
<?php require 'inc/footer.inc' ; ?>