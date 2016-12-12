<?php session_start(); ?>

<?php require 'inc/head.inc' ; ?>


<body>
   <div class="container-fluid" id="principal-container">
       <div class="row" id="title-cont">
           <div class="col-md-12 text-xs-center">
               <h3>SISTEMA DE FACTURACION Y STOCK</h3>
           </div>
       </div>
       <div class="row" id="form-cont">
          <div class="col-md-6 col-centrar border-form">
          

<?php 
require 'libs/config.php' ;
              
              spl_autoload_register( function( $clase){
                  
                  require_once "libs/$clase.php" ;
              }) ;
              
if ($_POST) {
                  
         extract( $_POST, EXTR_OVERWRITE );
                
       if ( (empty( $email ) && empty( $contrasena ) ) || ( empty( $contrasena ) ) || ( empty( $email ) )  ) {  ?>
                   <div class="alert alert-danger" role="alert">
                          <strong>Oh snap!</strong> <a href="#" class="alert-link">Los campos no pueden estar vacios</a> Seras redireccionado en 4S.
                    </div>
          
       
       <?php
                header("Refresh:4; url=index.php");
                                                      } else {
    
        if ( $email && $contrasena) {
            
              $db = new Database( DB_HOST, DB_USER, DB_PASS, DB_NAME ) ;
              $validarEmail = $db->validarDatos ('email', 'usuarios', $email);
              $expreg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            

       if ( preg_match( $expreg, $email ) ) {
           
           
           
       if ( $validarEmail != 0 ) {
         
           $db->preparar ("SELECT iDUsuario, CONCAT(nombre, ' ', apellido) AS nombrecompleto, email, contrasena, imagen FROM usuarios WHERE email = '$email'");
           $db->ejecutar();
           $db->prep()->bind_result( $dbidUsuario, $dbnombrecompleto, $dbemail, $dbcontrasena,  $dbimagen );
           $db->resultado();
           
           if ( $email == $dbemail ) {
               
               if ( $contrasena == $dbcontrasena ) {
                   
                   
                   $_SESSION ['idUsuario'] = $dbidUsuario ;
                   $_SESSION ['nombre'] = $dbnombrecompleto ;
                   $_SESSION ['imagen'] = $dbimagen ;
                   
                   $caduca = time()+365*24*60*60 ;
                   
                   if ( $recordar == 'activo' ) {
                       
                       setcookie( 'id',  $_SESSION ['idUsuario'], $caduca ) ;
                       setcookie( 'nombre',  $_SESSION ['nombre'], $caduca ) ;
                       setcookie( 'img',  $_SESSION ['imagen'], $caduca ) ;
                   }
                   
                   $ok = true ; 
                   header( "Location: admin.php" );
                   
               } else {
                   
                   echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Lo siento!</strong> La contraseña no coincide con el correo.
                          </div>' ;
                   header( "Refresh:4; url=index.php" );
                   
               }
               
           }
           
           
          } else {
           
            echo '<div class="alert alert-danger" role="alert">
                                            <strong>Lo sentimos!</strong> Ese correo no esta registrado porfavor intenta con otro.
                                          </div>';
                                  header( "Refresh:4; url=index.php" );
       }
       
       } else {
           
             echo '<div class="alert alert-danger" role="alert">
                                            <strong>Lo sentimos!</strong>Seras redireccionado en 4 segundos.
                                          </div>';
           header( "Refresh:4; url=index.php" );
        }
            
                      
            
     }
    
 } 
}

?>

              </div>
       </div>
   </div>
   
    <?php require 'inc/footer.inc' ; ?>